<?php
// Veritabanı dahil ediliyor.
require_once("config.php");
include ("admin/functions/seflink.php");

// Güvenlik ApiKey belirleniyor.
$anahtar = "key2024";

// Denetim ve ekleme yapılıyor
if (@$_GET["apikey"]) {
    if ($_GET["apikey"] == $anahtar) {

        /*  GEREKLİ ALANLAR

            $baslik = $_POST["baslik"];
            $icerik = $_POST["icerik"];
            $kategori = $_POST["kategori"];
            $yazar = $_POST["yazar"];
        */

        //içerik ekleme işlemi yapılıyor
        $posts = $db->prepare("INSERT into posts set

            post_title=:post_title,
            post_content=:post_content,
            post_category_id=:post_category_id,
            post_author_id=:post_author_id,
            post_wievs=:post_wievs,
            post_description=:post_description,
            post_thumbnail_id=:post_thumbnail_id,
            post_type=:post_type,
            post_author_agent=:post_author_agent,
            post_author_ip=:post_author_ip,
            post_status=:post_status,
            post_comment_status=:post_comment_status,
            post_update_time=:post_update_time

        ");


        $insert = $posts->execute(array(
            'post_title' => substr(htmlspecialchars(strip_tags($_POST["baslik"])), 0, 100),
            'post_content' => $_POST["icerik"],
            'post_category_id' => $_POST["kategori"],
            'post_author_id' => $_POST["yazar"],
            'post_wievs' => rand(1, 9),
            'post_description' => $_POST["baslik"],
            'post_thumbnail_id' => NULL,
            'post_type' => "post",
            'post_author_agent' => $_SERVER['HTTP_USER_AGENT'],
            'post_author_ip' => $_SERVER["REMOTE_ADDR"],
            'post_status' => "draft",
            'post_comment_status' => "open",
            'post_update_time' => date('Y-m-d H:i:s')

        ));


        //Yeni link ayarlaması yapılıyor.
        $host_adi = $_SERVER["HTTP_HOST"]; // Host adı buraya ekleniyor.
        $son_post_id = $db->lastInsertId(); // Son kaydedilen ID bir değişkene aktarıldı.
        $yeni_link = "https://" . $host_adi . "/" . $son_post_id . "-" . substr(permalink($_POST["baslik"]), 0, 80);

        $posts = $db->prepare("UPDATE posts SET
            post_link=:post_link
        WHERE post_id=$son_post_id");

        $update = $posts->execute(array(
            'post_link' => $yeni_link
        ));

        if ($update) {
            $cikti = 'Basarili';
            echo json_encode($cikti);
        } else {
            $cikti = 'Hata';
            echo json_encode($cikti);
        }
    } else {
        $cikti = 'ApiKey Hatasi';
        echo json_encode($cikti);
    }
} else {
    $cikti = 'ApiKey Eksik';
    echo json_encode($cikti);
}

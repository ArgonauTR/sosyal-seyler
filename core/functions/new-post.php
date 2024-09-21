<?php

// Ana fonskiyon dosyası ekleniyor.
include("../codex.php");

// Konu ekleme işlemi yapılıyor
if (isset($_POST['new_post'])) {

    $post_title = htmlspecialchars(strip_tags($_POST["post_title"]));
    // $post_link = "";
    $post_content = $_POST["post_content"];
    $post_category_id = htmlspecialchars(strip_tags($_POST["post_category_id"]));
    $post_author_id = $_SESSION["user_id"];
    if ($_SESSION["user_role"] == "admin") {
        $post_status = "publish";
    } else {
        $post_status = "draft";
    }
    $post_wievs = rand(1, 10);
    $post_comment_status = "open";
    $post_create_time = date('Y-m-d H:i:s');


    $posts = $db->prepare("INSERT into posts set
        post_title=:post_title,
        post_content=:post_content,
        post_category_id=:post_category_id,
        post_author_id=:post_author_id,
        post_status=:post_status,
        post_wievs=:post_wievs,
        post_comment_status=:post_comment_status,
        post_create_time=:post_create_time
	");


    $insert = $posts->execute(array(
        'post_title' => substr($post_title, 0, 100), // Başlık en fazla 100 karakterden oluşabilir.
        'post_content' => $post_content,
        'post_category_id' => $post_category_id,
        'post_author_id' => $post_author_id,
        'post_status' => $post_status,
        'post_wievs' => $post_wievs,
        'post_comment_status' => $post_comment_status,
        'post_create_time' => $post_create_time
    ));
}


// Konu linki oluşturulup post güncelleniyor
if ($insert) {

    // Son eklenen Post'un ID değeri.
    $last_post_id = $db->lastInsertId();

    // Yeni link hazırlanıyor.
    $new_link = newlink($last_post_id, $post_title, "post"); // link en fazla 50 karakterden oluşabilir.

    $posts = $db->prepare("UPDATE posts SET
    post_link=:post_link
	WHERE post_id=$last_post_id");

    $update = $posts->execute(array(
        'post_link' => $new_link
    ));

    if ($update) {
        header("Location:" . $new_link . "?alert=post-added");
        exit;
    }
} else {
    header("Location:" . $new_link . "?alert=post-failed");
    exit;
}

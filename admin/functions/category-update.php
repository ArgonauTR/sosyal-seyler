<?php

// Ana fonskiyon dosyası ekleniyor.
include("../../codex.php");

// Güvenlik kontrolü yapılıyor.
if (!isset($_SESSION["user_role"]) and $_SESSION["user_role"] != "admin") {
    header("Location:" . $site_name . "/?status=permission-exist");
    exit();
}

if (isset($_POST["category_update"])) {

    $category_id = $_POST["category_id"];

    $category_title = $_POST["category_title"];
    $category_title_sef = permalink($_POST["category_title"]);
    $category_icon = $_POST["category_icon"];
    $category_link = newlink("", $category_title, "category"); // ID ye gerek olmadığından boş gönderiliyor.
    $category_description = $_POST["category_description"];
    $category_fav = $_POST["category_fav"];

    $categories = $db->prepare("UPDATE categories SET
        category_title=:category_title,
        category_title_sef=:category_title_sef,
        category_icon=:category_icon,
        category_link=:category_link,
        category_description=:category_description,
        category_fav=:category_fav
        WHERE category_id=$category_id");

    $update = $categories->execute(array(
        'category_title' => $category_title,
        'category_title_sef' => $category_title_sef,
        'category_icon' => $category_icon,
        'category_link' => $category_link,
        'category_description' => $category_description,
        'category_fav' => $category_fav
    ));

    if ($update) {
        header("Location:" . $site_name . "/admin/process.php?type=category_update&id=" . $category_id . "&alert=update-success");
        exit();
    } else {
        header("Location:" . $site_name . "/admin/process.php?type=category_update&id=" . $category_id . "&alert=update-failed");
        exit();
    }
}

n<?php

// Ana fonskiyon dosyası ekleniyor.
include("../../codex.php");

// Konu ekleme işlemi yapılıyor
if (isset($_POST['new_category'])) {

    $category_title = $_POST["category_title"];
    $category_title_sef = permalink($_POST["category_title"]);
    $category_icon = $_POST["category_icon"];
    $category_link = newlink("", $category_title, "category"); // ID ye gerek olmadığından boş gönderiliyor.
    $category_description = $_POST["category_description"];
    $category_fav = $_POST["category_fav"];
    $category_create_time = date('Y-m-d H:i:s');


    $categories = $db->prepare("INSERT into categories set
        category_title=:category_title,
        category_title_sef=:category_title_sef,
        category_icon=:category_icon,
        category_link=:category_link,
        category_description=:category_description,
        category_fav=:category_fav,
        category_create_time=:category_create_time

	");


    $insert = $categories->execute(array(
        'category_title' => $category_title,
        'category_title_sef' => $category_title_sef,
        'category_icon' => $category_icon,
        'category_link' => $category_link,
        'category_description' => $category_description,
        'category_fav' => $category_fav,
        'category_create_time' => $category_create_time
    ));
}


if ($insert) {
    header("Location:" . $site_name . "/admin/categories.php?status=category-add-success");
    exit;
} else {
    header("Location:" . $site_name . "/admin/categories.php?status=category-add-failed");
    exit;
}

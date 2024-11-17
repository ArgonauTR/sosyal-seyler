<?php

// Ana fonskiyon dosyası ekleniyor.
include("../../codex.php");

// Güvenlik kontrolü yapılıyor.
if (!isset($_SESSION["user_role"]) and $_SESSION["user_role"] != "admin") {
    header("Location:" . $site_name . "/?status=permission-exist");
    exit();
}

// Yorum ekleme işlemi yapılıyor
if (isset($_POST['new_comment'])) {

    //Kayıt edilecek veriler işleniyor.
    $comment_content = $_POST["comment_content"];
    $comment_status = "publish";
    $comment_author_id = $_POST["comment_author_id"];
    $comment_post_id = $_POST["comment_post_id"];
    $comment_parent_id = null;
    $comment_create_time = date('Y-m-d H:i:s');


    $comment = $db->prepare("INSERT into comments set
    comment_content=:comment_content,
    comment_status=:comment_status,
    comment_author_id=:comment_author_id,
    comment_post_id=:comment_post_id,
    comment_parent_id=:comment_parent_id,
    comment_create_time=:comment_create_time

    ");
    $insert = $comment->execute(array(
    'comment_content' => $comment_content,
    'comment_status' => $comment_status,
    'comment_author_id' => $comment_author_id,
    'comment_post_id' => $comment_post_id,
    'comment_parent_id' => $comment_parent_id,
    'comment_create_time' => $comment_create_time

    ));

    if ($insert) {
        header('Location:'.$site_name.'/admin/robots.php?type=robot-comment&alert=success');
        exit;
    } else {
        header('Location:'.$site_name.'/admin/robots.php?type=robot-comment&alert=failed');
        exit;
    }
}

<?php

// Ana fonskiyon dosyası ekleniyor.
include("../codex.php");

// Yorum ekleme işlemi yapılıyor
if (isset($_POST['new_comment'])) {

    // Gelen yorumun ait olduğu konu linki.
    $link = $_POST["post_link"];

    //Kayıt edilecek veriler işleniyor.
    $comment_content = htmlspecialchars(strip_tags($_POST["post_comment"]));
    if ($_SESSION['user_role'] == "admin") {
        $comment_status = "publish";
    } else {
        $comment_status = "draft";
    }
    $comment_author_id = $_SESSION["user_id"];
    $comment_post_id = htmlspecialchars(strip_tags($_POST["post_id"]));
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
        header("Location:".$link."?alert=comment-added");
        exit;
    } else {
        header("Location:".$link."?alert=comment-failed");
        exit;
    }
}




// Cevap ekleme işlemi yapılıyor.
if (isset($_POST['new_reply'])) {

    // Gelen yorumun ait olduğu konu linki.
    $link = $_POST["post_link"];
    $comment_id = $_POST["comment_parent_id"];

    //Kayıt edilecek veriler işleniyor.
    $comment_content = htmlspecialchars(strip_tags($_POST["post_comment"]));
    
    if ($_SESSION['user_role'] == "admin") {
        $comment_status = "publish";
    } else {
        $comment_status = "draft";
    }
    $comment_author_id = $_SESSION["user_id"];
    $comment_post_id = htmlspecialchars(strip_tags($_POST["post_id"]));
    $comment_parent_id = $comment_id;
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
        header("Location:".$link."?alert=comment-added");
        exit;
    } else {
        header("Location:".$link."?alert=comment-failed");
        exit;
    }
}

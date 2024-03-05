<?php
// Ana fonskiyon dosyası ekleniyor.
include("main-function.php");

// Anonim Olarak Yapılan Yorumlar Burada Kayıt Edilir
if (isset($_POST["anonymouscomment"])) {

    // Cevap için parent id
    if (isset($_POST["comment_parent_id"])) {
        $comment_parent_id_post = $_POST["comment_parent_id"];
    } else {
        $comment_parent_id_post = NULL;
    }

    $post_link = htmlspecialchars(strip_tags($_POST["post_link"]));

    $comment_post_id = htmlspecialchars(strip_tags($_POST["post_id"]));
    $comment_author_name = htmlspecialchars(strip_tags($_POST["comment_author_name"]));
    $comment_author_ip = $_SERVER["REMOTE_ADDR"];
    $comment_content = htmlspecialchars(strip_tags($_POST["comment_content"]));
    $comment_author_agent = $_SERVER['HTTP_USER_AGENT'];
    $comment_type = "comment";
    $comment_parent_id = $comment_parent_id_post;
    $comment_status = "draft";

    $comment = $db->prepare("INSERT into comments set
    comment_post_id=:comment_post_id,
    comment_author_name=:comment_author_name,
    comment_author_ip=:comment_author_ip,
    comment_content=:comment_content,
    comment_author_agent=:comment_author_agent,
    comment_type=:comment_type,
    comment_parent_id=:comment_parent_id,
    comment_status=:comment_status
    ");
    $insert = $comment->execute(array(
        'comment_post_id' => $comment_post_id,
        'comment_author_name' => $comment_author_name,
        'comment_author_ip' => $comment_author_ip,
        'comment_content' => $comment_content,
        'comment_author_agent' => $comment_author_agent,
        'comment_type' => $comment_type,
        'comment_parent_id' => $comment_parent_id,
        'comment_status' => $comment_status
    ));

    if ($insert) {
        header('Location:' . $post_link . '?status=ok');
        exit;
    } else {
        header('Location:' . $post_link . '?status=no');
        exit;
    }
}

// Giriş Yapılmış Olarak Yapılan Yorumlar Burada Kayıt Edilir
if (isset($_POST["usercomment"])) {

    // Cevap için parent id
    if (isset($_POST["comment_parent_id"])) {
        $comment_parent_id_post = $_POST["comment_parent_id"];
    } else {
        $comment_parent_id_post = NULL;
    }

    //Yorum yetki denetimi burada yapılıyor.
    if ($_SESSION['user_role'] == 'admin') {
        $comment_status = "publish";
    } else {
        $comment_status = "draft";
    }

    $post_link = htmlspecialchars(strip_tags($_POST["post_link"]));

    $comment_post_id = htmlspecialchars(strip_tags($_POST["post_id"]));
    $comment_author_id = $_SESSION["user_id"];
    $comment_author_ip = $_SERVER["REMOTE_ADDR"];
    $comment_content = htmlspecialchars(strip_tags($_POST["comment_content"]));
    $comment_author_agent = $_SERVER['HTTP_USER_AGENT'];
    $comment_type = "comment";
    $comment_parent_id = $comment_parent_id_post;

    $comment = $db->prepare("INSERT into comments set
    comment_post_id=:comment_post_id,
    comment_author_id=:comment_author_id,
    comment_author_ip=:comment_author_ip,
    comment_content=:comment_content,
    comment_author_agent=:comment_author_agent,
    comment_type=:comment_type,
    comment_parent_id=:comment_parent_id,
    comment_status=:comment_status
    ");
    $insert = $comment->execute(array(
        'comment_post_id' => $comment_post_id,
        'comment_author_id' => $comment_author_id,
        'comment_author_ip' => $comment_author_ip,
        'comment_content' => $comment_content,
        'comment_author_agent' => $comment_author_agent,
        'comment_type' => $comment_type,
        'comment_parent_id' => $comment_parent_id,
        'comment_status' => $comment_status
    ));

    if ($insert) {
        //admin yorum kısmının kapanması engelleniyor. 
        //admin yorumu denetime tabi olmadığı için status=ok ile kapann yorum kısmının kapanmasına gerek yok
        if ($_SESSION['user_role'] == 'admin') {
            header('Location:' . $post_link);
            exit;
        } else {
            header('Location:' . $post_link . '?status=ok');
            exit;
        }
    } else {
        header('Location:' . $post_link . '?status=no');
        exit;
    }
}

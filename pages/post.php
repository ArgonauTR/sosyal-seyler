<?php

// Post ID değeri bir değişkene aktarlılıyro.
$post_id = htmlspecialchars(strip_tags($_GET["post_id"]));

// Yazı Okunma Sayısını Güncelliyor.
$db->prepare("UPDATE posts SET post_wievs = post_wievs + 1 WHERE post_id = ?")->execute([$post_id]);

// Post bilgilerini çekiyor.
$posts = postinfo("SELECT * FROM posts WHERE post_id=" . $post_id);

// Postlar listeleniyor.
foreach ($posts as $post) {

    // Kullanıcı adı çekildi.
    $user = userinfo("SELECT * FROM users WHERE user_id=" . $post["post_author_id"]);

    // Kategori adı çeklidi.
    $category = categoryinfo("SELECT * FROM categories WHERE category_id=" . $post["post_category_id"]);

    // Konu içeriği gösteriliyor.
    include("subpages/post-content.php");

    // Yorum kutusu gösteriliyor.
    if (isset($_SESSION["user_nick"])) {
        // Üyeler için.
        include("subpages/comment-form.php");
    } else {
        // Ziyaretçiler için.
        include("subpages/comment-form-disabled.php");
    }
}

// Yorumlar Hesaplanıyor.
if (isset($_SESSION["user_nick"])) {
    // Üyeler için.
    $comments = commentinfo("SELECT * FROM comments WHERE comment_parent_id IS NULL AND comment_post_id=" . $post_id . " ORDER BY comment_id ASC");

    // En az bir yorum varsa sayfa içi yorumu gösteriyor
    if (count($comments) > 0) {
        echo adinfo("ad_post_page");
    }
} else {
    // Ziyaretçiler için.
    $comments = commentinfo("SELECT * FROM comments WHERE comment_parent_id IS NULL AND comment_status='publish' && comment_post_id=" . $post_id . " ORDER BY comment_id ASC");

    // En az bir yorum varsa sayfa içi yorumu gösteriyor
    if (count($comments) > 0) {
        echo adinfo("ad_post_page");
    }
}

// Yorumlar listeleniyor.
foreach ($comments as $comment) {

    // Yorum yapan üyenin bilgileri çekiliyor.
    $user = userinfo("SELECT * FROM users WHERE user_id=" . $comment['comment_author_id']);

    // Yorumlar bilgileri gösteriliyor..
    include("subpages/comment.php");

    // Cevap formu gösteriliyor.
    if (isset($_SESSION["user_nick"])) {
        include("subpages/reply-form.php");
    }

    // Parent Yorumm ID değeri bir dğeişkene aktarlılıyor.
    $parent_id = $comment["comment_id"];

    // Cevaplar hesaplanıyor.
    if (isset($_SESSION["user_nick"])) {
        // Üyeler için.
        $replys = commentinfo("SELECT * FROM comments WHERE comment_parent_id=$parent_id AND comment_post_id=$post_id ORDER BY comment_id ASC");
    } else {
        // Ziyaretçiler için.
        $replys = commentinfo("SELECT * FROM comments WHERE comment_parent_id= $parent_id AND comment_status='publish' AND comment_post_id= $post_id ORDER BY comment_id ASC");
    }

    //Cevaplar listeleniyor.
    foreach ($replys as $reply) {

        // Cevap veren üyenin bilgileri çekiliyor.
        $user = userinfo("SELECT * FROM users WHERE user_id=" . $reply['comment_author_id']);

        // Cevaplar bilgileri gösteriliyor.
        include("subpages/reply.php");
    }
}
?>
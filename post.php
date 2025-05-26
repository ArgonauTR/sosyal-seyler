<?php
// Ana fonskiyon dosyası ekleniyor.
include("codex.php");

// Sayfa elemanları ekleniyor.
// Header Tema Dosyasından Ekleniyor.
include("./theme/head.php");
// Navbar Tema Dosyasından Ekleniyor.
include("./theme/nav.php");
// Sol Sidebar Tema Dosyasından Ekleniyor.
include("./theme/sidebar-left.php");

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

    // Değişkenler hazırlanıyor.
    $user_image_url = $user[0]["user_image_url"];
    $post_title = $post['post_title'];
    $post_link = $post['post_link'];
    $user_url = $user[0]["user_url"];
    $user_nick = $user[0]["user_nick"];
    $category_link = $category[0]["category_link"];
    $category_title = $category[0]["category_title"];
    $post_create_time = datetime($post['post_create_time']);
    $post_wievs = $post['post_wievs'];
    $post_content = nl2br($post['post_content']);
    $post_id = $post['post_id'];
    $action_link = $site_name . "/functions/comment.php";
    @$user_session_nick = $_SESSION["user_nick"];

    // Temalardan Post Content ekleniyor
    include("./theme/post-content.php");

    // Yorum kutusu gösteriliyor.
    if (isset($_SESSION["user_nick"])) {
        // Üyeler İçin Yorum Formu Temalardan ekleniyor
        include("./theme/comment-form.php");
    } else {
        // Ziyaretçiler için
        include("./theme/comment-form-disabled.php");
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

    //Değişkenler hazırlanıyor.
    $user_image_url = $user[0]["user_image_url"];
    $user_url =  $user[0]["user_url"];
    $user_nick = $user[0]["user_nick"];
    $time_comment_create_time = date('c', strtotime($comment['comment_create_time']));
    $comment_create_time = datetime($comment["comment_create_time"]);
    $comment_content =  nl2br($comment['comment_content']);

    // Yorumlar bilgileri gösteriliyor..
    include("./theme/comment.php");

    // Cevap formu gösteriliyor.
    if (isset($_SESSION["user_nick"])) {

        // Değişkenler hazırlanıyor.
        $comment_id = $comment["comment_id"];

        //  Cevap-formu gösteriliyor
        include("./theme/reply-form.php");
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

        //Değişkenler hazırlanıyor.
        $reply_user_image_url = $user[0]["user_image_url"];
        $reply_user_url = $user[0]["user_url"];
        $reply_user_nick = $user[0]["user_nick"];
        $reply_shema_date_time = date('c', strtotime($reply['comment_create_time']));
        $reply_date_time = datetime($reply["comment_create_time"]);
        $reply_comment_content = nl2br($reply['comment_content']);

        // Cevaplar bilgileri gösteriliyor.
        include("./theme/reply.php");
    }
}

// Sağ Sidebar Tema Dosyasından Ekleniyor.
include("./theme/sidebar-right.php");
// Footer Tema Dosyasından Ekleniyor.
include("./theme/footer.php");

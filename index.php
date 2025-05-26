<?php
// Ana fonskiyon dosyası ekleniyor.
include("codex.php");

// Config dosyası yolu değişkene aktarıldı.
$file = 'config.php';
// Config dosyası yoksa kurulum sayfasına yönlendiriliyor.
if (!file_exists($file)) {
    header('Location:./theme/install.php');
    exit();
}

// Sayfa elamanları ekleniyor.

// Header Tema Dosyasından Ekleniyor.
include("./theme/head.php");
// Navbar Tema Dosyasından Ekleniyor.
include("./theme/nav.php");
// Sol Sidebar Tema Dosyasından Ekleniyor.
include("./theme/sidebar-left.php");

// Sabit yazı kontrol edilip ekleniyor.
if (optioninfo("option_fixed_top")) {
    // Sabit yazı ID si alınıyor.
    $pinned_id = optioninfo("option_fixed_top");

    $post = postinfo("SELECT * FROM posts WHERE post_id=" . $pinned_id);


    // Kullanıcı adı çekildi.
    $user = userinfo("SELECT * FROM users WHERE user_id=" . $post[0]["post_author_id"]);

    // Kategori adı çeklidi.
    $category = categoryinfo("SELECT * FROM categories WHERE category_id=" . $post[0]["post_category_id"]);

    // Değişkenler hazırlanıyor
    $pin_user_image_url = $user[0]["user_image_url"];
    $pin_post_link = $post[0]['post_link'];
    $pin_post_title = $post[0]['post_title'];
    $pin_user_url = $user[0]["user_url"];
    $pin_user_nick = $user[0]["user_nick"];
    $pin_category_title = $category[0]["category_title"];
    $pin_category_link = $category[0]["category_link"];

    // Sabit yazı ekleniyor.
    include("./theme/pinned-post.php");
}

// Sayfalama için sayfa durum denetimi
if (empty($_GET["page"])) {
    $page = 1;
} else {
    $page = $_GET["page"];
}
// Sayfalama Değerleri
$limit = 20;
$start_limit = ($page * $limit) - $limit;

// Sayfalama için İşlem yapılıyor
$count_post = postinfo("SELECT * FROM posts");
$page_count = ceil(count($count_post) / $limit);

if (isset($_SESSION["user_nick"])) { // Kullanıcı giriş yapmışsa gösterilecek postlar.
    $posts = postinfo("SELECT * FROM posts ORDER BY post_id DESC LIMIT $start_limit,$limit");
} else {  // Anonim kullanıcıların göreceği kodlar.
    $posts = postinfo("SELECT * FROM posts WHERE post_status='publish' ORDER BY post_id DESC LIMIT $start_limit,$limit");
}
foreach ($posts as $post) {
    // Kullanıcı adı çekildi.
    $user = userinfo("SELECT * FROM users WHERE user_id=" . $post["post_author_id"]);

    // Kategori adı çeklidi.
    $category = categoryinfo("SELECT * FROM categories WHERE category_id=" . $post["post_category_id"]);

    //Değişkenler tanımlanıyor.
    $user_img_url = $user[0]["user_image_url"];
    $user_url = $user[0]["user_url"];
    $user_nick = $user[0]["user_nick"];
    $category_link = $category[0]["category_link"];
    $category_title = $category[0]["category_title"];
    $post_create_time = datetime($post['post_create_time']);

    // Temalardan index ekleniyor
    include("./theme/index.php");
}

// Temalardan navigasyon ekleniyor
include("./theme/navigation.php");

// Sağ Sidebar Tema Dosyasından Ekleniyor.
include("./theme/sidebar-right.php");

// Footer Tema Dosyasından Ekleniyor.
include("./theme/footer.php");
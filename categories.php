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

if (empty($_GET["category_title"])) {
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
    $count_post = postinfo("SELECT * FROM categories");
    $page_count = ceil(count($count_post) / $limit);


    $categories = categoryinfo("SELECT * FROM categories ORDER BY category_title ASC LIMIT $start_limit,$limit");
    foreach ($categories as $category) {
        //Değişkenler hazırlanıyor
        $category_link = $category["category_link"];
        $category_icon = $category["category_icon"];
        $category_title = $category["category_title"];
        $category_description = $category["category_description"];

        // Temalardan Categories All dahil ediliyor
        include("./theme/categories-all.php");
    }
} else {
    // Kategori Bilgileri Çekiliyor
    $title = htmlspecialchars(strip_tags($_GET["category_title"]));
    $category = categoryinfo("SELECT * FROM categories WHERE category_title_sef='$title'");
    $category_title = $category[0]["category_title"];
    $category_id = $category[0]["category_id"];

    echo '<div class="text-center text-muted h1 mb-3 pb-2 border-bottom"><i class="bi bi-' . $category[0]["category_icon"] . '"></i> ' . $category[0]["category_title"] . '</div>';

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
    $count_post = postinfo("SELECT * FROM posts WHERE post_category_id='$category_id'");
    $page_count = ceil(count($count_post) / $limit);

    if (isset($_SESSION["user_nick"])) { // Kullanıcı giriş yapmışsa gösterilecek postlar.
        $posts = postinfo("SELECT * FROM posts WHERE post_category_id='$category_id' ORDER BY post_id DESC LIMIT $start_limit,$limit");
    } else {  // Anonim kullanıcıların göreceği kodlar.
        $posts = postinfo("SELECT * FROM posts WHERE post_status='publish' AND post_category_id='$category_id' ORDER BY post_id DESC LIMIT $start_limit,$limit");
    }
    foreach ($posts as $post) {

        // Kullanıcı adı çekildi.
        $user = userinfo("SELECT * FROM users WHERE user_id=" . $post["post_author_id"]);

        // Kategori adı çeklidi.
        $category = categoryinfo("SELECT * FROM categories WHERE category_id=" . $post["post_category_id"]);

        // Değişkenler hazırlanıyor.
        $user_image_url = $user[0]["user_image_url"];
        $post_link = $post['post_link'];
        $post_title = $post['post_title'];
        $user_url = $user[0]["user_url"];
        $user_nick = $user[0]["user_nick"];
        $category_link = $category[0]["category_link"];
        $category_title = $category[0]["category_title"];
        $post_create_time = datetime($post['post_create_time']);

        // Temalardan Categories All dahil ediliyor
        include("./theme/categories-only.php");
    }
}

// Temalardan Navigasyon dahil ediliyor
include("./theme/navigation.php");

// Sağ Sidebar Tema Dosyasından Ekleniyor.
include("./theme/sidebar-right.php");
// Footer Tema Dosyasından Ekleniyor.
include("./theme/footer.php");

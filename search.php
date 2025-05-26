<?php
// Ana fonskiyon dosyası ekleniyor.
include("codex.php");

// Header Tema Dosyasından Ekleniyor.
include("./theme/head.php");
// Navbar Tema Dosyasından Ekleniyor.
include("./theme/nav.php");
// Sol Sidebar Tema Dosyasından Ekleniyor.
include("./theme/sidebar-left.php");

// Arama terimi değişkene aktarlılıyor.
@$search_key = "%" . $_POST["search_key"] . "%";

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
$post_counts = postinfo("SELECT * FROM posts WHERE post_title LIKE '$search_key'");
$page_count = ceil(count($post_counts) / $limit);

echo '<div class="text-center text-muted h2 mb-3 pb-2 border-bottom"><i class="bi bi-search"></i> İşte bulduklarımız</div>';


if (isset($_SESSION["user_nick"])) { // Kullanıcı giriş yapmışsa gösterilecek postlar.
    $posts = postinfo("SELECT * FROM posts WHERE post_title LIKE '$search_key' ORDER BY post_id DESC LIMIT $start_limit,$limit");
} else {  // Anonim kullanıcıların göreceği kodlar.
    $posts = postinfo("SELECT * FROM posts WHERE post_status='publish' AND post_title LIKE '$search_key' ORDER BY post_id DESC LIMIT $start_limit,$limit");
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

    // Arama Tema Dosyasından Ekleniyor.
    include("./theme/search.php");
}

// Temalardan Navigasyon dahil ediliyor
include("./theme/navigation.php");

// Sağ Sidebar Tema Dosyasından Ekleniyor.
include("./theme/sidebar-right.php");
// Footer Tema Dosyasından Ekleniyor.
include("./theme/footer.php");

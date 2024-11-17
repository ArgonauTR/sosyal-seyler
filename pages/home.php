<?php
// Sabit yazı kontrol edilip ekleniyor.
if (optioninfo("option_fixed_top")) {
    include("subpages/pinned-post.php");
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

?>
    <div class="row">
        <div class="col-auto">
            <img src="<?php echo $user[0]["user_image_url"]; ?>" class="rounded-circle" alt="User Avatar" width="50" height="50">
        </div>
        <div class="col">
            <div class="h3 clamp-text">
                <a href="<?php echo $post['post_link'] ?>" class="text-decoration-none text-muted"><?php echo $post['post_title'] ?></a> </div>
            <div class="clamp-text">
                <?php echo '<a href="' . $user[0]["user_url"] . '" class="text-decoration-none text-muted"><i class="bi bi-person ms-1 me-1"></i>' . $user[0]["user_nick"] . '</a>'; ?>
                <?php echo '<a href="' . $category[0]["category_link"] . '" class="text-decoration-none text-muted"><i class="bi bi-tag ms-1 me-1"></i>' . $category[0]["category_title"] . '</a>'; ?>
                <i class="bi bi-clock-history ms-1"></i> <?php echo datetime($post['post_create_time']); ?>
            </div>
        </div>
    </div>
    <hr>
<?php

}
?>
<div class="d-flex justify-content-center mt-3 mb-3">
    <?php
    //Öncesi sayfası
    if ($page > 1) {
        $newpage = $page - 1;
        echo '<a href="?page=' . $newpage . '" class="btn btn-sm btn-outline-secondary  ms-1"><i class="bi bi-arrow-bar-left me-2"></i>Öncesi</a>';
    }
    // Sayfa Gösterici
    echo '<a href="" class="btn btn-sm btn-outline-darkms-1">Sayfa ' . $page . '</a>';

    //Öncesi sayfası
    if ($page < $page_count) {
        $newpage = $page + 1;
        echo '<a href="?page=' . $newpage . '" class="btn btn-sm btn-outline-secondary" ><i class="bi bi-arrow-bar-right me-2"></i>Sonrası</a>';
    }
    ?>
</div>
<style>
    img {
        max-width: 100%;
        height: auto;
        display: block;
    }

    .rounded-bottom-corners {
        border-bottom-left-radius: 10px;
        border-bottom-right-radius: 10px;
        box-shadow: 0px 10px 10px rgba(0, 0, 0, 0.2);
    }
</style>

<?php
// Post işlemleri yaplıyor.
$post_id = $_GET["post_id"];

$postask = $db->prepare("SELECT * FROM posts WHERE post_id=:id");
$postask->execute(array('id' => $post_id));
while ($postfetch = $postask->fetch(PDO::FETCH_ASSOC)) {

    //Yazar Adını Çekiyor.
    $post_author_id = $postfetch["post_author_id"];
    $userask = $db->prepare("SELECT * FROM users WHERE user_id=:id");
    $userask->execute(array('id' => $post_author_id));
    while ($userfetch = $userask->fetch(PDO::FETCH_ASSOC)) {
        $usernick = $userfetch["user_nick"];
    }
    //Kategori Adını Çekiyor
    $post_category_id = $postfetch["post_category_id"];
    $categoryask = $db->prepare("SELECT * FROM categories WHERE category_id=:id");
    $categoryask->execute(array('id' => $post_category_id));
    while ($categoryfetch = $categoryask->fetch(PDO::FETCH_ASSOC)) {
        $category_name = $categoryfetch["category_title"];
    }
    //Resim Yolunu Çekiyor
    $post_thumbnail_id = $postfetch["post_thumbnail_id"];
    $imageask = $db->prepare("SELECT * FROM images WHERE image_id=:id");
    $imageask->execute(array('id' => $post_thumbnail_id));
    while ($imagefetch = $imageask->fetch(PDO::FETCH_ASSOC)) {
        $image_title = $imagefetch["image_title"];
        $image_link = $imagefetch["image_link"];
    }

    $post_id = $postfetch["post_id"];
    $post_wievs = $postfetch["post_wievs"];
    $post_title = $postfetch["post_title"];
    $post_description = $postfetch["post_description"];
    $post_content = $postfetch["post_content"];
    $post_link = $postfetch["post_link"];
    $post_time = parcala($postfetch["post_time"]);
}

// Yazı Okunma Sayısını Güncelliyor.
$PostWiews = $db->prepare("UPDATE posts SET post_wievs = post_wievs+1 WHERE post_id = :post_id");
$PostWiews->execute(array(":post_id" => $_GET["post_id"]));

?>

<body class="bg-dark text-white">
    <div class="container mt-4">
        <div class="row align-items-start">
            <div class="col-md-8">
                <div class="card border-one bg-dark" style="border: none;">
                    <img class="card-img-top img-fluid border-two rounded-bottom-corners" src="<?php echo $image_link; ?>" alt="<?php echo $image_title; ?>">
                    <div class="card-body">
                        <div class="list-item mb-3">
                            <div class="d-flex justify-content-between">
                                <span>
                                    <i class="bi bi-person-circle me-1"></i>
                                    <?php echo $usernick; ?>
                                    <i class="bi bi-calendar-plus me-1 ms-3"></i>
                                    <?php echo $post_time; ?>
                                </span>
                                <span>
                                    <i class="bi bi-folder"></i>
                                    <?php echo $category_name; ?>
                                    <i class="bi bi-eye ms-3 me-1"></i>
                                    <?php echo $post_wievs; ?>
                                </span>
                            </div>
                        </div>
                        <h1><?php echo $post_title; ?> </h1>
                        <p><b> <i><?php echo $post_description; ?></i></b></p>
                        <?php echo $post_content; ?>
                    </div>
                </div>
                <?php include 'comment.php'; ?>
            </div>
            <?php include 'sidebar.php'; ?>
        </div>
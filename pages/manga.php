<style>
    img {
        max-width: 100%;
        height: auto;
        display: block;
    }

    .clamp-text {
        display: -webkit-box;
        -webkit-box-orient: vertical;
        overflow: hidden;
        -webkit-line-clamp: 1;
    }

    .rounded-bottom-corners {
        border-bottom-left-radius: 10px;
        border-bottom-right-radius: 10px;
        box-shadow: 0px 10px 10px rgba(0, 0, 0, 0.2);
    }

    .custom-card {
        transition: box-shadow 0.3s, border-color 0.3s;
    }

    .custom-card:hover {
        box-shadow: 0 4px 8px rgba(255, 255, 255, 0.5);
    }
</style>

<?php
// Post işlemleri yaplıyor.
$manga_id = $_GET["manga_id"];

$mangaask = $db->prepare("SELECT * FROM mangas WHERE manga_id=:id");
$mangaask->execute(array('id' => $manga_id));
while ($mangafetch = $mangaask->fetch(PDO::FETCH_ASSOC)) {

    //Yazar Adını Çekiyor.
    $manga_upload_user_id = $mangafetch["manga_upload_user_id"];
    $userask = $db->prepare("SELECT * FROM users WHERE user_id=:id");
    $userask->execute(array('id' => $manga_upload_user_id));
    while ($userfetch = $userask->fetch(PDO::FETCH_ASSOC)) {
        $usernick = $userfetch["user_nick"];
    }
    //Kategori Adını Çekiyor
    $manga_category_id = $mangafetch["manga_category_id"];
    $categoryask = $db->prepare("SELECT * FROM categories WHERE category_id=:id");
    $categoryask->execute(array('id' => $manga_category_id));
    while ($categoryfetch = $categoryask->fetch(PDO::FETCH_ASSOC)) {
        $category_name = $categoryfetch["category_title"];
    }
    //Resim Yolunu Çekiyor
    $manga_image_id = $mangafetch["manga_image_id"];
    $imageask = $db->prepare("SELECT * FROM images WHERE image_id=:id");
    $imageask->execute(array('id' => $manga_image_id));
    while ($imagefetch = $imageask->fetch(PDO::FETCH_ASSOC)) {
        $image_title = $imagefetch["image_title"];
        $image_link = $imagefetch["image_link"];
    }

    $manga_name = $mangafetch["manga_name"];
    $manga_other_name = $mangafetch["manga_other_name"];
    $manga_author = $mangafetch["manga_author"];
    $manga_artist = $mangafetch["manga_artist"];
    $manga_content = $mangafetch["manga_content"];
    $manga_year = $mangafetch["manga_year"];
    $manga_country = $mangafetch["manga_country"];
    $manga_publish_status = $mangafetch["manga_publish_status"];
    $manga_translate_status = $mangafetch["manga_translate_status"];
}
?>

<?php
// Sayfalama için
// Sayfalama için sayfa durum denetimi
if (empty($_GET["page"])) {
    $page = 1;
} else {
    $page = $_GET["page"];
}

// Sayfalama Değerleri
$limit = $optionfetch["option_posts_per_page"]; // Bir sayfada gösterilecek elemanı belirliyor.
$start_limit = ($page * $limit) - $limit;

// Post Sayısı bulucu.
$count = 0;
$read_count = 0;
$manga_id = $_GET["manga_id"];
$chapterask = $db->prepare("SELECT * FROM chapters WHERE chapter_status='publish' && chapter_manga_id='$manga_id' ");
$chapterask->execute(array());
while ($chapterfetch = $chapterask->fetch(PDO::FETCH_ASSOC)) {
    $count++;
    $read_count = $read_count + $chapterfetch["chapter_wiev"];
}
// Post sayısı kullanılarak sayfa sayısı bulundu
$page_count = ceil($count / $limit);

?>

<body class="bg-dark text-white">
    <div class="container">
        <div class="card bg-dark text-white mt-3" style="border: none;">
            <div class="card-header text-center bg-secondary">
                <div class="h2"><?php echo $manga_name ?></div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-lg-3 p-2">
                        <div class="d-flex justify-content-center">
                            <img src="<?php echo $image_link ?>" class="rounded img-fluid" style="max-height: 500px;">
                        </div>
                    </div>
                    <div class="col-12 col-lg-4 p-2">
                        <?php
                        if (!empty($manga_name)) {
                            echo '<p><b>Adı: </b>' . $manga_name . '</p>';
                        }
                        if (!empty($manga_other_name)) {
                            echo '<p><b>Diğer Adı: </b>' . $manga_other_name . '</p>';
                        }
                        if (!empty($category_name)) {
                            echo '<p><b>Kategori: </b>' . $category_name . '</p>';
                        }
                        if (!empty($manga_author)) {
                            echo '<p><b>Yazar: </b>' . $manga_author . '</p>';
                        }
                        if (!empty($manga_artist)) {
                            echo '<p><b>Çizer: </b>' . $manga_artist . '</p>';
                        }
                        if (!empty($manga_translate_status)) {
                            echo '<p><b>Çevri Durumu: </b>' . $manga_translate_status . '</p>';
                        }
                        if (!empty($manga_publish_status)) {
                            echo '<p><b>Yayın Durumu: </b>' . $manga_publish_status . '</p>';
                        }
                        if (!empty($manga_year)) {
                            echo '<p><b>Yayın Yılı: </b>' . $manga_year . '</p>';
                        }
                        if (!empty($manga_country)) {
                            echo '<p><b>Menşei: </b>' . $manga_country . '</p>';
                        }
                        if (!empty($manga_fansub)) {
                            echo '<p><b>Fansub: </b><a href="' . $manga_fansub_link . '" class="text-white">' . $manga_fansub . '</a></p>';
                        }

                        // Bu kısımda toplam manga görüntülenemsi yer alıyor.
                        $count_wiev = 1993;
                        echo '<p><b>Toplam Görüntülenme: </b>' . sefnum($read_count) . '</p>';

                        ?>

                    </div>
                    <div class="col-12 col-lg-5 p-2">
                        <?php
                        if (!empty($manga_content)) {
                            echo $manga_content;
                        }
                        if (!empty($usernick)) {
                            echo '<p><i class="bi bi-person-up me-1"></i>' . $usernick . '</p>';
                        }
                        ?>
                    </div>
                </div>

                <div class="row mt-2">
                    <div class="col-12 col-lg-3 p-2">
                        <?php include 'sidebar-left.php'; ?>
                    </div>
                    <div class="col-12 col-lg-6 p-2">
                        <?php
                        $manga_id = $_GET["manga_id"];
                        $chapterask = $db->prepare("SELECT * FROM chapters WHERE chapter_status='publish' && chapter_manga_id='$manga_id' ORDER BY chapter_num DESC");
                        $chapterask->execute(array());
                        while ($chapterfetch = $chapterask->fetch(PDO::FETCH_ASSOC)) {
                        ?>

                            <div class="card bg-dark border-secondary mb-1 custom-card">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <span>
                                            <a href="<?php echo $chapterfetch["chapter_link"] ?>" class="text-white clamp-text" style="text-decoration: none;">
                                                <?php echo "Bölüm-" . $chapterfetch["chapter_num"] . " " . $chapterfetch["chapter_name"] ?>
                                            </a>
                                        </span>
                                        <span>
                                            <i class="bi bi-eye-fill me-1"></i> <?php echo sefnum($chapterfetch["chapter_wiev"]); ?>
                                            <i class="bi bi-calendar-event me-1 ms-2"></i> <?php echo parcala($chapterfetch["chapter_time"]); ?>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    <nav class="d-flex justify-content-center mt-3 mb-3">
                        <?php
                        //Öncesi sayfası
                        if ($page > 1) {
                            $newpage = $page - 1;
                            echo '<a href="?page=' . $newpage . '" class="btn btn-sm btn-outline-secondary text-white ms-1" style="text-decoration: none;"><i class="bi bi-arrow-bar-left me-2"></i>Öncesi</a>';
                        }
                        // Sayfa Gösterici
                        echo '<a href="" class="btn btn-sm btn-outline-dark text-white disabled ms-1" style="text-decoration: none;">Sayfa ' . $page . '</a>';

                        //Öncesi sayfası
                        if ($page < $page_count) {
                            $newpage = $page + 1;
                            echo '<a href="?page=' . $newpage . '" class="btn btn-sm btn-outline-secondary text-white ms-1" style="text-decoration: none;"><i class="bi bi-arrow-bar-right me-2"></i>Sonrası</a>';
                        }
                        ?>
                    </nav>
                    </div>
                    <div class="col-12 col-lg-3 p-2">
                        <?php include 'sidebar-right.php'; ?>
                    </div>
                </div>
            </div>
        </div>
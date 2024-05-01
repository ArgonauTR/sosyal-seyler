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

<body class="bg-dark text-white">
    <div class="container">

        <div class="row">
            <div class="col-lg-8">
                <div class="row">
                    <?php
                    // Sayfalama için sayfa durum denetimi
                    if (empty($_GET["page"])) {
                        $page = 1;
                    } else {
                        $page = $_GET["page"];
                    }

                    // Sayfalama Değerleri
                    $limit = $optionfetch["option_posts_per_page"]; // Bir sayfada gösterilecek elemanı belirliyor.
                    $start_limit = ($page * $limit) - $limit;

                    // Manga Sayısı bulucu.
                    $count = 0;
                    $mangaask = $db->prepare("SELECT * FROM mangas");
                    $mangaask->execute(array());
                    while ($mangafetch = $mangaask->fetch(PDO::FETCH_ASSOC)) {
                        $count++;
                    }
                    // Post sayısı kullanılarak sayfa sayısı bulundu
                    $page_count = ceil($count / $limit);

                    // Mangalar listeleniyor
                    $mangaask = $db->prepare("SELECT * FROM mangas WHERE manga_status='publish' ORDER BY manga_id DESC LIMIT $start_limit,$limit");
                    $mangaask->execute(array());
                    while ($mangafetch = $mangaask->fetch(PDO::FETCH_ASSOC)) {
                        $manga_id = $mangafetch["manga_id"];

                        //Resim Yolunu Çekiyor
                        $manga_image_id = $mangafetch["manga_image_id"];
                        $imageask = $db->prepare("SELECT * FROM images WHERE image_id=:id");
                        $imageask->execute(array('id' => $manga_image_id));
                        while ($imagefetch = $imageask->fetch(PDO::FETCH_ASSOC)) {
                            $image_title = $imagefetch["image_title"];
                            $image_link = $imagefetch["image_link"];
                        }
                    ?>

                        <div class="col-12 col-lg-4 mt-3">
                            <div class="card bg-dark border-white custom-card" style="max-height: 3000px;">
                                <div class="card-header text-center">
                                    <b class="clamp-text">
                                        <a href="<?php echo $mangafetch["manga_link"] ?>" class="text-white" style="text-decoration: none;">
                                            <?php echo $mangafetch["manga_name"] ?>
                                        </a>
                                    </b>
                                </div>
                                <div class="card-body p-2">
                                    <div class="row">
                                        <div class="col-6">
                                            <a href="<?php echo $mangafetch["manga_link"] ?>" class="text-white" style="text-decoration: none;">
                                                <img src="<?php echo $image_link ?>" style="max-height: 200px;">
                                            </a>
                                        </div>
                                        <div class="col-6">
                                            <div class="d-grid gap-2">
                                                <?php
                                                $chapterask = $db->prepare("SELECT * FROM chapters WHERE chapter_status='publish' && chapter_manga_id='$manga_id' ORDER BY chapter_num DESC LIMIT 4");
                                                $chapterask->execute(array());
                                                while ($chapterfetch = $chapterask->fetch(PDO::FETCH_ASSOC)) {
                                                    echo '<a href="' . $chapterfetch["chapter_link"] . '" class="btn btn-sm btn-outline-sm text-white border-white custom-card" type="button">Bölüm-' . $chapterfetch["chapter_num"] . '</a>';
                                                } ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                    <?php
                    }
                    ?>
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
            </div>
            <?php include 'sidebar-mindex.php'; ?>
        </div>
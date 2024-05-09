<style>
    .clamp-text {
        display: -webkit-box;
        -webkit-box-orient: vertical;
        overflow: hidden;
        -webkit-line-clamp: 3;
    }

    .clamp-title {
        display: -webkit-box;
        -webkit-box-orient: vertical;
        overflow: hidden;
        -webkit-line-clamp: 1;
    }

    .clamp-summary {
        display: -webkit-box;
        -webkit-box-orient: vertical;
        overflow: hidden;
        -webkit-line-clamp: 10;
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
        <div class="row align-items-start">
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

            // Post Sayısı bulucu.
            $count = 0;
            $postask = $db->prepare("SELECT * FROM posts");
            $postask->execute(array());
            while ($postfetch = $postask->fetch(PDO::FETCH_ASSOC)) {
                $count++;
            }
            // Post sayısı kullanılarak sayfa sayısı bulundu
            $page_count = ceil($count / $limit);

            $postask = $db->prepare("SELECT * FROM posts WHERE post_status='publish' ORDER BY post_id DESC LIMIT $start_limit,$limit");
            $postask->execute(array());
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
                    $category_color = $categoryfetch["category_color"];
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
            ?>

                <div class="col-md-3 col-sm-6 mt-4">
                    <div class="card bg-dark <?php echo "border-" . $category_color; ?> custom-card" style="height: 170px;">
                        <span class="position-absolute top-0 start-50 translate-middle badge rounded-pill <?php echo "bg-" . $category_color; ?> ps-4 pe-4 pt-2 pb-2">
                            <?php echo $category_name; ?>
                        </span>
                        <a href="<?php echo $postfetch["post_link"];  ?>" class="stretched-link" data-bs-toggle="modal" data-bs-target="<?php echo "#modal" . $post_id; ?>">
                        </a>
                        <card class="card-body text-center">
                            <h4 class="clamp-text">
                                <?php echo $postfetch["post_title"] ?>
                            </h4>

                        </card>
                        <div class="card-footer d-flex justify-content-between">
                            <span>
                                <i class="bi bi-person-circle me-1"></i>
                                <?php echo $usernick; ?>
                            </span>
                            <span>
                                <i class="bi bi-calendar-event-fill me-1"></i>
                                <?php echo parcala($postfetch["post_update_time"]); ?>
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Özet Görünümler -->
                <div class="modal fade" id="<?php echo "modal" . $post_id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content bg-secondary text-white">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5 clamp-title" id="exampleModalLabel"><?php echo $postfetch["post_title"]; ?></h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body clamp-summary">
                                <?php
                                if (isset($image_link)) {
                                    // echo '<img src="' . $image_link . '" class="img-fluid" alt="' . $image_title . '">';
                                }
                                echo $postfetch["post_content"];

                                ?>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kapat</button>
                                <a href="<?php echo $postfetch["post_link"]; ?>" class="btn btn-primary">
                                    <i class="bi bi-arrow-up-right me-1"></i>
                                    İçeriğe Git
                                </a>
                            </div>
                        </div>
                    </div>
                </div>


            <?php
            }
            ?>
        </div>
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
<style>
    .clamp-text {
        display: -webkit-box;
        -webkit-box-orient: vertical;
        overflow: hidden;
        -webkit-line-clamp: 2;
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
            $limit = 20; // Bir sayfada gösterilecek elemanı belirliyor.
            $start_limit = ($page * $limit) - $limit;

            // Post Sayısı bulucu.
            $count = 0;
            $postask = $db->prepare("SELECT * FROM posts WHERE post_status='publish' && post_category_id=$category_id");
            $postask->execute(array());
            while ($postfetch = $postask->fetch(PDO::FETCH_ASSOC)) {
                $count++;
            }
            // Post sayısı kullanılarak sayfa sayısı bulundu
            $page_count = ceil($count / $limit);

            $postask = $db->prepare("SELECT * FROM posts WHERE post_status='publish' && post_category_id=$category_id ORDER BY post_id DESC LIMIT $start_limit,$limit");
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
            ?>

                <div class="col-md-3 col-sm-6 mt-4">
                    <div class="card bg-dark <?php echo "border-" . $category_color; ?> custom-card" style="height: 350px;">
                        <span class="position-absolute top-0 start-50 translate-middle badge rounded-pill <?php echo "bg-" . $category_color; ?> ps-4 pe-4 pt-2 pb-2">
                            <?php echo $category_name; ?>
                        </span>
                        <a href="<?php echo $postfetch["post_link"];  ?>" class="stretched-link">
                            <img src="<?php echo $image_link; ?>" class="card-img-top rounded-bottom-corners" alt="<?php echo $image_title; ?>" style="height: 200px;">
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
                                <i class="bi bi-eye me-1"></i>
                                <?php echo sefnum($postfetch["post_wievs"]); ?>
                            </span>
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
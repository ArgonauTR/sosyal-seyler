<style>
    .clamp-text {
        display: -webkit-box;
        -webkit-box-orient: vertical;
        overflow: hidden;
        -webkit-line-clamp: 1;
    }

    .custom-card {
        transition: box-shadow 0.3s, border-color 0.3s;
    }

    .custom-card:hover {
        box-shadow: 0 4px 8px rgba(255, 255, 255, 0.5);
    }

    .link {
        text-decoration: none;
        color: white;
    }
</style>

<div class="col-lg-9">
    <div class="card bg-dark text-white">
        <div class="card-head">
            <div class="card-header">
                <a href="?status=publish" class="btn btn-sm btn-outline-secondary text-white mt-2" style="text-decoration: none;"><i class="bi bi-clipboard-check me-2"></i>Yayımlanmış</a>
                <a href="?status=draft" class="btn btn-sm btn-outline-secondary text-white ms-2 mt-2" style="text-decoration: none;"><i class="bi bi-clock-history me-2"></i>Taslak</a>
                <a href="./process.php?post=post-add" class="btn btn-sm btn-outline-secondary text-white ms-2 mt-2" style="text-decoration: none;"><i class="bi bi-plus-circle me-2"></i>Yazı Ekle</a>

            </div>
            <div class="card-body p-1">
                <?php
                // Listeleme için yazı yayın durumu denetimi.
                if (empty($_GET["status"])) {
                    $status = "publish";
                } else {
                    $status = $_GET["status"];
                }
                
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
                $postask = $db->prepare("SELECT * FROM posts");
                $postask->execute(array());
                while ($postfetch = $postask->fetch(PDO::FETCH_ASSOC)) {
                    $count++;
                }
                // Post sayısı kullanılarak sayfa sayısı bulundu
                $page_count = ceil($count / $limit);

                // Postlar listeleniyor
                $postask = $db->prepare("SELECT * FROM posts WHERE post_status='$status' ORDER BY post_id DESC LIMIT $start_limit,$limit");
                $postask->execute(array());
                while ($postfetch = $postask->fetch(PDO::FETCH_ASSOC)) {
                ?>
                    <div class="d-flex justify-content-between p-2 mt-2 custom-card">
                        <div class="clamp-text">
                            <b class="me-2">
                                <?php echo $postfetch["post_id"] ?>
                            </b>
                            <a href="#" class="text-white" style="text-decoration: none;">
                                <?php echo $postfetch["post_title"] ?>
                            </a>
                        </div>
                        <div class="">
                            <a class="nav-link dropdown-toggle-none" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-three-dots-vertical"></i>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="<?php echo $postfetch["post_link"]; ?>" target="_blank"><i class="bi bi-eye me-1"></i>Görüntüle</a></li>
                                <li><a class="dropdown-item" href="./process.php?post=post-update&post_id=<?php echo $postfetch["post_id"]; ?>"><i class="bi bi-pen me-1"></i>Düzenle</a></li>
                                <?php
                                if ($postfetch["post_status"] == "publish") {
                                    echo '<li><a class="dropdown-item" href="./functions/post-status.php?post_id=' . $postfetch["post_id"] . '&status=draft"><i class="bi bi-x-square me-1"></i>Askıya Al</a></li>';
                                } else {
                                    echo '<li><a class="dropdown-item" href="./functions/post-status.php?post_id=' . $postfetch["post_id"] . '&status=publish"><i class="bi bi-check2-square me-1"></i>Onayla</a></li>';
                                }
                                ?>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="./functions/post-delete.php?post_id=<?php echo $postfetch["post_id"]; ?>&status=delete"><i class="bi bi-trash me-1"></i>Sil</a></li>
                            </ul>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>

        <nav class="d-flex justify-content-center mt-3 mb-3">
            <?php
            //Öncesi sayfası
            if ($page > 1) {
                $newpage = $page - 1;
                echo '<a href="?page='.$newpage.'" class="btn btn-sm btn-outline-secondary text-white ms-1" style="text-decoration: none;"><i class="bi bi-arrow-bar-left me-2"></i>Öncesi</a>';
            }
            // Sayfa Gösterici
            echo '<a href="" class="btn btn-sm btn-outline-dark text-white disabled ms-1" style="text-decoration: none;">Sayfa ' . $page . '</a>';

            //Öncesi sayfası
            if ($page<$page_count) {
                $newpage = $page+1;
                echo '<a href="?page='.$newpage.'" class="btn btn-sm btn-outline-secondary text-white ms-1" style="text-decoration: none;"><i class="bi bi-arrow-bar-right me-2"></i>Sonrası</a>';
            }
            ?>
        </nav>
    </div>
</div>
</div>
<div class="col-12 col-lg-9">
    <div class="card">
        <div class="card-header">
            <a href="?select=draft" class="btn"><i class="bi bi-clock-history"></i> Taslaklar</a>
            <a href="?select=publish" class="btn"><i class="bi bi-check-circle"></i> Yayınlanmış</a>
        </div>
        <div class="card-body">
            <?php

            // Taslak/yayın arasındaki geçişi hafızada tutar.
            if (empty($_SESSION["select"])) {
                $_SESSION["select"] = "draft";
            } else {
                if (isset($_GET["select"])) {
                    if ($_GET["select"] == "draft") {
                        $_SESSION["select"] = "draft";
                    } else {
                        $_SESSION["select"] = "publish";
                    }
                }
            }

            $status = $_SESSION["select"];


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

            $posts = postinfo("SELECT * FROM posts WHERE post_status='$status' ORDER BY post_id DESC LIMIT $start_limit,$limit");
            if (empty($posts)) {
                echo '<p class="text-success h3"><i class="bi bi-check2-square"></i> Harika. Tüm işler bitmiş.</p>';
            }
            foreach ($posts as $post) {
            ?>
                <div class="d-flex justify-content-between p-2 mt-2 custom-card">
                    <div class="clamp-text">
                        <b class="text-decoration-none text-muted me-2">
                            <?php echo $post["post_id"] ?>
                        </b>
                        <a href="#" class="text-decoration-none text-muted">
                            <?php echo $post["post_title"] ?>
                        </a>
                    </div>
                    <div class="">
                        <a class="nav-link dropdown-toggle-none" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-three-dots-vertical"></i>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="<?php echo $post["post_link"]; ?>" target="_blank"><i class="bi bi-eye me-1"></i>Görüntüle</a></li>
                            <li><a class="dropdown-item" href="<?php echo $site_name . "/admin/process.php?type=post_update&id=" . $post["post_id"]; ?>"><i class="bi bi-pen me-1"></i>Düzenle</a></li>
                            <?php
                            if ($post["post_status"] == "publish") {
                                echo '<li><a class="dropdown-item" href="/admin/functions/post-status.php?status=draft&post_id=' . $post["post_id"] . '"><i class="bi bi-x-square me-1"></i>Askıya Al</a></li>';
                            } else {
                                echo '<li><a class="dropdown-item" href="/admin/functions/post-status.php?status=publish&post_id=' . $post["post_id"] . '"><i class="bi bi-x-square me-1"></i>Onayla</a></li>';
                            }
                            ?>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="/admin/functions/post-delete.php?post_id=<?php echo $post["post_id"]; ?>"><i class="bi bi-trash me-1"></i>Sil</a></li>
                        </ul>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
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
    </div>
</div>
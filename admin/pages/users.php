<div class="col-12 col-lg-9">
    <div class="card">
        <div class="card-header">
            <a href="?select=pending" class="btn"><i class="bi bi-clock-history"></i> Bekliyor</a>
            <a href="?select=approved" class="btn"><i class="bi bi-check-circle"></i> Onaylanmış</a>
        </div>
        <div class="card-body">
            <?php
            // Taslak/yayın arasındaki geçişi hafızada tutar.
            if (empty($_SESSION["select"])) {
                $_SESSION["select"] = "pending";
            } else {
                if (isset($_GET["select"])) {
                    if ($_GET["select"] == "pending") {
                        $_SESSION["select"] = "pending";
                    } else {
                        $_SESSION["select"] = "approved";
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
            $count_post = userinfo("SELECT * FROM users");
            $page_count = ceil(count($count_post) / $limit);

            $users = userinfo("SELECT * FROM users WHERE user_status='$status' ORDER BY user_id DESC LIMIT $start_limit,$limit");
            if(empty($users)){
                echo '<p class="text-success h3"><i class="bi bi-check2-square"></i> Harika. Tüm işler bitmiş.</p>';
            }
            foreach ($users as $user) {
            ?>
                <div class="d-flex justify-content-between p-2 mt-2 custom-card">
                    <div class="clamp-text">
                        <b class="text-decoration-none text-muted me-2">
                            <?php echo $user["user_id"] ?>
                        </b>
                        <a href="#" class="text-decoration-none text-muted">
                            <?php echo $user["user_nick"] ?>
                        </a>
                    </div>
                    <div class="">
                        <a class="nav-link dropdown-toggle-none" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-three-dots-vertical"></i>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="<?php echo $user["user_url"] ?>" target="_blank"><i class="bi bi-eye me-1"></i>Görüntüle</a></li>
                            <li><a class="dropdown-item" href="<?php echo $site_name; ?>/admin/process.php?type=user_update&user_id=<?php echo $user["user_id"] ?>"><i class="bi bi-pen me-1"></i>Düzenle</a></li>
                            <?php
                            if ($user["user_status"] == "approved") {
                                echo '<li><a class="dropdown-item" href="'.$site_name.'/admin/functions/user-status.php?user_id=' . $user["user_id"] . '&status=pending"><i class="bi bi-x-square me-1"></i>Askıya Al</a></li>';
                            } else {
                                echo '<li><a class="dropdown-item" href="'.$site_name.'/admin/functions/user-status.php?user_id=' . $user["user_id"] . '&status=approved"><i class="bi bi-check2-square me-1"></i>Onayla</a></li>';
                            }
                            ?>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="<?php echo $site_name; ?>/admin/functions/user-delete.php?user_id=<?php echo $user["user_id"]; ?>"><i class="bi bi-trash me-1"></i>Sil</a></li>
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
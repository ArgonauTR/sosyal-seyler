<div class="col-12 col-lg-9">
    <div class="card">
        <div class="card-header">
            <a href="process.php?type=image_upload" class="btn"><i class="bi bi-cloud-arrow-up"></i> Yeni Resim</a>
        </div>
        <div class="card-body">
            <?php
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
            $count_post = imageinfo("SELECT * FROM images");
            $page_count = ceil(count($count_post) / $limit);

            $images = imageinfo("SELECT * FROM images ORDER BY image_id DESC LIMIT $start_limit,$limit");
            foreach ($images as $image) {
            ?>
                <div class="d-flex justify-content-between p-2 mt-2 custom-card">
                    <div class="clamp-text">
                        <b class="text-decoration-none text-muted me-2">
                            <?php echo $image["image_id"] ?>
                        </b>
                        <img style="max-width:50px;" src="<?php echo $image["image_link"]; ?>">
                        <a href="#" class="text-decoration-none text-muted ms-2">
                            <?php echo $image["image_name"] ?>
                        </a>
                    </div>
                    <div class="">
                        <a class="nav-link dropdown-toggle-none" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-three-dots-vertical"></i>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="<?php echo "?image_id=" . $image["image_id"]; ?>"><i class="bi bi-eye me-1"></i>Görüntüle</a></li>
                            <li><a class="dropdown-item" href="<?php echo $image["image_link"]; ?>" target="_blank"><i class="bi bi-box-arrow-up-right me-1"></i>Yeni Sekmede Aç</a></li>

                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="/admin/functions/image-delete.php?image_id=<?php echo $image["image_id"]; ?>"><i class="bi bi-trash me-1"></i>Sil</a></li>
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
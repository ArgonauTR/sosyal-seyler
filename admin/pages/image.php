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
</style>

<div class="col-lg-9">
    <div class="card bg-dark text-white">
            <div class="card-header">
                <a href="" class="btn btn-sm btn-outline-secondary text-white mt-2" data-bs-toggle="modal" data-bs-target="#exampleModal" style="text-decoration: none;">
                    <i class="bi bi-file-earmark-arrow-up me-2"></i>Resim Ekle
                </a>
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content  bg-dark text-white">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel"><i class="bi bi-upload me-2"></i>Yeni Resim Ekle</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="./functions/image-upload-salt.php" method="POST" enctype="multipart/form-data">
                                    <div class="mb-3">
                                        <input type="file" class="form-control  bg-dark text-white border-primary" name="upload" required>
                                    </div>
                                    <div class="form-group mt-4 d-grid gap-2 col-6 mx-auto text-center">
                                        <button type="submit" class="btn btn-primary text-white border-primary" name="image_upload">
                                            <i class="bi bi-cloud-plus me-2"></i> Yükle
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body p-1">
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
                $imageask = $db->prepare("SELECT * FROM images");
                $imageask->execute(array());
                while ($imagefetch = $imageask->fetch(PDO::FETCH_ASSOC)) {
                    $count++;
                }
                // Post sayısı kullanılarak sayfa sayısı bulundu
                $page_count = ceil($count / $limit);

                $imageask = $db->prepare("SELECT * FROM images ORDER BY image_id DESC LIMIT $start_limit,$limit");
                $imageask->execute(array());
                while ($imagefetch = $imageask->fetch(PDO::FETCH_ASSOC)) {
                    $image_id = $imagefetch["image_id"];
                    $image_link = $imagefetch["image_link"];
                ?>
                    <div class="d-flex justify-content-between p-2 mt-2 custom-card">
                        <div class="clamp-text">
                            <b class="me-2">
                                <?php echo $imagefetch["image_id"] ?>
                            </b>
                            <img style="max-width:50px;" src="<?php echo $imagefetch["image_link"]; ?>">
                            <a href="#" class="text-white ms-2" style="text-decoration: none;">
                                <?php echo $imagefetch["image_title"] ?>
                            </a>
                        </div>
                        <div class="">
                            <a class="nav-link dropdown-toggle-none" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-three-dots-vertical"></i>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="<?php echo $image_link; ?>" target="_blank"><i class="bi bi-box-arrow-in-up-right me-1"></i>Görüntüle</a></li>
                                <li><a class="dropdown-item" href="./process.php?image=image-update&image_id=<?php echo $image_id; ?>"><i class="bi bi-pen me-1"></i>Düzenle</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="./functions/image-delete.php?image_id=<?php echo $image_id; ?>&status=delete&image-url=<?php echo  $image_link; ?>"><i class="bi bi-trash me-1"></i>Sil</a></li>
                            </ul>
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
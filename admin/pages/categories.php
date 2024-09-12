<div class="col-12 col-lg-9">
    <div class="card">
        <div class="card-header">
            <a href="<?php echo $site_name . "/admin/process.php?type=category_add"; ?>" class="btn"><i class="bi bi-plus"></i> Yeni Kategori</a>
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
            $count_post = categoryinfo("SELECT * FROM categories");
            $page_count = ceil(count($count_post) / $limit);

            $categoriyes = categoryinfo("SELECT * FROM categories ORDER BY category_title ASC LIMIT $start_limit,$limit");
            foreach ($categoriyes as $category) {
            ?>
                <div class="d-flex justify-content-between p-2 mt-2 custom-card">
                    <div class="clamp-text">
                        <a href="#" class="text-decoration-none text-muted">
                            <?php 
                            // Menüde görünecekler yıldız ile işaretleniyor.
                            if($category["category_fav"]){
                                echo '<i class="bi bi-star-fill"></i> '.$category["category_title"];
                            }else{
                                echo '<i class="bi bi-star"></i> '.$category["category_title"];
                            }                     
                            ?>
                        </a>
                    </div>
                    <div class="">
                        <a class="nav-link dropdown-toggle-none" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-three-dots-vertical"></i>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="<?php echo $category["category_link"]; ?>" target="_blank"><i class="bi bi-eye me-1"></i>Görüntüle</a></li>
                            <li><a class="dropdown-item" href="<?php echo $site_name . "/admin/process.php?type=category_update&id=" . $category["category_id"]; ?>"><i class="bi bi-pen me-1"></i>Düzenle</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="/admin/functions/category-delete.php?category_id=<?php echo $category["category_id"]; ?>"><i class="bi bi-trash me-1"></i>Sil</a></li>
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


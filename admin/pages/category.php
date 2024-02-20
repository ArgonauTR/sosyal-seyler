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
        <div class="card-body">
            <div class="card-header">
                <a href="./process.php?category=category-add" class="btn btn-sm btn-outline-secondary text-white ms-2" style="text-decoration: none;"><i class="bi bi-plus-circle me-2"></i>Kategori Ekle</a>
            </div>
            <div class="card-body p-1">
                <?php
                $categoryask = $db->prepare("SELECT * FROM categories ORDER BY category_id DESC");
                $categoryask->execute(array());
                while ($categoryfetch = $categoryask->fetch(PDO::FETCH_ASSOC)) {
                ?>
                    <div class="d-flex justify-content-between p-2 mt-2 custom-card">
                        <div class="clamp-text">
                            <b class="me-2">
                                <?php echo $categoryfetch["category_id"] ?>
                            </b>
                            <a href="#" class="<?php echo "text-".$categoryfetch["category_color"]; ?>" style="text-decoration: none;">
                                <?php echo $categoryfetch["category_title"] ?>
                            </a>
                        </div>
                        <div class="">
                            <a class="nav-link dropdown-toggle-none" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-three-dots-vertical"></i>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#"><i class="bi bi-eye me-1"></i>Görüntüle</a></li>
                                <li><a class="dropdown-item" href="./process.php?category=category-update&category_id=<?php echo $categoryfetch["category_id"] ?>"><i class="bi bi-pen me-1"></i>Düzenle</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="./functions/category-delete.php?category_id=<?php echo $categoryfetch["category_id"]; ?>&status=delete"><i class="bi bi-trash me-1"></i>Sil</a></li>
                            </ul>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
</div>
</div>
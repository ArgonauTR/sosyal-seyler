<?php
$category = categoryinfo("SELECT * FROM categories WHERE category_id=" . $_GET["id"]);
?>
<div class="col-12 col-lg-9">
    <div class="card">
        <div class="card-header">
            <i class="bi bi-pen"></i> Kategori Düzenle
        </div>
        <div class="card-body">
            <form method="POST" action="<?php echo $site_name . "/admin/functions/category-update.php"; ?>">

                <input type="text" class="form-control" name="category_id" value="<?php echo $category[0]["category_id"]; ?>" hidden>

                <div class="mb-3">
                    <input type="text" class="form-control" name="category_title" value="<?php echo $category[0]["category_title"]; ?>" placeholder="Kategori Adı">
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control" name="category_icon" value="<?php echo $category[0]["category_icon"]; ?>" placeholder="İkon Kodu">
                    <div class="form-text "><a class="text-decoration-none text-muted" href="https://icons.getbootstrap.com/"><i class="bi bi-link-45deg"></i> İkon Listesi</a></div>
                </div>
                <div class="mb-3">
                    <textarea class="form-control" rows="3" name="category_description" placeholder="Kategori Açıklamasını Girin"><?php echo $category[0]["category_description"]; ?></textarea>
                </div>
                <div class="form-check">
                    <?php
                    if ($category[0]["category_fav"] == "on") {
                        echo '<input class="form-check-input" type="checkbox" name="category_fav" checked>';
                        echo '<label class="form-check-label">Yan Menüde görünsün</label>';
                    } else {
                        echo '<input class="form-check-input" type="checkbox" name="category_fav">';
                        echo '<label class="form-check-label">Yan Menüde görünsün</label>';
                    }
                    ?>
                </div>
                <div class="form-group mt-4 d-grid gap-2 col-6 mx-auto text-center">
                    <button type="submit" class="btn btn-outline-secondary" name="category_update">
                        <i class="bi bi-pencil"></i> Güncelle
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
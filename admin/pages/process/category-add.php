<div class="col-12 col-lg-9">
    <div class="card">
        <div class="card-header">
            <i class="bi bi-pen"></i> Yeni Kategori
        </div>
        <div class="card-body">
            <form method="POST" action="<?php echo $site_name . "/admin/functions/category-add.php"; ?>">
                <div class="mb-3">
                    <input type="text" class="form-control" name="category_title" placeholder="Örn: Genel">
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control" name="category_icon" placeholder="Örn: eye">
                    <div class="form-text "><a class="text-decoration-none text-muted" target="_blank" href="https://icons.getbootstrap.com/"><i class="bi bi-link-45deg"></i> İkon Listesi</a></div>
                </div>
                <div class="mb-3">
                    <textarea class="form-control" rows="3" name="category_description" placeholder="Örn: Belirli bir kategorisi bulunmayan..."></textarea>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="category_fav">
                    <label class="form-check-label">Yan Menüde görünsün</label>
                </div>
                <div class="form-group mt-4 d-grid gap-2 col-6 mx-auto text-center">
                    <button type="submit" class="btn btn-outline-secondary" name="new_category">
                        <i class="bi bi-pencil"></i> Kayıt Et
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
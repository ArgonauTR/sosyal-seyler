<div class="col-12 col-lg-9">
    <div class="card">
        <div class="card-header">
            <i class="bi bi-menu-button-wide-fill"></i> Düzen Ekle
        </div>
        <div class="card-body">
            <form method="POST" action="<?php echo $site_name . "/admin/functions/order-add.php"; ?>">

                <div class="mb-3">
                    <input type="number" class="form-control" name="order_num" placeholder="Düzen Sıra No" required>
                </div>

                <div class="mb-3">
                    <input type="text" class="form-control" name="order_icon" placeholder="Düzen İkon Kodu" required>
                    <div class="form-text "><a class="text-decoration-none text-muted" href="https://icons.getbootstrap.com/"><i class="bi bi-link-45deg"></i> İkon Listesi</a></div>
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control" name="order_name" placeholder="Düzen Adı" required>
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control" name="order_value" placeholder="Düzen Bağlantısı" required>
                </div>

                <div class="form-group mt-4 d-grid gap-2 col-6 mx-auto text-center">
                    <button type="submit" class="btn btn-outline-secondary" name="new_order">
                        <i class="bi bi-floppy"></i> Kayıt Et
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php
$order = orderinfo("SELECT * FROM orders WHERE order_id=" . $_GET["order_id"]);
?>
<div class="col-12 col-lg-9">
    <div class="card">
        <div class="card-header">
            <i class="bi bi-menu-button-wide-fill"></i> Düzen Güncelle
        </div>
        <div class="card-body">
            <form method="POST" action="<?php echo $site_name . "/admin/functions/order-update.php"; ?>">

                <div class="mb-3">
                    <input type="number" class="form-control" name="order_id" value="<?php echo $order[0]["order_id"] ?>" hidden>
                </div>

                <div class="mb-3">
                    <input type="number" class="form-control" name="order_num" value="<?php echo $order[0]["order_num"] ?>" required>
                </div>

                <div class="mb-3">
                    <input type="text" class="form-control" name="order_icon" value="<?php echo $order[0]["order_icon"] ?>" required>
                    <div class="form-text "><a class="text-decoration-none text-muted" href="https://icons.getbootstrap.com/"><i class="bi bi-link-45deg"></i> İkon Listesi</a></div>
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control" name="order_name" value="<?php echo $order[0]["order_name"] ?>" required>
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control" name="order_value" value="<?php echo $order[0]["order_value"] ?>" required>
                </div>

                <div class="form-group mt-4 d-grid gap-2 col-6 mx-auto text-center">
                    <button type="submit" class="btn btn-outline-secondary" name="order_update">
                        <i class="bi bi-floppy"></i> Güncelle
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
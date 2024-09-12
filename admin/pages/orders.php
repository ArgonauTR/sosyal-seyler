<div class="col-12 col-lg-9">
    <div class="card">
        <div class="card-header">
            <a href="<?php echo $site_name . "/admin/process.php?type=order_add"; ?>" class="btn"><i class="bi bi-plus"></i> Düzen Ekle</a>
        </div>
        <div class="card-body">
            <?php

            $orders = orderinfo("SELECT * FROM orders ORDER BY order_num ASC");

            foreach ($orders as $order) {
            ?>
                <div class="d-flex justify-content-between p-2 mt-2 custom-card">
                    <div class="clamp-text">
                        <b class="text-decoration-none text-muted me-2">
                            <?php echo $order["order_num"] ?>
                        </b>
                        <a href="#" class="text-decoration-none text-muted">
                            <?php echo $order["order_name"] ?>
                        </a>
                    </div>
                    <div class="">
                        <a class="nav-link dropdown-toggle-none" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-three-dots-vertical"></i>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="<?php echo $order["order_value"]; ?>" target="_blank"><i class="bi bi-eye me-1"></i>Görüntüle</a></li>
                            <li><a class="dropdown-item" href="<?php echo $site_name . "/admin/process.php?type=order_update&order_id=" . $order["order_id"]; ?>"><i class="bi bi-pen me-1"></i>Düzenle</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="/admin/functions/order-delete.php?order_id=<?php echo $order["order_id"]; ?>"><i class="bi bi-trash me-1"></i>Sil</a></li>
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
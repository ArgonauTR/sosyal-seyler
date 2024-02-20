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
        <a href="./process.php?order=menu-add" class="btn btn-sm btn-outline-secondary text-white ms-2" style="text-decoration: none;"><i class="bi bi-plus-circle me-2"></i>Öğe Ekle</a>
        </div>
        <div class="card-body">
        <?php
                $orderask = $db->prepare("SELECT * FROM orders ORDER BY order_row DESC");
                $orderask->execute(array());
                while ($orderfetch = $orderask->fetch(PDO::FETCH_ASSOC)) {
                ?>
                    <div class="d-flex justify-content-between p-2 mt-2 custom-card">
                        <div class="clamp-text">
                            <b class="me-2">
                                <?php echo $orderfetch["order_row"] ?>
                            </b>
                            <a href="#" class="text-white" style="text-decoration: none;">
                                <?php echo $orderfetch["order_name"] ?>
                            </a>
                        </div>
                        <div class="">
                            <a class="nav-link dropdown-toggle-none" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-three-dots-vertical"></i>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="./functions/order-delete.php?order_id=<?php echo $orderfetch["order_id"]; ?>&status=delete"><i class="bi bi-trash me-1"></i>Sil</a></li>
                            </ul>
                        </div>
                    </div>
                <?php
                }
                ?>
               <hr>
               <b>Not:</b> Menüler ve Düzenler ileriki sürümlerde geliştirilecektir.
    </div>
</div>
</div>
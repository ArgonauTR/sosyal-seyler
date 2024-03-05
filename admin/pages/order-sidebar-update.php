<div class="col-lg-9">
    <div class="card bg-dark text-white">
        <div class="card-body">
            <div class="card-header">
                <i class="bi bi-arrow-clockwise me-1"></i>
                YAN SEKME ELEMANI GÜNCELLE
            </div>
            <div class="card-body">
                <?php
                $order_id = $_GET["order_id"];
                $orderask = $db->prepare("SELECT * FROM orders WHERE order_id=:id");
                $orderask->execute(array('id' => $order_id));
                while ($orderfetch = $orderask->fetch(PDO::FETCH_ASSOC)) {
                ?>
                <form action="./functions/sidebar-update.php" method="POST">

                    <div class="mb-3">
                        <input type="number" class="form-control bg-dark text-white" name="order_id" value="<?php echo $orderfetch["order_id"]; ?>" hidden>
                    </div>

                    <div class="mb-3">
                        <input type="number" class="form-control bg-dark text-white" name="order_row" value="<?php echo $orderfetch["order_row"]; ?>" required>
                    </div>

                    <div class="mb-3">
                        <input type="text" class="form-control bg-dark text-white" name="order_name" value="<?php echo $orderfetch["order_name"]; ?>" required>
                    </div>

                    <div class="mb-3">
                        <input type="text" class="form-control bg-dark text-white" name="order_link" value="<?php echo $orderfetch["order_link"]; ?>" required>
                    </div>

                    <div class="mb-3">
                        <textarea class="form-control" rows="7" id="editor" name="order_content"><?php echo $orderfetch["order_content"]; ?></textarea>
                    </div>

                    <div class="mb-3 text-center">
                        <button type="submit" class="btn btn-primary" name="menu_update">Kaydet & Yayınla</button>
                    </div>

                </form>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
</div>
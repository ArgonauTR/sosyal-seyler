<div class="col-lg-9">
    <div class="card bg-dark text-white">
        <div class="card-body">
            <div class="card-header">
                <i class="bi bi-arrow-clockwise me-1"></i>
                REKLAM ELEMANI GÜNCELLE
            </div>
            <div class="card-body">
                <?php
                $order_id = $_GET["order_id"];
                $orderask = $db->prepare("SELECT * FROM orders WHERE order_id=:id");
                $orderask->execute(array('id' => $order_id));
                while ($orderfetch = $orderask->fetch(PDO::FETCH_ASSOC)) {
                   $order_row = $orderfetch["order_row"];
                   $order_name = $orderfetch["order_name"];
                   $order_content = $orderfetch["order_content"];
                }
                ?>
                <form action="./functions/ads-update.php" method="POST">

                    <div class="mb-3">
                        <input type="number" class="form-control bg-dark text-white" name="order_id" value="<?php echo $order_id ?>" hidden>
                    </div>

                    <div class="mb-3">
                        <input type="number" class="form-control bg-dark text-white" name="order_row" value="<?php echo $order_row ?>" required>
                    </div>

                    <div class="mb-3">
                        <input type="text" class="form-control bg-dark text-white" name="order_name" value="<?php echo $order_name ?>" required>
                    </div>

                    <div class="mb-3">
                        <select class="form-select bg-dark text-white" name="order_ads">
                            <option value="in-header">Adsene Otomatik</option>
                            <option value="under-header">Header Altı</option>
                            <option value="top-footer">Footer Üstü</option>
                            <option value="top-comments">Yorum Üstü</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <textarea class="form-control bg-dark text-white" rows="7" name="order_content" ><?php echo $order_content; ?></textarea>
                    </div>

                    <div class="mb-3 text-center">
                        <button type="submit" class="btn btn-primary" name="ads_update">Kaydet & Yayınla</button>
                    </div>

                </form>
            </div>
            <div class="card-footer">
                HTML ve diğer kodlar kabul edilir. Dikkatli ekleyiniz.
            </div>
        </div>
    </div>
</div>
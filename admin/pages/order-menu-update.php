<div class="col-lg-9">
    <div class="card bg-dark text-white">
        <div class="card-body">
            <div class="card-header">
                <i class="bi bi-arrow-clockwise me-1"></i>
                MENÜ GÜNCELLE
            </div>
            <div class="card-body">
                <?php
                $order_id = $_GET["order_id"];
                $orderask = $db->prepare("SELECT * FROM orders WHERE order_id=:id");
                $orderask->execute(array('id' => $order_id));
                while ($orderfetch = $orderask->fetch(PDO::FETCH_ASSOC)) {
                ?>
                    <form action="./functions/menu-update.php" method="POST">

                        <div class="mb-3">
                            <input type="number" class="form-control bg-dark text-white" name="order_id" value="<?php echo $orderfetch["order_id"]; ?>" hidden>
                        </div>

                        <div class="mb-3">
                            <input type="number" class="form-control bg-dark text-white" name="order_row" value="<?php echo $orderfetch["order_row"]; ?>" required>
                        </div>

                        <div class="mb-3">
                            <input type="text" class="form-control bg-dark text-white" name="order_icon" value="<?php echo $orderfetch["order_icon"]; ?>">
                            <label class="form-check-label"><a href="https://icons.getbootstrap.com/" target="_blank" style="text-decoration: none;">İkon listesine ulaşmak için tıklayınız.</a></label>
                        </div>

                        <div class="mb-3">
                            <input type="text" class="form-control bg-dark text-white" name="order_name" value="<?php echo $orderfetch["order_name"]; ?>" required>
                        </div>

                        <div class="mb-3">
                            <input type="text" class="form-control bg-dark text-white" name="order_link" value="<?php echo $orderfetch["order_link"]; ?>" required>
                        </div>

                        <div class="mb-3">
                            <select class="form-select bg-dark text-white" name="order_status">
                                <?php
                                if($orderfetch["order_status"]=="top-menu"){
                                    echo '<option value="top-menu" selected>Üst Menü</option>';
                                    echo '<option value="footer-menu">Alt Menü</option>';
                                }elseif($orderfetch["order_status"]=="footer-menu"){
                                    echo '<option value="top-menu">Üst Menü</option>';
                                    echo '<option value="footer-menu" selected>Alt Menü</option>';
                                }
                                ?>  
                            </select>
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
<div class="col-md-4">
    <?php
    $orderask = $db->prepare("SELECT * FROM orders WHERE order_status='sidebar-mindex' ORDER BY order_row Asc");
    $orderask->execute(array());
    while ($orderfetch = $orderask->fetch(PDO::FETCH_ASSOC)) {
    ?>
        <div class="card bg-dark border-primary text-white text-center mt-3">
            <div class="card-header">
                <?php echo $orderfetch["order_name"] ?>
            </div>
            <div class="card-body">
                <?php echo $orderfetch["order_content"] ?>
                <p><a href="<?php echo $orderfetch["order_link"] ?>" class="btn btn-success">ŞİMDİ GİT</a></p>
            </div>
        </div>
    <?php
    }
    ?>
</div>
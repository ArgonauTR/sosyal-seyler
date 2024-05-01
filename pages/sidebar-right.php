<?php
$orderask = $db->prepare("SELECT * FROM orders WHERE order_status='sidebar-right' ORDER BY order_row Asc");
$orderask->execute(array());
while ($orderfetch = $orderask->fetch(PDO::FETCH_ASSOC)) {
?>
    <div class="card bg-dark border-dark text-white text-center">
        <div class="card-body">
            <?php echo $orderfetch["order_content"] ?>
            <p><a href="<?php echo $orderfetch["order_link"] ?>" class="btn btn-success">ŞİMDİ GİT</a></p>
        </div>
    </div>
<?php
}
?>
<?php
// Pop-Up satırı önceden eklenmiş mi kontrol ediliyor.
$pop_up = "pop-up";
$count = 0;
$orderask = $db->prepare("SELECT * FROM orders WHERE order_status=:pop_up");
$orderask->execute(array('pop_up' => $pop_up));
while ($orderfetch = $orderask->fetch(PDO::FETCH_ASSOC)) {
    $count++;
}

// Pop-up satırı eklenmemişse ekliyor.
if ($count == 0) {

    $orders = $db->prepare("INSERT into orders set
        order_row=:order_row,
        order_status=:order_status,
        order_name=:order_name,
        order_content=:order_content
        
        ");

    $insert = $orders->execute(array(
        'order_row' => "1",
        'order_status' => "pop-up",
        'order_name' => "Sosyal Şeyler",
        'order_content' => "Sosyal Şeyler Blog ve Manga Yazılımı"

    ));
}

// Mercut veriler Güncelle formun aktarılıyor.
$orderask = $db->prepare("SELECT * FROM orders WHERE order_status=:pop_up");
$orderask->execute(array('pop_up' => $pop_up));
while ($orderfetch = $orderask->fetch(PDO::FETCH_ASSOC)) {
    $order_id = $orderfetch["order_id"];
    $order_name = $orderfetch["order_name"];
    $order_content = $orderfetch["order_content"];
}
?>
<form action="./functions/notification-update.php" method="POST">

    <div class="mb-3">
        <input type="text" class="form-control" name="order_id" value="<?php echo $order_id; ?>" hidden>
    </div>

    <div class="mb-3">
        <input type="text" class="form-control" name="order_name" value="<?php echo $order_name; ?>">
    </div>

    <div class="mb-3">
        <textarea class="form-control" rows="7" id="editor" name="order_content"><?php echo $order_content; ?></textarea>
    </div>

    <div class="mb-3 text-center">
        <button type="submit" class="btn btn-primary" name="notification_update"><i class="bi bi-arrow-clockwise me-1"></i>Güncelle</button>
    </div>
</form>
<?php
// Ana fonskiyon dosyası ekleniyor.
include("main-function.php");

if (isset($_POST["menu_update"])) {

    $order_id = $_POST["order_id"];

    // Menü Bilgileri Veritabanına kaydediliyor
    $orders = $db->prepare("UPDATE orders set

    order_row=:order_row,
    order_content=:order_content,
    order_status=:order_status,
    order_name=:order_name,
    order_link=:order_link
    WHERE order_id=$order_id");

    $update = $orders->execute(array(
        'order_row' => $_POST["order_row"],
        'order_content'=>$_POST["order_content"],
        'order_status'=>$_POST["order_status"],
        'order_name' => $_POST["order_name"],
        'order_link' => $_POST["order_link"]
    ));

    if ($update) {

        header("Location:../order.php?status=ok");
        exit;
    } else {

        header("Location:../order.php?status=no");
        exit;
    }
}

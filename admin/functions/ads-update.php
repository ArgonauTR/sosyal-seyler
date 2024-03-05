<?php
// Ana fonskiyon dosyası ekleniyor.
include("main-function.php");

if (isset($_POST["ads_update"])) {

    $order_id = $_POST["order_id"];

    // Menü Bilgileri Veritabanına kaydediliyor
    $orders = $db->prepare("UPDATE orders set

    order_row=:order_row,
    order_name=:order_name,
    order_ads=:order_ads,
    order_content=:order_content
    WHERE order_id=$order_id");

    $update = $orders->execute(array(
        'order_row' => $_POST["order_row"],
        'order_name' => $_POST["order_name"],
        'order_ads' => $_POST["order_ads"],
        'order_content' => $_POST["order_content"]
    ));

    if ($update) {

        header("Location:../ads.php?status=ok");
        exit;
    } else {

        header("Location:../ads.php?status=no");
        exit;
    }
}

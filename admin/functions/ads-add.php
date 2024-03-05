<?php
// Ana fonskiyon dosyası ekleniyor.
include("main-function.php");

if (isset($_POST["ads_add"])) {

    $order_status = "ads";

    // Menü Bilgileri Veritabanına kaydediliyor
    $orders = $db->prepare("INSERT into orders set

    order_row=:order_row,
    order_name=:order_name,
    order_ads=:order_ads,
    order_content=:order_content,
    order_status=:order_status
    ");

    $insert = $orders->execute(array(
        'order_row' => $_POST["order_row"],
        'order_name' => $_POST["order_name"],
        'order_ads' => $_POST["order_ads"],
        'order_content' => $_POST["order_content"],
        'order_status'=>$order_status
    ));
    
    if ($insert) {

        header("Location:../ads.php?status=ok");
        exit;
    } else {

        header("Location:../ads.php?status=no");
        exit;
    }
}

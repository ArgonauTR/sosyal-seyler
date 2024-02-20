<?php
// Ana fonskiyon dosyası ekleniyor.
include("main-function.php");

if (isset($_POST["menu_add"])) {

    // Menü Bilgileri Veritabanına kaydediliyor
    $orders = $db->prepare("INSERT into orders set

    order_row=:order_row,
    order_name=:order_name,
    order_link=:order_link
    ");

    $insert = $orders->execute(array(
        'order_row' => $_POST["order_row"],
        'order_name' => $_POST["order_name"],
        'order_link' => $_POST["order_link"]
    ));

    if ($insert) {

        header("Location:../order.php?status=ok");
        exit;
    } else {

        header("Location:../order.php?status=no");
        exit;
    }
}

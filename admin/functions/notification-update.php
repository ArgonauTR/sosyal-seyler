<?php

// Ana fonskiyon dosyası ekleniyor.
include("main-function.php");

if (isset($_POST["notification_update"])) {

    $order_id = $_POST["order_id"];

    $orders = $db->prepare("UPDATE orders set
    order_name=:order_name,
    order_content=:order_content
    WHERE order_id=$order_id");

    $update = $orders->execute(array(
        'order_name' => $_POST["order_name"],
        'order_content'=>$_POST["order_content"]
    ));

    if ($update) {

        header("Location:../order.php?order=notification&status=ok");
        exit;
    } else {

        header("Location:../order.php?order=notification&status=no");
        exit;
    }
}

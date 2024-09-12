<?php

// Ana fonskiyon dosyası ekleniyor.
include("../../codex.php");

// Konu ekleme işlemi yapılıyor
if (isset($_POST['new_order'])) {

    $orders = $db->prepare("INSERT into orders set
        order_num=:order_num,
        order_icon=:order_icon,
        order_name=:order_name,
        order_value=:order_value
	");


    $insert = $orders->execute(array(
        'order_num' => $_POST["order_num"],
        'order_icon' => $_POST["order_icon"],
        'order_name' => $_POST["order_name"],
        'order_value' => $_POST["order_value"]

    ));
}


if ($insert) {
    header("Location:" . $site_name . "/admin/orders.php?status=order-add-success");
    exit;
} else {
    header("Location:" . $site_name . "/admin/orders.php?status=order-add-failed");
    exit;
}

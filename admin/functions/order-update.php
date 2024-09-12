<?php

// Ana fonskiyon dosyası ekleniyor.
include("../../codex.php");

if (isset($_POST["order_update"])) {

    $order_id = $_POST["order_id"];

    $orders = $db->prepare("UPDATE orders SET
        order_num=:order_num,
        order_icon=:order_icon,
        order_name=:order_name,
        order_value=:order_value

        WHERE order_id=$order_id");

    $update = $orders->execute(array(
        'order_num' => $_POST["order_num"],
        'order_icon' => $_POST["order_icon"],
        'order_name' => $_POST["order_name"],
        'order_value' => $_POST["order_value"]
    ));

    if ($update) {
        header("Location:" . $site_name . "/admin/process.php?type=order_update&order_id=" . $order_id . "&alert=update-success");
        exit();
    } else {
        header("Location:" . $site_name . "/admin/process.php?type=order_update&order_id=" . $order_id . "&alert=update-failed");
        exit();
    }
}

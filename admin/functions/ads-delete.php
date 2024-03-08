<?PHP

// Ana fonskiyon dosyası ekleniyor.
include("main-function.php");

if (isset($_GET["status"])) {

    $order_status =  $_GET["status"];
    $order_id = $_GET["order_id"];

    $orders = $db->prepare("DELETE FROM orders where order_id=:id");
    $delete = $orders->execute(array(
        'id' => $order_id
    ));

    if ($delete) {
        header("Location:../order.php?delete=delete-ok");
        exit();
    } else {

        header("Location:../order.php?delete=delete-no");
        exit();
    }
}

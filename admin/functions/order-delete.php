<?PHP
// Ana fonskiyon dosyası ekleniyor.
include("../../codex.php");

// Güvenlik kontrolü yapılıyor.
if (!isset($_SESSION["user_role"]) and $_SESSION["user_role"] != "admin") {
    header("Location:" . $site_name . "/?status=permission-exist");
    exit();
}

$order_id = $_GET["order_id"];

$orders = $db->prepare("DELETE from orders where order_id=:id");
$delete = $orders->execute(array(
    'id' => $order_id
));

if ($delete) {
    header("Location:../orders.php?status=draft");
    exit();
} else {

    header("Location:../orders.php?status=publish");
    exit();
}

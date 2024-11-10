<?PHP

// Ana fonskiyon dosyası ekleniyor.
include("../../codex.php");

// Güvenlik kontrolü yapılıyor.
if (!isset($_SESSION["user_role"]) and $_SESSION["user_role"] != "admin") {
    header("Location:" . $site_name . "/?status=permission-exist");
    exit();
}

$user_id = $_GET["user_id"];

$users = $db->prepare("DELETE from users where user_id=:id");
$delete = $users->execute(array(
    'id' => $user_id
));

if ($update) {
    header("Location:" . $site_name . "/admin/users.php?status=delete-success");
    exit();
} else {
    header("Location:" . $site_name . "/admin/users.php?status=delete-failed");
    exit();
}

<?PHP
// Ana fonskiyon dosyası ekleniyor.
include("../../codex.php");

// Bu kısımda kullanıcı profili güncelleniyor.

$user_id = $_POST["user_id"];

$users = $db->prepare("UPDATE users SET
user_bio=:user_bio
WHERE user_id=$user_id");

$update = $users->execute(array(
    'user_bio' => $_POST["user_bio"]
));


if ($update) {
    header("Location:" . $site_name . "/admin/process.php?type=user_update&user_id=".$_POST["user_id"]);
    exit;
} else {
    header("Location:" . $site_name . "/admin/process.php?type=user_update&user_id=".$_POST["user_id"]);
    exit;
}
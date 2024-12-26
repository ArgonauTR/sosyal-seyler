<?PHP
// Ana fonskiyon dosyası ekleniyor.
include("../codex.php");

// Bu kısımda kullanıcı profili güncelleniyor.

$user_id = $_SESSION["user_id"];

$users = $db->prepare("UPDATE users SET
user_bio=:user_bio
WHERE user_id=$user_id");

$update = $users->execute(array(
    'user_bio' => htmlspecialchars(strip_tags($_POST["user_bio"]))
));


if ($update) {
    header("Location:" . $site_name . "/user-option?alert=bio-update-success&option=message");
    exit;
} else {
    header("Location:" . $site_name . "/user-option?alert=bio-update-failed&option=message");
    exit;
}

<?PHP
// Ana fonskiyon dosyası ekleniyor.
include("../codex.php");

//Şifrelerin birbirine eşit olması denetleniyor.
if($_POST["pass_1"] !== $_POST["pass_2"]){
    header('Location:' . $site_name . '/user-option?alert=pass-not-same&option=password');
    exit;
}



//Şifre karakter sayısı denetleniyor.
$user_password_chacter_count = strlen(htmlspecialchars(strip_tags($_POST["pass_1"])));
if ($user_password_chacter_count < 5 || $user_password_chacter_count > 13) {
    header('Location:' . $site_name . '/user-option?alert=password-count&option=password');
    exit;
}

// Bu kısımda kullanıcı profili güncelleniyor.

$user_id = $_SESSION["user_id"];

$users = $db->prepare("UPDATE users SET
user_password=:user_password
WHERE user_id=$user_id");

$update = $users->execute(array(
    'user_password' => md5($_POST["pass_1"])
));


if ($update) {
    header("Location:" . $site_name . "/user-option?alert=pass-update-success&option=password");
    exit;
} else {
    header("Location:" . $site_name . "/user-option?alert=pass-update-failed&option=password");
    exit;
}

<?php

// Ana fonskiyon dosyası ekleniyor.
include("../../codex.php");

// Güvenlik kontrolü yapılıyor.
if (!isset($_SESSION["user_role"]) and $_SESSION["user_role"] != "admin") {
    header("Location:" . $site_name . "/?status=permission-exist");
    exit();
}

// Veriler Hazırlanıyor.
$user_id = $_POST["user_id"];
$user_image_url = $_POST["user_image_url"];
$user_mail = $_POST["user_mail"];
if ($_POST["user_password_permision"] == "on") {
    $user_password = md5($_POST["user_password"]);
} else {
    $user = userinfo("SELECT * FROM users WHERE user_id='$user_id'");
    $user_password = $user[0]["user_password"];
}
$user_role = $_POST["user_role"];
$user_status = $_POST["user_status"];
$user_bio = $_POST["user_bio"];

// Veritabanı hazırlanıyor.

$users = $db->prepare("UPDATE users SET
user_image_url=:user_image_url,
user_mail=:user_mail,
user_password=:user_password,
user_role=:user_role,
user_status=:user_status,
user_bio=:user_bio
WHERE user_id=$user_id");

// Bilgiler veritabanına kayıt ediliyor.
$update = $users->execute(array(
    'user_image_url' => $user_image_url,
    'user_mail' => $user_mail,
    'user_password' => $user_password,
    'user_role' => $user_role,
    'user_status' => $user_status,
    'user_bio' => $user_bio

));

// Kayıt durumuna göre yönlendirme yapılıyor.
if ($update) {
    header("Location:../process.php?type=user_update&user_id=".$user_id."&alert=user_update_success");
    exit();
} else {
    header("Location:../process.php?type=user_update&user_id=".$user_id."&alert=user_update_failed");
    exit();
}

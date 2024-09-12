<?php
// Session başladı
session_start();

// Tüm session değişkenlerini sıfırlandı
$_SESSION = array();

// Oturumu sonlandırdırıldı.
session_destroy();

// İsteğe bağlı olarak, kullanıcının tarayıcısındaki oturum çerezleri silindi.
setcookie(session_name(), '', time() - 3600, '/');

$cookie_time = time() - 360;

setcookie("user_id", $vt_id, $cookie_time, "/");
setcookie("user_image_id", $vt_image_id, $cookie_time, "/");
setcookie("user_nick", $vt_nick, $cookie_time, "/");
setcookie("user_mail", $vt_mail, $cookie_time, "/");
setcookie("user_url", $vt_url, $cookie_time, "/");
setcookie("user_status", $vt_status, $cookie_time, "/");
setcookie("user_role", $vt_role, $cookie_time, "/");


// Anasayfaya gidilior.
header('Location:/?alert=logout');
exit();

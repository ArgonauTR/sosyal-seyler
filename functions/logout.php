<?php
// Session başladı
session_start();

// Tüm session değişkenlerini sıfırlandı
$_SESSION = array();

// Oturumu sonlandırdırıldı.
session_destroy();

// İsteğe bağlı olarak, kullanıcının tarayıcısındaki oturum çerezleri silindi.
setcookie(session_name(), '', time() - 3600, '/');


// Anasayfaya gidilior.
header('Location:/');
exit();
?>

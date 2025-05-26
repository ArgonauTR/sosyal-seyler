<?php
session_start();

// Veritabanı bağlantı ayarları
$db_host = 'localhost';
$db_user = 'veri tabanı kullanıcı adınızı yazınız';
$db_pass = 'veri tabanı şifrenizi yazınız';
$db_name = 'veri tabanı adını yazınız';

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

if (!$conn) {
    die("Veritabanı bağlantısı başarısız: " . mysqli_connect_error());
}

// Varsayılan yönetici bilgileri
$admin_username = 'admin';
$admin_password = 'admin'; // Şifre açık metin olarak saklanıyor

// Yönetici şifresini dosyadan oku (settings.php ile değiştirilebilir)
$password_file = 'admin_password.txt';
if (file_exists($password_file)) {
    $admin_password = file_get_contents($password_file);
}

// Giriş kontrolü
function is_logged_in() {
    return isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true;
}
?>
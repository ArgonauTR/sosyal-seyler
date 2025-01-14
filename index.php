<?php
// Ana fonskiyon dosyası ekleniyor.
include("codex.php");

// Config dosyası yolu değişkene aktarıldı.
$file = 'config.php';
// Config dosyası yoksa kurulum sayfasına yönlendiriliyor.
if (!file_exists($file)) {
    header('Location:./pages/subpages/install.php');
    exit();
}


// Sayfa elemanları ekleniyor.
include("pages/head.php");
include("pages/nav.php");
include("pages/sidebar-left.php");
include("pages/home.php");
include("pages/sidebar-right.php");
include("pages/footer.php");

?>

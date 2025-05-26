<?php
// Ana fonskiyon dosyası ekleniyor.
include("codex.php");

// Sayfa elemanları ekleniyor.
// Header Tema Dosyasından Ekleniyor.
include("./theme/head.php");
// Navbar Tema Dosyasından Ekleniyor.
include("./theme/nav.php");
// Sol Sidebar Tema Dosyasından Ekleniyor.
include("./theme/sidebar-left.php");

if (empty($_SESSION['user_nick'])) {
    // İzinsiz işlemler anasayfaya yönlendiriliyor.

    header('Location:/?alert=no-login');
    exit();
}

$categories = categoryinfo("SELECT * FROM categories ORDER BY category_title  ASC");


include("./theme/write.php");




// Sağ Sidebar Tema Dosyasından Ekleniyor.
include("./theme/sidebar-right.php");
// Footer Tema Dosyasından Ekleniyor.
include("./theme/footer.php");

?>
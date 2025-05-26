<?php
// Ana fonskiyon dosyası ekleniyor.
include("codex.php");

// Header Tema Dosyasından Ekleniyor.
include("./theme/head.php");
// Navbar Tema Dosyasından Ekleniyor.
include("./theme/nav.php");
// Sol Sidebar Tema Dosyasından Ekleniyor.
include("./theme/sidebar-left.php");


// Doğrulama için numaralar
$value_1 = $_SESSION["value_1"] = rand(1, 10);
$value_2 = $_SESSION["value_2"] = rand(1, 10);


include("./theme/contact.php");


// Sağ Sidebar Tema Dosyasından Ekleniyor.
include("./theme/sidebar-right.php");
// Footer Tema Dosyasından Ekleniyor.
include("./theme/footer.php");

?>
<?php
// Ana fonskiyon dosyası ekleniyor.
include("codex.php");

// Header Tema Dosyasından Ekleniyor.
include("./theme/head.php");
// Navbar Tema Dosyasından Ekleniyor.
include("./theme/nav.php");
// Sol Sidebar Tema Dosyasından Ekleniyor.
include("./theme/sidebar-left.php");

if (!isset($_GET["nick"]) or !isset($_GET["key"])) {
    header('Location:/?alert=access-denied');
    exit();
}

// Değişkenler hazırlanıyor.
$nick = $_GET["nick"];
$key = $_GET["key"];

include("./theme/new-password.php");


// Sağ Sidebar Tema Dosyasından Ekleniyor.
include("./theme/sidebar-right.php");
// Footer Tema Dosyasından Ekleniyor.
include("./theme/footer.php");

<?php
// Ana fonskiyon dosyası ekleniyor.
include("../codex.php");

// Header ekleniyor.
include("pages/head.php");

// Navbar ekleniyor.
include("pages/nav.php");

// İşlem tipi değişkene aktarlılıyor.
$type = $_GET["type"];

// İşlem tipine göre sayfalar çağrılıyor.
switch ($type) {
    case "post_update": // Post güncelleme işlemiyapılıyor.
        include("pages/process/post-update.php");
        break;
    case "comment_update": // Yorum güncelleme işlemiyapılıyor.
        include("pages/process/comment-update.php");
        break;
    case "category_add": // Kategori ekleme yapıyor.
        include("pages/process/category-add.php");
        break;
    case "category_update": // Kategori ekleme yapıyor.
        include("pages/process/category-update.php");
        break;
    case "image_upload": // Resim yüklemsi yapıyor
        include("pages/process/image-upload.php");
        break;
    case "contact-read": // Mesaj Okunuyor.
        include("pages/process/contact-read.php");
        break;
    case "order_add": // Düzen Ekleniyor
        include("pages/process/order-add.php");
        break;
    case "order_update": // Düzen Güncelleniyor
        include("pages/process/order-update.php");
        break;
    case "user_update": // Üye Güncelleniyor
        include("pages/process/user-update.php");
        break;
}

//footer ekleniyor.
include("pages/footer.php");

<?php
if (isset($_GET)) {

    /*
        proccess.php dışarıdan gelen ekle,sil ve güncelle işlemlerini bir merkezden yönetmeyi sağlar.
        Klasik islem.php gibi çalışır ama sadece köprü görevi görür.
        İşlemler function klasörünün içindedir.
    */

    // -----> POST İŞLEMLERİ
    if (isset($_GET["post"])) {

        // Post Ekleme
        if ($_GET["post"] == "post-add") {
            include("pages/post-add.php");
        }

        // Post Silme
        if ($_GET["post"] == "post-update") {
            include("pages/post-update.php");
        }
    }

    // ------> KATEGORİ İŞLEMLERİ
    if (isset($_GET["category"])) {

        // Kategori Ekleme
        if ($_GET["category"] == "category-add") {
            include("pages/category-add.php");
        }

        // Kategori Güncelleme
        if ($_GET["category"] == "category-update") {
            include("pages/category-update.php");
        }
    }

    // ------> KATEGORİ İŞLEMLERİ
    if (isset($_GET["comment"])) {

        // Kategori Güncelleme
        if ($_GET["comment"] == "comment-update") {
            include("pages/comment-update.php");
        }
    }

    // ------> RESİM İŞLEMLERİ
    if (isset($_GET["image"])) {

        // Resim Güncelleme
        if ($_GET["image"] == "image-update") {
            include("pages/image-update.php");
        }
    }

    // ------> ÜYE İŞLEMLERİ
    if (isset($_GET["user"])) {

        // Üye Güncelleme
        if ($_GET["user"] == "user-update") {
            include("pages/user-update.php");
        }
    }

    // ------> MESAJ İŞLEMLERİ
    if (isset($_GET["message"])) {

        // Mesaj Okuma
        if ($_GET["message"] == "read") {
            include("pages/message-read.php");
        }
    }

    // ------> DÜZEN İŞLEMLERİ
    if (isset($_GET["order"])) {

        // Mesaj Okuma
        if ($_GET["order"] == "menu-add") {
            include("pages/menu-add.php");
        }
    }
}

<?PHP

// Ana fonskiyon dosyası ekleniyor.
include("../../codex.php");

// Gelen değer olup olmadığı kontrol ediliyor.
if (isset($_POST["ad_update"])) {

    $db->prepare("UPDATE ads SET ad_value = ? WHERE ad_name = ?")->execute([$_POST["ad_head"],"ad_head"]);
    $db->prepare("UPDATE ads SET ad_value = ? WHERE ad_name = ?")->execute([$_POST["ad_post_page"],"ad_post_page"]);
    $db->prepare("UPDATE ads SET ad_value = ? WHERE ad_name = ?")->execute([$_POST["ad_footer"],"ad_footer"]);


}

// İşlem bitince Ayarlar tablosuna yönlendirme yapılıyor.
header("Location:" . $site_name . "/admin/ads.php?alert=ad-success");
exit;

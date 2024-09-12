<?PHP

// Ana fonskiyon dosyası ekleniyor.
include("../../codex.php");

// Gelen değer olup olmadığı kontrol ediliyor.
if (isset($_POST["options_update"])) {

    $db->prepare("UPDATE options SET option_value = ? WHERE option_name = ?")->execute([$_POST["option_site_title"],"option_site_title"]);
    $db->prepare("UPDATE options SET option_value = ? WHERE option_name = ?")->execute([$_POST["option_site_description"],"option_site_description"]);
    $db->prepare("UPDATE options SET option_value = ? WHERE option_name = ?")->execute([$_POST["option_favicon_link"],"option_favicon_link"]);
    $db->prepare("UPDATE options SET option_value = ? WHERE option_name = ?")->execute([$_POST["option_light_logo_link"],"option_light_logo_link"]);
    $db->prepare("UPDATE options SET option_value = ? WHERE option_name = ?")->execute([$_POST["option_dark_logo_link"],"option_dark_logo_link"]);
    $db->prepare("UPDATE options SET option_value = ? WHERE option_name = ?")->execute([$_POST["option_footer_text"],"option_footer_text"]);
    $db->prepare("UPDATE options SET option_value = ? WHERE option_name = ?")->execute([$_POST["option_default_theme"],"option_default_theme"]);
    $db->prepare("UPDATE options SET option_value = ? WHERE option_name = ?")->execute([$_POST["option_analitics_code"],"option_analitics_code"]);
    $db->prepare("UPDATE options SET option_value = ? WHERE option_name = ?")->execute([$_POST["option_search_console_theme"],"option_search_console_theme"]);
    $db->prepare("UPDATE options SET option_value = ? WHERE option_name = ?")->execute([$_POST["option_adsense_code"],"option_adsense_code"]);
    $db->prepare("UPDATE options SET option_value = ? WHERE option_name = ?")->execute([$_POST["option_fixed_top"],"option_fixed_top"]);

}

// İşlem bitince Ayarlar tablosuna yönlendirme yapılıyor.
header("Location:" . $site_name . "/admin/options.php?alert=option-success");
exit;

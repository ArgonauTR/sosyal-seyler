<?php
/*
    Sitede gösterilecek metalar aşağıda hazırlanmıştır. 
    Bu kodlar sitenin arama motorlarındaki görünürlüğünü çok büyük oranda etkiler.
*/

// Sayfa seoları için url alıyor.
$url = $_SERVER['REQUEST_URI'];
$path = parse_url($url, PHP_URL_PATH);
?>

    <!-- WebSite Standart Metas -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="content-language" content="tr-TR">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="robots" content="index, follow">
    <meta name="googlebot" content="index, follow">
    <meta name="google" content="notranslate" />

    <!-- WebSite ID Metas -->
    <link rel="sitemap" type="application/xml" title="Site Haritası" href="<?php echo $site_name . "/sitemap.xml"; ?>">
    <link rel="icon" href="<?php echo optioninfo("option_favicon_link"); ?>">
    <link rel="apple-touch-icon" href="<?php echo optioninfo("option_favicon_link"); ?>">
    <link rel="link" href="https://sosyalseyler.com/">

    <!--WebSite Source Metas -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo $site_name . "/style/style.css" ?>">
    <link href="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.snow.css" rel="stylesheet" />

<?php
if (isset($_GET["post_id"])) { // ---> POST METALARI
    // Get den ID çekiliyor.
    $post_id = htmlspecialchars(strip_tags($_GET["post_id"]));
    // ID ile post bilgileri çekiliyor
    $post = postinfo("SELECT * FROM posts WHERE post_id=" . $post_id);
    // Kategori adı çeklidi.
    $category = categoryinfo("SELECT * FROM categories WHERE category_id=" . $post[0]["post_category_id"]);
    // Kullanıcı adı çekildi.
    $user = userinfo("SELECT * FROM users WHERE user_id=" . $post[0]["post_author_id"]);
?>
    <!-- Post Metas -->
    <title><?php echo $post[0]["post_title"] . " - " . optioninfo("option_site_title"); ?></title>
    <meta name="description" content="<?php echo htmlspecialchars(strip_tags(substr($post[0]["post_content"], 0, 250))); ?>" />
    <link rel="canonical" href="<?php echo $post[0]["post_link"]; ?>" type="text/html" />
    <meta name="author" content="<?php echo $user[0]["user_nick"]; ?>">
    <meta name="keywords" content="<?php echo $category[0]["category_title"]; ?>">

    <!-- OG Metas -->
    <meta property="og:locale" content="tr_TR">
    <meta property="og:site_name" content="<?php echo optioninfo("option_site_title"); ?>">
    <meta property="og:title" content="<?php echo $post[0]["post_title"]; ?>" />
    <meta property="og:type" content="article" />
    <meta property="og:url" content="<?php echo $post[0]["post_link"]; ?>">
    <meta property="og:description" content="<?php echo htmlspecialchars(strip_tags(substr($post[0]["post_content"], 0, 250))); ?>" />
    <meta property="article:published_time" content="<?php echo $post[0]["post_create_time"]; ?>" />
    <meta property="article:section" content="<?php echo $category[0]["category_title"]; ?>" />
    <meta property="article:tag" content="<?php echo $category[0]["category_title"]; ?>" />
    <meta property="article:author" content="<?php echo $user[0]["user_nick"]; ?>" />

    <!-- Twitter Metas -->
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:title" content="<?php echo $post[0]["post_title"]; ?>" />
    <meta name="twitter:description" content="<?php echo htmlspecialchars(strip_tags(substr($post[0]["post_content"], 0, 250))); ?>" />
    <meta name="twitter:site" content="<?php echo $site_name; ?>" />
    <meta name="twitter:creator" content="<?php echo $user[0]["user_nick"]; ?>" />
    <meta name="twitter:url" content="<?php echo $post[0]["post_link"]; ?>">
<?php
} elseif (isset($_GET["category_title"])) { // ---> KATEGORİ METALARI
    $category_title_sef = htmlspecialchars(strip_tags($_GET["category_title"]));
    $category = categoryinfo("SELECT * FROM categories WHERE category_title_sef='$category_title_sef'");
?>
    <!-- Category Metas -->
    <title><?php echo $category[0]["category_title"] . " İçerikleri - " . optioninfo("option_site_title");  ?></title>
    <meta name="description" content="<?php echo $category[0]["category_description"]; ?>" />
    <link rel="canonical" href="<?php echo $category[0]["category_link"]; ?>" type="text/html" />
    <meta property="og:site_name" content="<?php echo optioninfo("option_site_title"); ?>">

    <!-- OG Metas -->
    <meta property="og:title" content="<?php echo $category[0]["category_title"] . " İçerikleri";  ?>">
    <meta property="og:description" content="<?php echo $category[0]["category_description"]; ?>">
    <meta property="og:url" content="<?php echo $category[0]["category_link"]; ?>">
    <meta property="og:locale" content="tr_TR">

    <!-- Twitter Metas -->
    <meta name="twitter:title" content="<?php echo $category[0]["category_title"] . " İçerikleri";  ?>">
    <meta name="twitter:url" content="<?php echo $category[0]["category_link"]; ?>">
    <meta name="twitter:description" content="<?php echo $category[0]["category_description"]; ?>">

<?php
} elseif (isset($_GET["user_nick"])) { // ---> ÜYE METALARI
    $nick = htmlspecialchars(strip_tags($_GET["user_nick"]));
    $user = userinfo("SELECT * FROM users WHERE user_nick='$nick'");
?>
    <!-- User Metas -->
    <title><?php echo $user[0]["user_nick"] . " - " . optioninfo("option_site_title");  ?></title>
    <meta name="description" content="<?php echo $user[0]["user_bio"]; ?>" />
    <link rel="canonical" href="<?php echo $user[0]["user_url"]; ?>" type="text/html" />
    <meta property="og:site_name" content="<?php echo optioninfo("option_site_title"); ?>">

    <!-- OG Metas -->
    <meta property="og:title" content="<?php echo $user[0]["user_nick"];  ?>">
    <meta property="og:description" content="<?php echo $user[0]["user_bio"]; ?>">
    <meta property="og:url" content="<?php echo $user[0]["user_url"]; ?>">
    <meta property="og:locale" content="tr_TR">

    <!-- Twitter Metas -->
    <meta name="twitter:title" content="<?php echo $user[0]["user_nick"];  ?>">
    <meta name="twitter:url" content="<?php echo $user[0]["user_url"]; ?>">
    <meta name="twitter:description" content="<?php echo $user[0]["user_bio"]; ?>">
<?php
} elseif ($path == "/") { // -- ANASAYFA METALARI
?>
    <!-- İndex Metas -->
    <title><?php echo optioninfo("option_site_title") . " - " . optioninfo("option_site_description");  ?></title>
    <meta name="description" content="<?php echo optioninfo("option_site_description"); ?>" />
    <link rel="canonical" href="<?php echo $site_name; ?>" type="text/html" />
    <meta property="og:site_name" content="<?php echo optioninfo("option_site_title"); ?>">

    <!-- OG Metas -->
    <meta property="og:title" content="<?php echo optioninfo("option_site_title"); ?>">
    <meta property="og:description" content="<?php echo optioninfo("option_site_description"); ?>">
    <meta property="og:url" content="<?php echo $site_name; ?>">
    <meta property="og:locale" content="tr_TR">

    <!-- Twitter Metas -->
    <meta name="twitter:title" content="<?php echo optioninfo("option_site_title"); ?>">
    <meta name="twitter:url" content="<?php echo $site_name; ?>">
    <meta name="twitter:description" content="<?php echo optioninfo("option_site_description"); ?>">
<?php
} elseif ($path == "/categories") {  // ---> KATEGORİLER GENEL METALARI
?>
    <!-- All Categories Metas -->
    <title><?php echo "Tüm Kategoriler - " . optioninfo("option_site_title");  ?></title>
    <meta name="description" content="<?php echo optioninfo("option_site_title") . " web sitesinin tüm kategorileri"; ?>" />
    <link rel="canonical" href="<?php echo $site_name . "/categories"; ?>" type="text/html" />
    <meta property="og:site_name" content="<?php echo optioninfo("option_site_title"); ?>">

    <!-- OG Metas -->
    <meta property="og:title" content="Tüm Kategoriler">
    <meta property="og:description" content="<?php echo optioninfo("option_site_title") . " web sitesinin tüm kategorileri"; ?>">
    <meta property="og:url" content="<?php echo $site_name . "/categories"; ?>">
    <meta property="og:locale" content="tr_TR">

    <!-- Twitter Metas -->
    <meta name="twitter:title" content="Tüm Kategoriler">
    <meta name="twitter:url" content="<?php echo $site_name . "/categories"; ?>">
    <meta name="twitter:description" content="<?php echo optioninfo("option_site_title") . " web sitesinin tüm kategorileri"; ?>">
<?php
} elseif ($path == "/contact") { // --> İLETİŞİM METALARI
?>
    <!-- Contact Metas -->
    <title><?php echo "İletişim - " . optioninfo("option_site_title");  ?></title>
    <meta name="description" content="<?php echo optioninfo("option_site_title") . " İletişim Sayfası"; ?>" />
    <link rel="canonical" href="<?php echo $site_name . "/contact"; ?>" type="text/html" />
    <meta property="og:site_name" content="<?php echo optioninfo("option_site_title"); ?>">

    <!-- OG Metas -->
    <meta property="og:title" content="<?php echo "İletişim - " . optioninfo("option_site_title");  ?>">
    <meta property="og:description" content="<?php echo optioninfo("option_site_title") . " İletişim Sayfası"; ?>>">
    <meta property="og:url" content="<?php echo $site_name . "/contact"; ?>">
    <meta property="og:locale" content="tr_TR">

    <!-- Twitter Metas -->
    <meta name="twitter:title" content="<?php echo "İletişim - " . optioninfo("option_site_title");  ?>">
    <meta name="twitter:url" content="<?php echo $site_name . "/contact"; ?>">
    <meta name="twitter:description" content="<?php echo optioninfo("option_site_title") . " İletişim Sayfası"; ?>">
<?php
} elseif ($path == "/write") {  // --> YENİ KONU METALARI
?>
    <!-- New Post Metas -->
    <title><?php echo "Yeni Konu - " . optioninfo("option_site_title");  ?></title>
    <meta name="description" content="<?php echo optioninfo("option_site_title") . " Yeni Konu Sayfası"; ?>" />
    <link rel="canonical" href="<?php echo $site_name . "/write"; ?>" type="text/html" />
    <meta property="og:site_name" content="<?php echo optioninfo("option_site_title"); ?>">

    <!-- OG Metas -->
    <meta property="og:title" content="<?php echo "Yeni Konu - " . optioninfo("option_site_title");  ?>">
    <meta property="og:description" content="<?php echo optioninfo("option_site_title") . " Yeni Konu Sayfası"; ?>>">
    <meta property="og:url" content="<?php echo $site_name . "/write"; ?>">
    <meta property="og:locale" content="tr_TR">

    <!-- Twitter Metas -->
    <meta name="twitter:title" content="<?php echo "Yeni Konu - " . optioninfo("option_site_title");  ?>">
    <meta name="twitter:url" content="<?php echo $site_name . "/write"; ?>">
    <meta name="twitter:description" content="<?php echo optioninfo("option_site_title") . " Yeni Konu Sayfası"; ?>">

<?php
} elseif ($path == "/user-option") {  // --> AYARLAR METALARI
?>
    <!-- User Options Metas -->
    <title><?php echo "Üye Ayarları - " . optioninfo("option_site_title");  ?></title>
    <meta name="description" content="<?php echo optioninfo("option_site_title") . " Üye Ayarları Sayfası"; ?>" />
    <link rel="canonical" href="<?php echo $site_name . "/user-option"; ?>" type="text/html" />
    <meta property="og:site_name" content="<?php echo optioninfo("option_site_title"); ?>">

    <!-- OG Metas -->
    <meta property="og:title" content="<?php echo "Üye Ayarları - " . optioninfo("option_site_title");  ?>">
    <meta property="og:description" content="<?php echo optioninfo("option_site_title") . " Üye Ayarları Sayfası"; ?>>">
    <meta property="og:url" content="<?php echo $site_name . "/user-option"; ?>">
    <meta property="og:locale" content="tr_TR">

    <!-- Twitter Metas -->
    <meta name="twitter:title" content="<?php echo "Üye Ayarları - " . optioninfo("option_site_title");  ?>">
    <meta name="twitter:url" content="<?php echo $site_name . "/user-option"; ?>">
    <meta name="twitter:description" content="<?php echo optioninfo("option_site_title") . " Üye Ayarları Sayfası"; ?>">
<?php
} elseif ($path == "/login") {  // --> GİRİŞ METALARI
?>
    <!-- Login Metas -->
    <title><?php echo "Giriş - " . optioninfo("option_site_title");  ?></title>
    <meta name="description" content="<?php echo optioninfo("option_site_title") . " Giriş Sayfası"; ?>" />
    <link rel="canonical" href="<?php echo $site_name . "/login"; ?>" type="text/html" />
    <meta property="og:site_name" content="<?php echo optioninfo("option_site_title"); ?>">

    <!-- OG Metas -->
    <meta property="og:title" content="<?php echo "Giriş - " . optioninfo("option_site_title");  ?>">
    <meta property="og:description" content="<?php echo optioninfo("option_site_title") . " Giriş Sayfası"; ?>>">
    <meta property="og:url" content="<?php echo $site_name . "/login"; ?>">
    <meta property="og:locale" content="tr_TR">

    <!-- Twitter Metas -->
    <meta name="twitter:title" content="<?php echo "Giriş - " . optioninfo("option_site_title");  ?>">
    <meta name="twitter:url" content="<?php echo $site_name . "/login"; ?>">
    <meta name="twitter:description" content="<?php echo optioninfo("option_site_title") . " Giriş Sayfası"; ?>">
<?php
} elseif ($path == "/registry") {  // --> KAYIT METALARI
?>
    <!-- Registry Metas -->
    <title><?php echo "Kayıt - " . optioninfo("option_site_title");  ?></title>
    <meta name="description" content="<?php echo optioninfo("option_site_title") . " Kayıt Sayfası"; ?>" />
    <link rel="canonical" href="<?php echo $site_name . "/registry"; ?>" type="text/html" />
    <meta property="og:site_name" content="<?php echo optioninfo("option_site_title"); ?>">

    <!-- OG Metas -->
    <meta property="og:title" content="<?php echo "Kayıt - " . optioninfo("option_site_title");  ?>">
    <meta property="og:description" content="<?php echo optioninfo("option_site_title") . " Kayıt Sayfası"; ?>>">
    <meta property="og:url" content="<?php echo $site_name . "/registry"; ?>">
    <meta property="og:locale" content="tr_TR">

    <!-- Twitter Metas -->
    <meta name="twitter:title" content="<?php echo "Kayıt - " . optioninfo("option_site_title");  ?>">
    <meta name="twitter:url" content="<?php echo $site_name . "/registry"; ?>">
    <meta name="twitter:description" content="<?php echo optioninfo("option_site_title") . " Kayıt Sayfası"; ?>">
<?php
} elseif ($path == "/search") {  // --> KAYIT METALARI
?>
    <!-- Registry Metas -->
    <title><?php echo "Arama Sayfası - " . optioninfo("option_site_title");  ?></title>
    <meta name="description" content="<?php echo optioninfo("option_site_title") . " Arama Sayfası Sayfası"; ?>" />
    <link rel="canonical" href="<?php echo $site_name . "/search"; ?>" type="text/html" />
    <meta property="og:site_name" content="<?php echo optioninfo("option_site_title"); ?>">

    <!-- OG Metas -->
    <meta property="og:title" content="<?php echo "Arama Sayfası - " . optioninfo("option_site_title");  ?>">
    <meta property="og:description" content="<?php echo optioninfo("option_site_title") . " Arama Sayfası Sayfası"; ?>>">
    <meta property="og:url" content="<?php echo $site_name . "/search"; ?>">
    <meta property="og:locale" content="tr_TR">

    <!-- Twitter Metas -->
    <meta name="twitter:title" content="<?php echo "Arama Sayfası - " . optioninfo("option_site_title");  ?>">
    <meta name="twitter:url" content="<?php echo $site_name . "/search"; ?>">
    <meta name="twitter:description" content="<?php echo optioninfo("option_site_title") . " Arama Sayfası Sayfası"; ?>">
<?php
}
?>
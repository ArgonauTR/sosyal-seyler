<?php
ob_start();
session_start();
date_default_timezone_set('Europe/Istanbul');

//Ayar tablosu sorgusu başta çekilerek siteye yayıldı
$optionask = $db->prepare("SELECT * FROM options WHERE option_id=:id");
$optionask->execute(array(
    'id' => 0
));
$optionfetch = $optionask->fetch(PDO::FETCH_ASSOC);

//Logo Yolu Çekiyor 
$post_thumbnail_id = $optionfetch["option_logo_image"];
$imageask = $db->prepare("SELECT * FROM images WHERE image_id=:id");
$imageask->execute(array('id' => $post_thumbnail_id));
while ($imagefetch = $imageask->fetch(PDO::FETCH_ASSOC)) {
    $option_logo_image_id = $imagefetch["image_id"];
    $option_logo_image_link = $imagefetch["image_link"];
}
//İcon Yolu Çekiyor
$post_thumbnail_id = $optionfetch["option_favicon_image"];
$imageask = $db->prepare("SELECT * FROM images WHERE image_id=:id");
$imageask->execute(array('id' => $post_thumbnail_id));
while ($imagefetch = $imageask->fetch(PDO::FETCH_ASSOC)) {
    $option_favicon_image_id = $imagefetch["image_id"];
    $option_favicon_image_link = $imagefetch["image_link"];
}

// Aşağıda ki fonskiyon tarihi parçalayıp sadece yılı döndürüyor.
function parcala($tarih)
{
    $parca = explode(" ", $tarih);
    return $parca[0];
}

// Bakım sayfasına yönlendirme yapıyor.
if ($optionfetch["option_maintenance"] == "yes") {
    if ($_SESSION['user_role'] !== "admin") {
        header("Location:../maintenance");
    }
}
?>
<!doctype html>
<html lang="tr" prefix="og: https://ogp.me/ns#">

<head>

    <!-- WebSite Metas -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="content-language" content="tr-TR">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="robots" content="index, follow">
    <meta name="googlebot" content="index, follow">
    <link rel="sitemap" type="application/xml" title="Site Haritası" href="<?php echo $optionfetch["option_url"] . "/sitemap.xml"; ?>">

    <!-- WebSite ID Metas -->
    <link rel="icon" href="<?php echo $option_favicon_image_link; ?>">
    <link rel="apple-touch-icon" href="<?php echo $option_favicon_image_link; ?>">

    <?php
    if (@$_GET["post_id"]) {
        $post_id = $_GET["post_id"];
        $postask = $db->prepare("SELECT * FROM posts WHERE post_id=:id");
        $postask->execute(array('id' => $post_id));
        while ($postfetch = $postask->fetch(PDO::FETCH_ASSOC)) {

            //Yazar Adını Çekiyor.
            $post_author_id = $postfetch["post_author_id"];
            $userask = $db->prepare("SELECT * FROM users WHERE user_id=:id");
            $userask->execute(array('id' => $post_author_id));
            while ($userfetch = $userask->fetch(PDO::FETCH_ASSOC)) {
                $usernick = $userfetch["user_nick"];
            }
            //Kategori Adını Çekiyor
            $post_category_id = $postfetch["post_category_id"];
            $categoryask = $db->prepare("SELECT * FROM categories WHERE category_id=:id");
            $categoryask->execute(array('id' => $post_category_id));
            while ($categoryfetch = $categoryask->fetch(PDO::FETCH_ASSOC)) {
                $category_name = $categoryfetch["category_title"];
            }
            //Resim Yolunu Çekiyor
            $post_thumbnail_id = $postfetch["post_thumbnail_id"];
            $imageask = $db->prepare("SELECT * FROM images WHERE image_id=:id");
            $imageask->execute(array('id' => $post_thumbnail_id));
            while ($imagefetch = $imageask->fetch(PDO::FETCH_ASSOC)) {
                $image_title = $imagefetch["image_title"];
                $image_link = $imagefetch["image_link"];
                $image_height = $imagefetch["image_height"];
                $image_width = $imagefetch["image_width"];
                $image_title = $imagefetch["image_title"];
                $image_type = $imagefetch["image_type"];
            }
    ?>
            <!-- Post Metas -->
            <title><?php echo $postfetch["post_title"]; ?></title>
            <meta name="description" content="<?php echo $postfetch["post_description"]; ?>" />
            <link rel="canonical" href="<?php echo $postfetch["post_link"]; ?>" type="text/html" />
            <meta name="keywords" content="<?php echo $category_name; ?>">
            <meta name="robots" content="index, follow">
            <meta name="author" content="<?php echo $usernick; ?>">
            <meta name="last-modified" content="<?php echo $postfetch["post_time"]; ?>">

            <!-- OG Metas -->
            <meta property="og:locale" content="tr_TR">
            <meta property="og:site_name" content="<?php echo $optionfetch["option_name"]; ?>">
            <meta property="og:title" content="<?php echo $postfetch["post_title"]; ?>" />

            <meta property="og:type" content="article" />
            <meta property="og:url" content="<?php echo $postfetch["post_link"]; ?>">
            <meta property="og:description" content="<?php echo $postfetch["post_description"]; ?>" />
            <meta property="article:published_time" content="<?php echo $postfetch["post_update_time"]; ?>" />
            <meta property="article:modified_time" content="<?php echo $postfetch["post_time"]; ?>" />
            <meta property="og:updated_time" content="<?php echo $postfetch["post_update_time"]; ?>" />
            <meta property="article:section" content="<?php echo $category_name; ?>" />
            <meta property="article:tag" content="<?php echo $category_name; ?>" />
            <meta property="article:author" content="<?php echo $usernick; ?>" />

            <meta property="og:image:secure_url" content="<?php echo $image_link; ?>" />
            <meta property="og:image" content="<?php echo $image_link; ?>" />
            <meta property="og:image:alt" content="<?php echo $image_title; ?>" />
            <meta property="og:image:width" content="<?php echo $image_width; ?>" />
            <meta property="og:image:height" content="<?php echo $image_height; ?>" />
            <meta property="og:image:type" content="<?php echo "image/" . $image_type; ?>" />

            <!-- Twitter Metas -->
            <meta name="twitter:card" content="summary" />
            <meta name="twitter:title" content="<?php echo $postfetch["post_title"]; ?>" />
            <meta name="twitter:description" content="<?php echo $postfetch["post_description"]; ?>" />
            <meta name="twitter:site" content="<?php echo $usernick; ?>" />
            <meta name="twitter:creator" content="<?php echo $usernick; ?>" />
            <meta name="twitter:image" content="<?php echo $image_link; ?>" />

        <?php }
    } else { ?>

        <!-- Page Metas -->
        <title><?php echo $optionfetch["option_name"] ?></title>
        <meta name="description" content="<?php echo $optionfetch["option_description"]; ?>" />
        <link rel="canonical" href="<?php echo $optionfetch["option_url"]; ?>" type="text/html" />
        <meta name="keywords" content=""><!-- Gelecek -->
        <meta name="robots" content="index, follow">
        <meta name="author" content="#"><!-- Gelecek -->

        <!-- OG Metas -->
        <meta property="og:locale" content="tr_TR">
        <meta property="og:site_name" content="<?php echo $optionfetch["option_name"]; ?>">
        <meta property="og:title" content="<?php echo $optionfetch["option_name"]; ?>" />
        <meta property="og:type" content="website" />
        <meta property="og:url" content="<?php echo $optionfetch["option_url"]; ?>">
        <meta property="og:description" content="<?php echo $optionfetch["option_description"]; ?>" />
        <meta property="article:author" content="#" /><!-- Gelecek -->
        <meta property="og:image" content="<?php echo $optionfetch["option_background_image"]; ?>" />

        <!-- Twitter Metas -->
        <meta name="twitter:card" content="summary" />
        <meta name="twitter:title" content="<?php echo $optionfetch["option_name"]; ?>" />
        <meta name="twitter:description" content="<?php echo $optionfetch["option_description"]; ?>" />
        <meta name="twitter:site" content="<?php echo $optionfetch["option_url"]; ?>" />
        <meta name="twitter:creator" content="#" /><!-- Gelecek -->
        <meta name="twitter:image" content="<?php echo $optionfetch["option_background_image"]; ?>" />

    <?php } ?>

    <!-- Referances -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Lobster&display=swap">
    <?php
// HEADER İÇİ REKLAMINI GÖSTERİYOR
$ads_where = "in-header";
$orderask = $db->prepare("SELECT * FROM orders WHERE order_status='ads' && order_ads='$ads_where'  ORDER BY order_row DESC");
$orderask->execute(array());
while ($orderfetch = $orderask->fetch(PDO::FETCH_ASSOC)) {
    echo $orderfetch["order_content"]."<br>";
}
?>
</head>
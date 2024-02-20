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

// Giriş için yetki sınanıyor.
if (empty($_SESSION['user_role']) || $_SESSION['user_role'] !== "admin") {
    header("Location:/?status=access-denied");
    exit();
}

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
?>
<!doctype html>
<html lang="TR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Paneli</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        .btn-none {
            border: none;
            font-size: 24px;
        }

        #container {
            width: 1000px;
            margin: 20px auto;
        }

        .ck-editor__editable[role="textbox"] {
            /* editing area */
            min-height: 200px;
            color: black;
        }

        .ck-content .image {
            /* block images */
            max-width: 80%;
            margin: 20px auto;
        }
    </style>
</head>
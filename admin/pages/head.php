<?php
// Giriş için yetki sınanıyor.
if (empty($_SESSION['user_role']) || $_SESSION['user_role'] !== "admin") {
  header("Location:/?alert=access-denied");
  exit();
}
?>
<!doctype html>
<html lang="tr" data-bs-theme="<?php echo currenttheme(); ?>">

<head>

  <!-- WebSite Standart Metas -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="content-language" content="tr-TR">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="robots" content="index, follow">
  <meta name="googlebot" content="index, follow">

  <!-- WebSite ID Metas -->
  <link rel="sitemap" type="application/xml" title="Site Haritası" href="<?php echo $site_name . "/sitemap.xml"; ?>">
  <title><?php echo optioninfo("option_site_title") . " - ADMİN"; ?></title>
  <link rel="icon" href="<?php echo optioninfo("option_favicon_link"); ?>">
  <link rel="apple-touch-icon" href="<?php echo optioninfo("option_favicon_link"); ?>">
  <link rel="link" href="https://sosyalseyler.com/">

  <!--WebSite Source Metas -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link href="<?php echo $site_name . "/admin/style/style.css"; ?>" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.snow.css" rel="stylesheet" />

  <!-- Rich Editor Metas -->
  <script src="https://cdn.ckeditor.com/ckeditor5/34.1.0/classic/ckeditor.js"></script>

</head>
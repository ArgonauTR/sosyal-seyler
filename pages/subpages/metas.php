<?php
/*
    Sitede gösterilecek metalar aşağıda hazırlanmıştır. 
    Bu kodlar sitenin arama motorlarındaki görünürlüğünü çok büyük oranda etkiler.
*/

/*
    Aşağıdaki metalar her sayfa için standarttır.
    Herhangi bir kıstasa gerek kalmaksızın hepsinde görünürler.
*/
?>

<!-- WebSite Standart Metas -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="content-language" content="tr-TR">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="robots" content="index, follow">
<meta name="googlebot" content="index, follow">

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
if (isset($_GET["post_id"])) {
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
    <title><?php echo $post[0]["post_title"]; ?></title>
    <meta name="description" content="<?php echo htmlspecialchars(strip_tags(substr($post[0]["post_content"],0,250))); ?>" />
    <link rel="canonical" href="<?php echo $post[0]["post_link"]; ?>" type="text/html" />
    <meta name="keywords" content="<?php echo $category[0]["category_title"]; ?>">
    <meta name="robots" content="index, follow">
    <meta name="author" content="<?php echo $user[0]["user_nick"]; ?>">
    <meta name="last-modified" content="<?php echo $post[0]["post_create_time"]; ?>">

    <!-- OG Metas -->
    <meta property="og:locale" content="tr_TR">
    <meta property="og:site_name" content="<?php echo optioninfo("option_site_title"); ?>">
    <meta property="og:title" content="<?php echo $post[0]["post_title"]; ?>" />

    <meta property="og:type" content="article" />
    <meta property="og:url" content="<?php echo $post[0]["post_link"]; ?>">
    <meta property="og:description" content="<?php echo htmlspecialchars(strip_tags(substr($post[0]["post_content"],0,250))); ?>" />
    <meta property="article:published_time" content="<?php echo $post[0]["post_create_time"]; ?>" />
    <meta property="article:section" content="<?php echo $category[0]["category_title"]; ?>" />
    <meta property="article:tag" content="<?php echo $category[0]["category_title"]; ?>" />
    <meta property="article:author" content="<?php echo $user[0]["user_nick"]; ?>" />

    <!-- Twitter Metas -->
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:title" content="<?php echo $post[0]["post_title"]; ?>" />
    <meta name="twitter:description" content="<?php echo htmlspecialchars(strip_tags(substr($post[0]["post_content"],0,250))); ?>" />
    <meta name="twitter:site" content="<?php echo $site_name;?>" />
    <meta name="twitter:creator" content="<?php echo $user[0]["user_nick"]; ?>" />

<?php
}
?>
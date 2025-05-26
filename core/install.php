<?php
// Gelen veriler değişkenlere aktarılıyor.
$site_url = "https://" . $_POST["site_url"];
$db_name = $_POST["db_name"];
$db_user = $_POST["db_user"];
$db_pass = $_POST["db_pass"];
$admin_nick = $_POST["admin_nick"];
$admin_mail = $_POST["admin_mail"];
$admin_pass = $_POST["admin_pass"];

// Kurulumun daha önceden yapılmışlığı kontrol ediliyor.
$file = '../config.php';
if (file_exists($file)) {
    header('Location:/');
    exit();
}

//Config dosyası oluşturuluyor.
$dosya_adi = '../config.php';
$icerik = '
            <?php
            // Sosyal Şeyler - Açık Kaynaklı Ücretsiz Bir Yazılımdır.
            $db_name = "' . $db_name . '";
            $db_user = "' . $db_user . '";
            $db_password = "' . $db_pass . '";
            $site_name = "' . $site_url . '";

        ';

$dosya = fopen($dosya_adi, 'w');

if ($dosya) {
    fwrite($dosya, $icerik);
    fclose($dosya);
} else {
    echo "Config dosyası oluşturulamadı.";
}

// Veritabanı bağlantısı yapılıyor.

try {
    $db = new PDO("mysql:host=localhost;dbname=$db_name;charset=utf8", $db_user, $db_pass);
    // echo "Veritabanı bağlantısı başarılı";
} catch (PDOException $e) {
    echo $e->getMessage();
}

// Codex dahil ediliyor.
include("default-options.php");
include("new-link.php");

// Veritabanı talboları oluşturuluyor.

// Tablonun SQL sorgusu
$ads_tablosu = "
        CREATE TABLE IF NOT EXISTS ads (
            ads_id INT(11) AUTO_INCREMENT PRIMARY KEY,
            ad_name VARCHAR(250) NULL,
            ad_value VARCHAR(250) NULL
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
    ";
$db->exec($ads_tablosu);

$categories_tablosu = "
        CREATE TABLE IF NOT EXISTS categories (
            category_id INT(11) AUTO_INCREMENT PRIMARY KEY,
            category_title VARCHAR(250) NULL,
            category_title_sef VARCHAR(250) NULL,
            category_icon VARCHAR(250) NULL,
            category_link VARCHAR(250) NULL,
            category_description TEXT NULL,
            category_fav VARCHAR(50) NULL,
            category_create_time DATETIME NULL
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
    ";
$db->exec($categories_tablosu);

$comments_tablosu = "
        CREATE TABLE IF NOT EXISTS comments (
            comment_id  INT(11) AUTO_INCREMENT PRIMARY KEY,
            comment_content TEXT NULL,
            comment_status VARCHAR(50) NULL,
            comment_author_id INT(11) NULL,
            comment_post_id INT(11) NULL,
            comment_parent_id INT(11) NULL,
            comment_create_time DATETIME NULL
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
    ";
$db->exec($comments_tablosu);

$contacts_tablosu = "
        CREATE TABLE IF NOT EXISTS contacts (
            contact_id  INT(11) AUTO_INCREMENT PRIMARY KEY,
            contact_name VARCHAR(250) NULL,
            contact_mail VARCHAR(250) NULL,
            contact_title VARCHAR(250) NULL,
            contact_content VARCHAR(2000) NULL,
            contact_status VARCHAR(50) NULL,
            contact_type VARCHAR(50) NULL,
            contact_create_time DATETIME NULL
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
    ";
$db->exec($contacts_tablosu);

$images_tablosu = "
        CREATE TABLE IF NOT EXISTS images (
            image_id INT(11) AUTO_INCREMENT PRIMARY KEY,
            image_title VARCHAR(250) NULL,
            image_name VARCHAR(250) NULL,
            image_link VARCHAR(250) NULL,
            image_width INT(5) NULL,
            image_height INT(5) NULL,
            image_type VARCHAR(20) NULL,
            image_create_time DATETIME NULL
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
    ";
$db->exec($images_tablosu);

$options_tablosu = "
        CREATE TABLE IF NOT EXISTS options (
            option_id  INT(11) AUTO_INCREMENT PRIMARY KEY,
            option_name VARCHAR(250) NULL,
            option_value TEXT NULL
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
    ";
$db->exec($options_tablosu);

$orders_tablosu = "
        CREATE TABLE IF NOT EXISTS orders (
            order_id INT(11) AUTO_INCREMENT PRIMARY KEY,
            order_num INT(11) NULL,
            order_icon VARCHAR(100) NULL,
            order_name VARCHAR(100) NULL,
            order_value VARCHAR(500) NULL,
            order_tab VARCHAR(100) NULL
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
    ";
$db->exec($orders_tablosu);

$posts_tablosu = "
        CREATE TABLE IF NOT EXISTS posts (
            post_id INT(11) AUTO_INCREMENT PRIMARY KEY,
            post_title VARCHAR(250) NULL,
            post_link VARCHAR(250) NULL,
            post_content TEXT NULL,
            post_category_id INT(11) NULL,
            post_author_id INT(11) NULL,
            post_status VARCHAR(50) NULL,
            post_wievs INT(11) NULL,
            post_comment_status VARCHAR(50) NULL,
            post_create_time DATETIME NULL
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
    ";
$db->exec($posts_tablosu);

$users_tablosu = "
        CREATE TABLE IF NOT EXISTS users (
            user_id INT(11) AUTO_INCREMENT PRIMARY KEY,
            user_image_url VARCHAR(250) NULL,
            user_nick VARCHAR(50) NULL,
            user_mail VARCHAR(50) NULL,
            user_password VARCHAR(100) NULL,
            user_password_reset_key VARCHAR(50) NULL,
            user_url VARCHAR(50) NULL,
            user_role VARCHAR(50) NULL,
            user_status VARCHAR(50) NULL,
            user_bio VARCHAR(1000) NULL,
            user_theme VARCHAR(50) NULL,
            user_create_time DATETIME NULL
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
    ";
$db->exec($users_tablosu);

// Tablolara veriler ekleniyor.

//Admin Kullanıcısı Ekleniyor
$user_nick = permalink($admin_nick);
$user_image_url = $site_url . "/admin/system/images/user.jpeg";
$user_mail = $admin_mail;
$user_password = md5($admin_pass);
$user_link = $site_url . "/user/" . substr(permalink($admin_nick), 0, 20);

$user = $db->prepare("INSERT into users set
user_nick=:user_nick,
user_image_url=:user_image_url,
user_mail=:user_mail,
user_password=:user_password,
user_url=:user_url,
user_status=:user_status,
user_role=:user_role,
user_bio=:user_bio,
user_theme=:user_theme,
user_create_time=:user_create_time
");

$insert = $user->execute(array(
    'user_nick' => $user_nick,
    'user_image_url' => $user_image_url,
    'user_mail' => $user_mail,
    'user_password' => $user_password,
    'user_url' => $user_link,
    'user_status' => "approved",
    'user_role' => "admin",
    'user_bio' => "Admin olarak bilinen kişi.",
    'user_theme' => "light",
    'user_create_time' => date('Y-m-d H:i:s')
));

// Genel Kategorisi Ekleniyor.
$category_title = "Genel";
$category_title_sef = permalink($category_title);
$category_icon = "box";
$category_link = $site_url . "/categories/" . substr(permalink($category_title), 0, 30);
$category_description = "Çok amaçlı bir kategori";
$category_fav = "on";
$category_create_time = date('Y-m-d H:i:s');


$categories = $db->prepare("INSERT into categories set
    category_title=:category_title,
    category_title_sef=:category_title_sef,
    category_icon=:category_icon,
    category_link=:category_link,
    category_description=:category_description,
    category_fav=:category_fav,
    category_create_time=:category_create_time

");


$insert = $categories->execute(array(
    'category_title' => $category_title,
    'category_title_sef' => $category_title_sef,
    'category_icon' => $category_icon,
    'category_link' => $category_link,
    'category_description' => $category_description,
    'category_fav' => $category_fav,
    'category_create_time' => $category_create_time
));

// Sistemin İlk Konusu Oluşturuluyor

$post_title = "Merhaba Dünya";
// $post_link = "";
$post_content = "Adettendir. <br> İlk yazılım ve ilk konu dünyayı selamlar. Biz de bozmayalım dedik.<br> Hoş geldiniz.";
$post_category_id = 1;
$post_author_id = 1;
$post_status = "publish";
$post_wievs = rand(1, 10);
$post_comment_status = "open";
$post_create_time = date('Y-m-d H:i:s');


$posts = $db->prepare("INSERT into posts set
        post_title=:post_title,
        post_content=:post_content,
        post_category_id=:post_category_id,
        post_author_id=:post_author_id,
        post_status=:post_status,
        post_wievs=:post_wievs,
        post_comment_status=:post_comment_status,
        post_create_time=:post_create_time
	");


$insert = $posts->execute(array(
    'post_title' => substr($post_title, 0, 100), // Başlık en fazla 100 karakterden oluşabilir.
    'post_content' => $post_content,
    'post_category_id' => $post_category_id,
    'post_author_id' => $post_author_id,
    'post_status' => $post_status,
    'post_wievs' => $post_wievs,
    'post_comment_status' => $post_comment_status,
    'post_create_time' => $post_create_time
));


// Son eklenen Post'un ID değeri.
$last_post_id = $db->lastInsertId();

// Yeni link hazırlanıyor.
$new_link = $site_url . "/" . $last_post_id . "-" . substr(permalink($post_title), 0, 50);

$posts = $db->prepare("UPDATE posts SET
    post_link=:post_link
	WHERE post_id=$last_post_id");

$update = $posts->execute(array(
    'post_link' => $new_link
));

// Reklam Bileşenleri Ekleniyor
$ads = $db->prepare("INSERT into ads set ad_name=:ad_name")->execute(['ad_name' => "ad_head"]);
$ads = $db->prepare("INSERT into ads set ad_name=:ad_name")->execute(['ad_name' => "ad_post_page"]);
$ads = $db->prepare("INSERT into ads set ad_name=:ad_name")->execute(['ad_name' => "ad_footer"]);

// Ayarlar Bileşenleri Ekleniyor
$options = $db->prepare("INSERT into options set option_name=:option_name,option_value=:option_value")->execute(['option_name' => "option_site_title", 'option_value' => "Sosyal Şeyler"]);
$options = $db->prepare("INSERT into options set option_name=:option_name,option_value=:option_value")->execute(['option_name' => "option_site_description", 'option_value' => "Anime, Film Dizi gibi pek çok alandan pek çok içerik"]);
$options = $db->prepare("INSERT into options set option_name=:option_name,option_value=:option_value")->execute(['option_name' => "option_favicon_link", 'option_value' => "https://sosyalseyler.com/upload/images/site-icon-1725704396.png"]);
$options = $db->prepare("INSERT into options set option_name=:option_name,option_value=:option_value")->execute(['option_name' => "option_light_logo_link", 'option_value' => "https://sosyalseyler.com/upload/images/light-logo-1725709327.png"]);
$options = $db->prepare("INSERT into options set option_name=:option_name,option_value=:option_value")->execute(['option_name' => "option_dark_logo_link", 'option_value' => "https://sosyalseyler.com/upload/images/dark-logo-1725709322.png"]);
$options = $db->prepare("INSERT into options set option_name=:option_name,option_value=:option_value")->execute(['option_name' => "option_footer_text", 'option_value' => 'Tüm Hakları Saklıdır || Copyright 2024 || <a href="https://sosyalseyler.com/" class="text-decoration-none text-muted">www.sosyalseyler.com</a>']);
$options = $db->prepare("INSERT into options set option_name=:option_name,option_value=:option_value")->execute(['option_name' => "option_default_theme", 'option_value' => ""]);
$options = $db->prepare("INSERT into options set option_name=:option_name,option_value=:option_value")->execute(['option_name' => "option_analitics_code", 'option_value' => ""]);
$options = $db->prepare("INSERT into options set option_name=:option_name,option_value=:option_value")->execute(['option_name' => "option_search_console_theme", 'option_value' => ""]);
$options = $db->prepare("INSERT into options set option_name=:option_name,option_value=:option_value")->execute(['option_name' => "option_adsense_code", 'option_value' => ""]);
$options = $db->prepare("INSERT into options set option_name=:option_name,option_value=:option_value")->execute(['option_name' => "option_fixed_top", 'option_value' => ""]);

// Anasayfaya yönlendiriliyor.
header('Location:/');
exit();

<?php
/*
    ---> ÖNEMLİ NOT
    
    Sayın kullanıcı;
    2025 yılı itibari ile manuel kurulumu terk ettik.
    Bu dosya örnek amacı ile bulunsa da kurulumu yapmanızı sağlar.
    Form ile kurulum yapmak için veritabanınızı oluşturup ana sayfanızı ziyaret ediniz.
*/


//Veritabanı bağlantısı burada yapılıyor.
$db_name = "";
$db_user = "";
$db_password = "";

/*
    Site adı ayarlanıyor.
    Alt ya da üst dizine kurmak için varsayılan ayarları ya da kendi ayarlarınızı kullanabilirsiniz.
    $site_name = "https://" . $_SERVER['HTTP_HOST'];  // Varsayılan dizin.
    $site_name = "https://" . $_SERVER['HTTP_HOST']."/forum"; // Üst dizin.
    $site_name = "https://forum." . $_SERVER['HTTP_HOST']; // Alt dizin.
*/
$site_name = "https://" . $_SERVER['HTTP_HOST']."/forum";

?>
<?php
/*
    BU DOSYA GİZLİ BİR AYARLAR DOSYASIDIR.
    SÜREKLİ OLARAK DEĞİŞTİRİLMESİ GEREKMEYEN AYARLARI İÇERİR.
    İHTİYACINIZ OLAN ÖZELLİKLERİ BURADA DEĞİŞTİREBİLİRSİNİZ.
    SİTE ADI GİBİ BAZI ÖZELLİKLER SİTENİN İLK KURULUŞUNDA DEĞİŞTİRİLMELİDİR.
*/

/*
    Oturum işlemleri için session işlemleri başlatılıyor.
*/
ob_start();
session_start();

// Site saati ülkeye göre ayarlanıyor.
date_default_timezone_set('Europe/Istanbul');

/*
    Site adı ayarlanıyor.
    Alt ya da üst dizine kurmak için varsayılan ayarları ya da kendi ayarlarınızı kullanabilirsiniz.
    $site_name = "https://" . $_SERVER['HTTP_HOST'];  // Varsayılan dizin.
    $site_name = "https://" . $_SERVER['HTTP_HOST']."/forum"; // Üst dizin.
    $site_name = "https://forum." . $_SERVER['HTTP_HOST']; // Alt dizin.
*/
$site_name = "https://" . $_SERVER['HTTP_HOST'];
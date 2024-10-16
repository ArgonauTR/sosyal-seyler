<?php
/*
    core dosyasındaki tüm fonksiyonlar buraya dahil ediliyor.
*/

// Veritabanı şifre dosyası
include("core/default-options.php");

// Beni Hatırla Dosyası
include("core/remember-me.php");

// Veritabanı şifre dosyası
include("config.php");

// Veritabanı bağlantısı dosyası.
include("core/db-config.php");

// Bildirim fonskiyonu
include("core/alert.php");

// Saat veya Tarih döndürür.
include("core/time-or-clock.php");

// Yeni link oluşturma fonskiyonu
include("core/new-link.php");

// Tarih Zaman oluşturma fonksiyonu
include("core/date-time.php");

// VT bilgi çekme fonksiyonları
include("core/fetch-info.php");

// Karanlık/Aydınlık Mod ayarlaması yapıyor
include("core/dark-mode.php");

// Admin kullanıcısı yoksa admin kullanıcısını oluşturur.
include("core/admin-maker.php");

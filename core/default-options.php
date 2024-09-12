<?php

// Session sınıfları başlatılıyor.
ob_start();
session_start();

//Saatler ayarlandı
date_default_timezone_set('Europe/Istanbul');

// Site adı bir değişkene aktarıldı.
$site_name = "https://" . $_SERVER['HTTP_HOST'];

<?php

// Session sınıfları başlatılıyor.
ob_start();
session_start();

//Saatler ayarlandı
date_default_timezone_set('Europe/Istanbul');

//Veritabanına bağlanılıyor
require_once("../../config.php");

//SefLink fonksiyonu çağrılıyor.
include("seflink.php");

//Klasör yapma fonskiyonu çağrılıyor
include("make-folder.php");

//Ayar tablosu sorgusu başta çekilerek siteye yayıldı
$optionask = $db->prepare("SELECT * FROM options WHERE option_id=:id");
$optionask->execute(array(
    'id' => 0
));
$optionfetch = $optionask->fetch(PDO::FETCH_ASSOC);

?>
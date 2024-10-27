<?php
/*
    Oturum işlemleri için session işlemleri başlatılıyor.
*/
ob_start();
session_start();

/* 
    Site saati ülkeye göre ayarlanıyor.
*/
date_default_timezone_set('Europe/Istanbul');


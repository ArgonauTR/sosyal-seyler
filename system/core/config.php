<?php
    try {
        $db = new PDO("mysql:host=localhost;dbname=$veri_tabani_adi;charset=utf8", $veri_tabani_kullanicisi, $veri_tabani_sifresi);
        // echo "Veritabanı bağlantısı başarılı";
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
?>
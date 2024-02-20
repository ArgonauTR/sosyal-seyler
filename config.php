<?php

// Veritabanı bağlantısı yapmak için aşağıda ki bilgilleri doldurmanız yeterli olacaktır.

$veri_tabani_adi = "sosyal";  //UTF8 Turkish-CI formantında bir veritabanı oluşturup adını buraya yazın.
$veri_tabani_kullanicisi = "root"; // Tüm yetkilere sahip bir kullanıcı oluşturup buraya yazın.
$veri_tabani_sifresi = ""; // Veritabanı şifrenizi yazın karmaşık ve tahmin edilmesi zor bir şey yazın.

// bilginiz yoksa aşağıdaki kısma müdehale etmeniz sisteminize büyük zarar verebilir.

try {

    $db = new PDO("mysql:host=localhost;dbname=$veri_tabani_adi;charset=utf8", $veri_tabani_kullanicisi, $veri_tabani_sifresi);

    // echo "Veritabanı bağlantısı başarılı";
} catch (PDOException $e) {

    echo $e->getMessage();
}

<?php

// Ana fonskiyon dosyası ekleniyor.
include("main-function.php");

/*
chapter-delete.php dosyasında değişiklik yaparken çok dikkatli olunuz.
Bu dosyada ki vetitabanında ki içeriklerin ve sunucudaki dosyaların silinmemesine sebep olur ve zamanla birikme yapar.
Birikme yavaşlamaya ve hatta çökmeye sebep olabilir.

Oluşturma: 06.04.2024
Güncelleme: 06.04.2024
*/

$manga_id = $_GET["manga_id"];
$chapter_id = $_GET["chapter_id"];
$chapter_num = $_GET["chapter_num"];
$status = $_GET["status"];

// ---> Sunucuda bulunan bölüm klasörü siliniyor.

function delete_files($target)
{
    if (is_dir($target)) {
        $files = glob($target . '*', GLOB_MARK);
        foreach ($files as $file) {
            delete_files($file);
        }
        rmdir($target);
    } elseif (is_file($target)) {
        unlink($target);
    }
}

delete_files('../../manga/' . $manga_id . '/' . $chapter_num);


// ---> Veritabanında bulunan Bölüm satırlarını siliniyor. 

$chapters = $db->prepare("DELETE FROM chapters where chapter_id=:id");
$delete = $chapters->execute(array(
    'id' => $chapter_id
));

// ---> Veritabanında bulunan Bölüm İlişkilendirme satırlarını siliniyor. 


    $chapter_tax = $db->prepare("DELETE FROM chapter_tax where ct_chapter_id=:id");
    $delete = $chapter_tax->execute(array(
        'id' => $chapter_id
    ));

// --> Bu kısımda manga sayfasına geri dönüyoruz.

header("Location:../process.php?manga=manga-chapter-list&manga_id=" . $manga_id . "&status=publish");
exit;

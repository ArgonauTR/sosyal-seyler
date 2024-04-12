<?php

// Ana fonskiyon dosyası ekleniyor.
include("main-function.php");

/*
manga-delete.php dosyasında değişiklik yaparken çok dikkatli olunuz.
Bu dosyada ki vetitabanında ki içeriklerin ve sunucudaki dosyaların silinmemesine sebep olur ve zamanla birikme yapar.
Birikme yavaşlamaya ve hatta çökmeye sebep olabilir.

Oluşturma: 04.04.2024
Güncelleme: 04.04.2024
*/

$manga_id = $_GET["manga_id"];
$status = $_GET["status"];

// ---> Sunucuda bulunan manga klasörü siliniyor.

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

delete_files('../../manga/' . $manga_id);

// ---> Veritabanında bulunan Manga satırı siliniyor. 

$mangas = $db->prepare("DELETE FROM mangas where manga_id=:id");
$delete = $mangas->execute(array(
    'id' => $manga_id
));

// ---> Veritabanında bulunan Bölüm satırlarını siliniyor. 

$chapter_manga_id = $manga_id;
$chapterask = $db->prepare("SELECT * FROM chapters WHERE chapter_manga_id=:id");
$chapterask->execute(array('id' => $chapter_manga_id));
while ($chapterfetch = $chapterask->fetch(PDO::FETCH_ASSOC)) {

    $chapters = $db->prepare("DELETE FROM chapters where chapter_manga_id=:id");
    $delete = $chapters->execute(array(
        'id' => $chapter_manga_id
    ));
}

// ---> Veritabanında bulunan Bölüm İlişkilendirme satırlarını siliniyor. 

$ct_manga_id = $manga_id;
$ctask = $db->prepare("SELECT * FROM chapter_tax WHERE ct_manga_id=:id");
$ctask->execute(array('id' => $ct_manga_id));
while ($ctfetch = $ctask->fetch(PDO::FETCH_ASSOC)) {

    $chapter_tax = $db->prepare("DELETE FROM chapter_tax where ct_manga_id=:id");
    $delete = $chapter_tax->execute(array(
        'id' => $ct_manga_id
    ));
}

// --> Bu kısımda manga sayfasına geri dönüyoruz.

header("Location:../manga.php?status=yes");
exit;

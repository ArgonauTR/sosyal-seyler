<?php

// Ana fonskiyon dosyası ekleniyor.
include("main-function.php");

// Bölüm bilgisi veritabanına ekleniyor

$chapter_manga_id = $_POST["chapter_manga_id"];
$chapter_name = $_POST["chapter_name"];
$chapter_num = $_POST["chapter_num"];
$chapter_description = $_POST["chapter_description"];
$chapter_status = $_POST["chapter_status"];
$chapter_upload_user_id = $_SESSION['user_id']; // Bu veri sessioon'dan çekildi
$chapter_upload_user_ip = $_SERVER["REMOTE_ADDR"]; // Üye ip adresi
$chapter_wiev = rand(1,7);
$chapter_upload_user_agent = $_SERVER['HTTP_USER_AGENT']; // Üye tarayıcı bilgisi

$chapters = $db->prepare("INSERT into chapters set
    chapter_manga_id=:chapter_manga_id,
    chapter_name=:chapter_name,
    chapter_num=:chapter_num,
    chapter_description=:chapter_description,
    chapter_status=:chapter_status,
    chapter_wiev=:chapter_wiev,
    chapter_upload_user_id=:chapter_upload_user_id,
    chapter_upload_user_ip=:chapter_upload_user_ip,
    chapter_upload_user_agent=:chapter_upload_user_agent
");

$insert = $chapters->execute(array(
    'chapter_manga_id' => $chapter_manga_id,
    'chapter_name' => $chapter_name,
    'chapter_num' => $chapter_num,
    'chapter_description' => $chapter_description,
    'chapter_status' => $chapter_status,
    'chapter_wiev'=>$chapter_wiev,
    'chapter_upload_user_id' => $chapter_upload_user_id,
    'chapter_upload_user_ip' => $chapter_upload_user_ip,
    'chapter_upload_user_agent' => $chapter_upload_user_agent
));

if ($insert) {
    // Başarılı ekleme işlemi
} else {
    // Hata durumunda işlemler
    $errorInfo = $chapters->errorInfo();
    // Hata mesajlarını görüntüleme
    echo "Hata: " . $errorInfo[2];
    exit();
}

// Yüklenen bölüm ID'si bir değişkene aktarılıyor.

$son_bolum_id = $db->lastInsertId(); // Son kaydedilen ID bir değişkene aktarıldı.

// Yüklenen Bölüme Link Güncellemesi yapılıyor.
$manga_id = $_POST["chapter_manga_id"];
$mangaask = $db->prepare("SELECT * FROM mangas WHERE manga_id=:id");
$mangaask->execute(array('id' => $manga_id));
while ($mangafetch = $mangaask->fetch(PDO::FETCH_ASSOC)) {
    $bolum_link = $mangafetch["manga_link"] . "/chapter-" . $chapter_num;
}


$chapters = $db->prepare("UPDATE chapters set

chapter_link=:chapter_link

WHERE chapter_id=$son_bolum_id");

$update = $chapters->execute(array(
    'chapter_link' => $bolum_link
));


// Yüklenecek Dizin Hazırlanıyor


$manga = $_POST["chapter_manga_id"];
$bolum = $_POST["chapter_num"];
$manga_yolu = "../../manga/";
$bolum_yolu = "../../manga/" . $manga . "/";

// Manga klasörü yoksa
if (!file_exists($manga_yolu . $manga)) {
    mkdir(($manga_yolu . $manga));
    //Manga klasörü oluşturulunca bölüm klasörü oluşturulur
    if (!file_exists($bolum_yolu . $bolum)) {
        mkdir($bolum_yolu . $bolum);
    }
}
//Böüm Klasörü
if (!file_exists($bolum_yolu . $bolum)) {
    mkdir($bolum_yolu . $bolum);
}

$klasor = "../../manga/" . $manga . "/" . $bolum . "/";

// Resimler Veritabanına kayıt ediliyor.

$yuklenemeyenler = array(); //Yüklenmeyendeler dizini

$resim_sayisi = count($_FILES['resim']['name']); //kaç tane resim geldiğini öğrendik.
for ($i = 0; $i < $resim_sayisi; $i++) {

    $resimBoyutu = $_FILES['resim']['size'][$i]; //döngü içerisindeki resmin boyutunu öğrendik.
    if ($resimBoyutu > (1024 * 1024 * 2)) {

        $yuklenemeyenler[] = $_FILES['resim']['name'][$i] . " - BOYUT";
    } else {
        $tip = $_FILES['resim']['type'][$i]; //resim tipini öğrendik.
        $resimAdi = $_FILES['resim']['name'][$i]; //resmin adını öğrendik.

        if ($tip == 'image/jpeg' || $tip == 'image/jpg' || $tip == 'image/png') { //uzantısnın kontrolünü sağladık. sadece .jpg ve .png yükleyebilmesi için.
            if (move_uploaded_file($_FILES["resim"]["tmp_name"][$i], $klasor . "/ss" .$manga. $_FILES['resim']['name'][$i])) {

                // RESİMLER VERİTABANINA KAYDEDİLİYOR. BAŞLA.

                // Resim linki oluşturuluyor
                $host_adi = $_SERVER["HTTP_HOST"]; // Host adı buraya ekleniyor.
                $yeni_link = "https://" . $host_adi . "/manga/" . $manga . "/" . $bolum . "/ss" .$manga. $_FILES['resim']['name'][$i];

                $ct_chapter_id = $son_bolum_id;
                $ct_manga_id = $_POST["chapter_manga_id"]; // manga nın sıra numarası
                $ct_chapter_num = $_POST["chapter_num"];
                $ct_order = $manga.$i;
                $ct_link = $yeni_link; // resimlerin linki

                $chapter_tax = $db->prepare("INSERT into chapter_tax set
                ct_manga_id=:ct_manga_id,
                ct_chapter_num=:ct_chapter_num,
                ct_chapter_id=:ct_chapter_id,
                ct_order=:ct_order,
                ct_link=:ct_link
            ");

                $insert = $chapter_tax->execute(array(
                    'ct_manga_id' => $ct_manga_id,
                    'ct_chapter_num' => $ct_chapter_num,
                    'ct_chapter_id'=>$ct_chapter_id,
                    'ct_order'=> $ct_order,
                    'ct_link' => $ct_link
                ));

                // RESİMLER VERİTABANINA KAYDEDİLİYOR. BİTİR.


            } else $yuklenemeyenler[] = $_FILES['resim']['name'][$i] . " BİLİNMİYOR";
        } else {
            $yuklenemeyenler[] = $_FILES['resim']['name'][$i] . " UZANTI";
        }
    }
}
if (count($yuklenemeyenler) > 0) {
    echo "Aşağıdaki Resimler Yüklenemedi. <br />";
    var_dump($yuklenemeyenler);
} else echo "TÜM RESİMLER BAŞARILI BİR ŞEKİLDE YÜKLENDİ.";


// Yönlendirme sağlanıyor

header("Location:../process.php?manga=manga-chapter-list&manga_id=".$chapter_manga_id."&status=".$chapter_status);
exit;

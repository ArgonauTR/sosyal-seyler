<?PHP

// Ana fonskiyon dosyası ekleniyor.
include("main-function.php");

if (isset($_GET["status"])) {

    function getImagePath($url) {

        $urlParts = parse_url($url);
    
        // /images/ kısmının indexini bul
        $startIndex = strpos($urlParts['path'], '/images/') + strlen('/images/');
    
        // URL'den istenen kısmı al ve geri döndür
        return substr($urlParts['path'], $startIndex);
    }

    $way = getImagePath($_GET["image-url"]);
    $image_way = '../../images/'.$way;
    unlink($image_way); //resim siliniyor

    $image_status =  $_GET["status"];
    $image_id = $_GET["image_id"];



    $image = $db->prepare("DELETE FROM images where image_id=:id");
    $delete = $image->execute(array(
        'id' => $image_id
    ));

    if ($delete) {
        header("Location:../image.php?delete=delete-ok");
        exit();
    } else {

        header("Location:../image.php?delete=delete-no");
        exit();
    }
}




// Örnek kullanım
$url = 'https://localhost/images/2024/02/1708366618-film-kategorisi.jpg';
$imagePath = getImagePath($url);
echo $imagePath; // 2024/02/1708366618-film-kategorisi.jpg
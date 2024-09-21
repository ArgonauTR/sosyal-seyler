<?PHP

// Ana fonskiyon dosyası ekleniyor.
include("../../codex.php");

 // Resim ID değişkene aktarılıyor.
$image_id = $_GET["image_id"];


// Resim sunucudan siliniyor.
$image = imageinfo("SELECT * FROM images WHERE image_id=".$image_id);
$path = "../../upload/images/";
unlink($path.$image[0]["image_name"]);


// Resim veritabanından siliniyor.
$images = $db->prepare("DELETE from images where image_id=:id");
$delete = $images->execute(array(
    'id' => $image_id
));

// İşlem sonucuna göre yönlendirme yapılıyor.
if ($delete) {
    header("Location:" . $site_name . "/admin/images.php?status=image-delete-success");
    exit();
} else {
    header("Location:" . $site_name . "/admin/images.php?status=image-delete-failed");
    exit();
}

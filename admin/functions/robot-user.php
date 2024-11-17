<?php
// Ana fonskiyon dosyası ekleniyor.
include("../../codex.php");

// Güvenlik kontrolü yapılıyor.
if (!isset($_SESSION["user_role"]) and $_SESSION["user_role"] != "admin") {
    header("Location:" . $site_name . "/?status=permission-exist");
    exit();
}

function randomservice()
{
    // Rasgele mail uzantısı üreticisi
    $list = array("@gmail.com", "@yahoo.com", "@yandex.com", "@bing.com", "@outlook.com", "@hotmail.com", "@mail.com");
    $service_key = array_rand($list, 1);
    return $list[$service_key];
}


// ----------------------------- RESİM SİSTEME KAYIT EDİLİYOR ---------------------------


$hata = $_FILES['upload']['error']; // Hata kodu bir değişkenine aktarıldı.
if ($hata != 0) {
    echo "Resim gödnerilirken bir hata oluştu.";
    echo "<br>";
    echo $hata;
    exit();
}

$resimBoyutu = $_FILES['upload']['size']; // Resmin boyutu bir değişkene aktarıldı.
if ($resimBoyutu > (1024 * 1024 * 2)) {
    echo "Resim boyutu 2 MB den büyük olamaz.";
    exit();
    /*
		Yukarıda ki işlem byte, kilobayt ve megabayt ın çarpımıdır.
		2 Mb lik bir limit belirtilmiştir.
	*/
}

$tip = $_FILES['upload']['type']; // Resim tipi yanı uzantısı bir değişkene aktarıldı.
if ($tip != 'image/jpeg' && $tip != 'image/png' && $tip != 'image/gif' && $tip != 'image/jpg') {
    echo "Sadece JPEG, PNG, GIF ve JPG dosya türleri destekleniyor.";
    exit();
}

list($width, $height, $type) = getimagesize($_FILES['upload']['tmp_name']);

$image_type =  pathinfo($_FILES['upload']['name'], PATHINFO_EXTENSION); // Resim uzantısı aktarıldı.
$image_title =  substr(str_replace("." . $image_type, "", $_FILES['upload']['name']), 0, 50); // SEO için sadece adını (50 Karakter) aldık.
$image_name = permalink($image_title) . "-" . time() . "." . $image_type; // Rastgele bir sayı ile benzersiz bir isim oluşturduk
$image_width = $width; // Genişliğini aldık.
$image_height = $height; // Yüksekliğini aldık.
$image_link = newlink("", $image_name, "image"); // Resim linkini oluşturduk.
$image_create_time = date('Y-m-d H:i:s'); // Yükleme tarihini aldık.

$path = "../../upload/images/" . $image_name; // Dosya yükleme yolunu aldık.

move_uploaded_file($_FILES["upload"]["tmp_name"], $path); // İlgili adrese taşındı.

$images = $db->prepare("INSERT into images set
image_title=:image_title,
image_name=:image_name,
image_link=:image_link,
image_width=:image_width,
image_height=:image_height,
image_type=:image_type,
image_create_time=:image_create_time
");



$insert = $images->execute(array(
    'image_title' => $image_title,
    'image_name' => $image_name,
    'image_link' => $image_link,
    'image_width' => $image_width,
    'image_height' => $image_height,
    'image_type' => $image_type,
    'image_create_time' => $image_create_time
));


// ----------------------------- ÜYE KAYDI YAPILIYOR ---------------------------

$user_nick = htmlspecialchars(strip_tags($_POST["user_nick"]));
$user_link = newlink("", $user_nick, "user");

$user = $db->prepare("INSERT into users set
    user_nick=:user_nick,
    user_image_url=:user_image_url,
    user_mail=:user_mail,
    user_password=:user_password,
    user_url=:user_url,
    user_status=:user_status,
    user_role=:user_role,
    user_bio=:user_bio,
    user_theme=:user_theme,
    user_create_time=:user_create_time
    ");

$insert = $user->execute(array(
    'user_nick' => permalink($user_nick),
    'user_image_url' => $image_link,
    'user_mail' => permalink($user_nick) . rand(1, 999) . randomservice(),
    'user_password' => md5(time()),
    'user_url' => $user_link,
    'user_status' => "approved",
    'user_role' => "robot",
    'user_bio' => $_POST["user_bio"],
    'user_theme' => "light",
    'user_create_time' => date('Y-m-d H:i:s')
));

if ($insert) {
    header('Location:'.$site_name.'/admin/robots.php?type=robot-user&alert=success');
    exit;
} {
    header('Location:'.$site_name.'/admin/robots.php?type=robot-user&alert=failed');
    exit;
}

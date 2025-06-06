<?PHP
header('Content-Type: application/json');

// Ana fonskiyon dosyası ekleniyor.
include("../codex.php");

$hata = $_FILES['upload']['error']; // Hata kodu bir değişkenine aktarıldı.
if ($hata != 0) {
    echo json_encode(['error' => 'Resim gödnerilirken bir hata oluştu.']);
    echo "<br>";
    echo $hata;
    exit();
}


$resimBoyutu = $_FILES['upload']['size']; // Resmin boyutu bir değişkene aktarıldı.
if ($resimBoyutu > (1024 * 1024 * 2)) {
    echo json_encode(['error' => 'Resim boyutu 2 MB den büyük olamaz.']);
    exit();
    /*
		Yukarıda ki işlem byte, kilobayt ve megabayt ın çarpımıdır.
		2 Mb lik bir limit belirtilmiştir.
	*/
}

$tip = $_FILES['upload']['type']; // Resim tipi yanı uzantısı bir değişkene aktarıldı.
if ($tip != 'image/jpeg' && $tip != 'image/png' && $tip != 'image/gif' && $tip != 'image/jpg') {
    echo json_encode(['error' => 'Sadece JPEG, PNG, GIF ve JPG dosya türleri destekleniyor.']);
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

$path = "../upload/images/" . $image_name; // Dosya yükleme yolunu aldık.

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


if ($insert) {
    $data['file'] =$image_title;
    $data['url'] =$image_link;
    $data['uploaded'] = 1;
}else{
    $data['uploaded']= 0;
    $data['error'] ['message'] = 'Hata! Yüklenemedi';
}

echo json_encode($data);

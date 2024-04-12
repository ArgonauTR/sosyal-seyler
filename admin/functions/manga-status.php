<?PHP

// Ana fonskiyon dosyası ekleniyor.
include("main-function.php");

if (isset($_GET["status"])) {

    $status = $_GET["status"];
    $manga_id = $_GET["manga_id"];

    //GET den değer DRAFT olarka gelmişse içeriğin TASLAK olarak güncellenmesi gerekir.
    // Aşağıda içerik TASLAK olarak güncelleniyor.
    if ($status == "draft") {
        
        $mangas = $db->prepare("UPDATE mangas SET
        manga_status=:manga_status
        WHERE manga_id=$manga_id");

        $update = $mangas->execute(array(
            'manga_status' => "draft"
        ));

        if ($update) {
            header("Location:../manga.php?status=draft");
            exit();
        } else {

            header("Location:../manga.php?status=publish");
            exit();
        }
    }


    //GET den değer PUBLİSH olarka gelmişse içeriğin YAYIN olarak güncellenmesi gerekir.
    // Aşağıda içerik YAYIN olarak güncelleniyor.
    if ($status == "publish") {

        $mangas = $db->prepare("UPDATE mangas SET
        manga_status=:manga_status
        WHERE manga_id=$manga_id");

        $update = $mangas->execute(array(
            'manga_status' => "publish"
        ));

        if ($update) {
            header("Location:../manga.php?status=publish");
            exit();
        } else {

            header("Location:../manga.php?status=draft");
            exit();
        }
    }
}

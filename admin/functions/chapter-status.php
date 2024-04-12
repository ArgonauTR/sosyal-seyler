<?PHP

// Ana fonskiyon dosyası ekleniyor.
include("main-function.php");

if (isset($_GET["status"])) {

    $status = $_GET["status"];
    $chapter_id = $_GET["chapter_id"];
    $manga_id = $_GET["manga_id"];

    //GET den değer DRAFT olarka gelmişse içeriğin TASLAK olarak güncellenmesi gerekir.
    // Aşağıda içerik TASLAK olarak güncelleniyor.
    if ($status == "draft") {

        $chapter = $db->prepare("UPDATE chapters SET
        chapter_status=:chapter_status
        WHERE chapter_id=$chapter_id");

        $update = $chapter->execute(array(
            'chapter_status' => "draft"
        ));

        if ($update) {
            header("Location:../process.php?manga=manga-chapter-list&manga_id=" . $manga_id . "&status=draft");
            exit();
        } else {

            header("Location:../process.php?manga=manga-chapter-list&manga_id=" . $manga_id . "&status=publish");
            exit();
        }
    }


    //GET den değer PUBLİSH olarka gelmişse içeriğin YAYIN olarak güncellenmesi gerekir.
    // Aşağıda içerik YAYIN olarak güncelleniyor.
    if ($status == "publish") {

        $chapter = $db->prepare("UPDATE chapters SET
        chapter_status=:chapter_status
        WHERE chapter_id=$chapter_id");

        $update = $chapter->execute(array(
            'chapter_status' => "publish"
        ));

        if ($update) {
            header("Location:../process.php?manga=manga-chapter-list&manga_id=" . $manga_id . "&status=publish");
            exit();
        } else {

            header("Location:../process.php?manga=manga-chapter-list&manga_id=" . $manga_id . "&status=draft");
            exit();
        }
    }
}

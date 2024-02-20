<?PHP

// Ana fonskiyon dosyası ekleniyor.
include("main-function.php");

if (isset($_GET["status"])) {

    $status = $_GET["status"];
    $post_id = $_GET["post_id"];

    //GET den değer DRAFT olarka gelmişse içeriğin TASLAK olarak güncellenmesi gerekir.
    // Aşağıda içerik TASLAK olarak güncelleniyor.
    if ($status == "draft") {
        
        $posts = $db->prepare("UPDATE posts SET
        post_status=:post_status
        WHERE post_id=$post_id");

        $update = $posts->execute(array(
            'post_status' => "draft"
        ));

        if ($update) {
            header("Location:../post.php?status=draft");
            exit();
        } else {

            header("Location:../post.php?status=publish");
            exit();
        }
    }


    //GET den değer PUBLİSH olarka gelmişse içeriğin YAYIN olarak güncellenmesi gerekir.
    // Aşağıda içerik YAYIN olarak güncelleniyor.
    if ($status == "publish") {

        $posts = $db->prepare("UPDATE posts SET
        post_status=:post_status
        WHERE post_id=$post_id");

        $update = $posts->execute(array(
            'post_status' => "publish"
        ));

        if ($update) {
            header("Location:../post.php?status=publish");
            exit();
        } else {

            header("Location:../post.php?status=draft");
            exit();
        }
    }
}

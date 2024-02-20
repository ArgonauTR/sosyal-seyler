<?PHP

// Ana fonskiyon dosyası ekleniyor.
include("main-function.php");

if (isset($_GET["status"])) {

    $category_status =  $_GET["status"];
    $category_id = $_GET["category_id"];

    $categories = $db->prepare("DELETE from categories where category_id=:id");
    $delete = $categories->execute(array(
        'id' => $category_id
    ));

    if ($delete) {
        header("Location:../category.php?delete=delete-ok");
        exit();
    } else {

        header("Location:../category.php?delete=delete-no");
        exit();
    }
}

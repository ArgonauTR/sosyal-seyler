<?PHP

// Ana fonskiyon dosyası ekleniyor.
include("main-function.php");

if (isset($_GET["status"])) {

    $comment_status =  $_GET["status"];
    $comment_id = $_GET["comment_id"];

    $comments = $db->prepare("DELETE FROM comments where comment_id=:id");
    $delete = $comments->execute(array(
        'id' => $comment_id
    ));

    if ($delete) {
        header("Location:../comment.php?delete=delete-ok");
        exit();
    } else {

        header("Location:../comment.php?delete=delete-no");
        exit();
    }
}

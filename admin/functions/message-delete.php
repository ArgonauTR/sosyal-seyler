<?PHP

// Ana fonskiyon dosyası ekleniyor.
include("main-function.php");

if (isset($_GET["status"])) {

    $message_status =  $_GET["status"];
    $message_id = $_GET["message_id"];

    $message = $db->prepare("DELETE FROM messages where message_id=:id");
    $delete = $message->execute(array(
        'id' => $message_id
    ));

    if ($delete) {
        header("Location:../message.php?delete=delete-ok");
        exit();
    } else {

        header("Location:../message.php?delete=delete-no");
        exit();
    }
}

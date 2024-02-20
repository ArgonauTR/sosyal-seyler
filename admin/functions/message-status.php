<?PHP

// Ana fonskiyon dosyası ekleniyor.
include("main-function.php");

if (isset($_GET["status"])) {

    $status = $_GET["status"];
    $message_id = $_GET["message_id"];

    //GET den değer DRAFT olarka gelmişse içeriğin TASLAK olarak güncellenmesi gerekir.
    // Aşağıda içerik TASLAK olarak güncelleniyor.
    if ($status == "read") {
        
        $message = $db->prepare("UPDATE messages SET
        message_status=:message_status
        WHERE message_id=$message_id");

        $update = $message->execute(array(
            'message_status' => "read"
        ));

        if ($update) {
            header("Location:../message.php?status=read");
            exit();
        } else {

            header("Location:../message.php?status=wait");
            exit();
        }
    }


    //GET den değer PUBLİSH olarka gelmişse içeriğin YAYIN olarak güncellenmesi gerekir.
    // Aşağıda içerik YAYIN olarak güncelleniyor.
    if ($status == "wait") {
        
        $message = $db->prepare("UPDATE messages SET
        message_status=:message_status
        WHERE message_id=$message_id");

        $update = $message->execute(array(
            'message_status' => "wait"
        ));

        if ($update) {
            header("Location:../message.php?status=wait");
            exit();
        } else {

            header("Location:../message.php?status=read");
            exit();
        }
    }
}

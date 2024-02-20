<?PHP

// Ana fonskiyon dosyası ekleniyor.
include("main-function.php");

if (isset($_GET["status"])) {

    $status = $_GET["status"];
    $user_id = $_GET["user_id"];

    //GET den değer DRAFT olarka gelmişse içeriğin TASLAK olarak güncellenmesi gerekir.
    // Aşağıda içerik TASLAK olarak güncelleniyor.
    if ($status == "pending") {
        
        $users = $db->prepare("UPDATE users SET
        user_status=:user_status
        WHERE user_id=$user_id");

        $update = $users->execute(array(
            'user_status' => "pending"
        ));

        if ($update) {
            header("Location:../user.php?status=pending");
            exit();
        } else {

            header("Location:../user.php?status=approved");
            exit();
        }
    }


    //GET den değer PUBLİSH olarka gelmişse içeriğin YAYIN olarak güncellenmesi gerekir.
    // Aşağıda içerik YAYIN olarak güncelleniyor.
    if ($status == "approved") {
        
        $users = $db->prepare("UPDATE users SET
        user_status=:user_status
        WHERE user_id=$user_id");

        $update = $users->execute(array(
            'user_status' => "approved"
        ));

        if ($update) {
            header("Location:../user.php?status=approved");
            exit();
        } else {

            header("Location:../user.php?status=pending");
            exit();
        }
    }
}

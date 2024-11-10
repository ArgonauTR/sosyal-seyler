<?PHP

// Ana fonskiyon dosyası ekleniyor.
include("../../codex.php");

// Güvenlik kontrolü yapılıyor.
if (!isset($_SESSION["user_role"]) and $_SESSION["user_role"] != "admin") {
    header("Location:" . $site_name . "/?status=permission-exist");
    exit();
}

if (isset($_GET["status"])) {

    $status = $_GET["status"];
    $user_id = $_GET["user_id"];

    //GET den değer pending olarka gelmişse içeriğin TASLAK olarak güncellenmesi gerekir.
    // Aşağıda içerik TASLAK olarak güncelleniyor.
    if ($status == "pending") {
        
        $users = $db->prepare("UPDATE users SET
        user_status=:user_status
        WHERE user_id=$user_id");

        $update = $users->execute(array(
            'user_status' => "pending"
        ));

        if ($update) {
            header("Location:/admin/users.php?status=pending");
            exit();
        } else {

            header("Location:/admin/users.php?status=approved");
            exit();
        }
    }


    //GET den değer approved olarka gelmişse içeriğin YAYIN olarak güncellenmesi gerekir.
    // Aşağıda içerik approved olarak güncelleniyor.
    if ($status == "approved") {
        
        $users = $db->prepare("UPDATE users SET
        user_status=:user_status
        WHERE user_id=$user_id");

        $update = $users->execute(array(
            'user_status' => "approved"
        ));

        if ($update) {
            header("Location:/admin/users.php?status=approved");
            exit();
        } else {

            header("Location:/admin/users.php?status=pending");
            exit();
        }
    }
}

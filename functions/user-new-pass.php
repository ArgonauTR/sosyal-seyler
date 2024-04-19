<?PHP
// Ana fonskiyon dosyası ekleniyor.
include("main-function.php");

if (isset($_POST["user_new_pass"])) {

    // Değişkenlere aktarma yapılıyor.
    $user_mail = $_POST["user_mail"];
    $rand_code = md5(time());

    // ID için e-posta ile sorgu yapılıyor.
    $userask = $db->prepare("SELECT * FROM users WHERE user_mail=:user_mail");
    $userask->execute(array('user_mail' => $user_mail));
    while ($userfetch = $userask->fetch(PDO::FETCH_ASSOC)) {
        $user_id = $userfetch["user_id"];
    }

    //sıfırlama linkii burada oluşturuluyor
    $host_adi = $_SERVER["HTTP_HOST"]; // Host adı buraya ekleniyor.
    $pass_link = "https//:" . $host_adi . "/user-repass/" . $user_id . "-" . $rand_code;
    $users = $db->prepare("UPDATE users SET

    user_pass_reset=:user_pass_reset

    WHERE user_id=$user_id");

    $update = $users->execute(array(

        'user_pass_reset' => $rand_code
    ));

    if ($update) {

        // Kullanıcıya mail atılıyor.
        $to = $user_mail;
        $subject = 'Şifre Sıfırlama';
        $message = 'Şifre Sıfırlama Linkiniz '. $pass_link;
        $headers = 'From:'.$optionfetch["option_admin_mail"];

        if (mail($to, $subject, $message, $headers)) {
            header('Location:../user?repass-status=send-ok');
            exit;
        } else {
            header('Location:../user?repass-status=send-error');
            exit;
        }
    } else {
        header('Location:../user?repass-status=mail-failed');
        exit;
    }
}

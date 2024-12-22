<?PHP

// Ana fonskiyon dosyası ekleniyor.
include("../codex.php");

if (isset($_POST["reset_password"])) {

    $nick = $_POST["user_nick"];

    $user = userinfo("SELECT * FROM users WHERE user_nick='$nick'");

    if ($nick = $user[0]["user_nick"]) {

        //Sıfırlama Kodu
        $reset_code = md5(time());

        //Sıfırlama Linki
        $link = $site_name . "/new-password.php?nick=" . $nick . "&key=" . $reset_code;

        // Sıfırlama Kodu kaydediliyor.

        $user_code = $db->prepare("UPDATE users SET
        user_password_reset_key=:user_password_reset_key
        WHERE user_id=" . $user[0]["user_id"]);

        $insert = $user_code->execute(array(
            'user_password_reset_key' =>  $reset_code
        ));

        // E-Posta alacak kullanıcı
        $to = $user[0]["user_mail"];

        // E-posta konusu
        $subject = $site_name . " Şifre Sıfırlama";

        // E-posta mesajı
        $message =  "Tek kullanımlık Şifreniz aşağıdaki gibidir" . "\r\n" .
            $link . "\r\n" .
            "Web sitesine kayıtlı değilseniz bu postayı dikkate almayınız.";

        // Mail gönderimi
        if (mail($to, $subject, $message)) {
            header('Location:../reset?alert=mail-send');
            exit;
        } else {
            header('Location:../reset?alert=mail-failed');
            exit;
        }
    } else {
        header('Location:../reset?alert=check-nick');
        exit;
    }
}

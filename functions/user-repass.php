<?PHP
// Ana fonskiyon dosyası ekleniyor.
include("main-function.php");

if (isset($_POST["user_pass_reset"])) {

    $user_id = htmlspecialchars(strip_tags($_POST["user_id"]));
    $user_new_pass = htmlspecialchars(strip_tags($_POST["user_new_pass"]));

    //Şifre karakter sayısı denetleniyor.
    $user_password_chacter_count = strlen(htmlspecialchars(strip_tags($_POST["user_new_pass"])));
    if ($user_password_chacter_count < 5 || $user_password_chacter_count > 13) {
        header('Location:../user-repass/' . $user_id . '-' . $user_new_pass . '?status=short-pass');
        exit;
    }

    // Form verilerine göre sorgu yapılıp sonuçlar değişkenlere aktarldı.
    $userask = $db->prepare("SELECT * FROM users WHERE user_id=:id");
    $userask->execute(array('id' => $user_id));
    while ($userfetch = $userask->fetch(PDO::FETCH_ASSOC)) {
        $vt_id = $userfetch["user_id"];
        $vt_nick = $userfetch["user_nick"];
        $vt_mail = $userfetch["user_mail"];
        $vt_password = $userfetch["user_password"];
        $vt_status = $userfetch["user_status"];
        $vt_role = $userfetch["user_role"];
    }


    $users = $db->prepare("UPDATE users SET
    user_pass_reset=:user_pass_reset,
    user_password=:user_password
    WHERE user_id=$user_id");

    $update = $users->execute(array(
        'user_pass_reset' => NULL,
        'user_password' => md5($user_new_pass)
    ));

    if ($update) {
        $_SESSION['user_id'] = $vt_id;
        $_SESSION['user_nick'] = $vt_nick;
        $_SESSION['user_mail'] = $vt_mail;
        $_SESSION['user_status'] = $vt_status;
        $_SESSION['user_role'] = $vt_role;


        header('Location:../?login-status=success');
        exit;
    } else {

        header('Location:../user-repass/' . $user_id . '-' . $user_new_pass . '?status=error');
        exit;
    }
}

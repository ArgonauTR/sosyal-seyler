<?PHP

// Ana fonskiyon dosyası ekleniyor.
include("main-function.php");

if (isset($_POST["user_login"])) {

    // Formdan gelen değerler değişkenlere aktarıldı.
    $user_nick = htmlspecialchars(strip_tags($_POST["user_nick"]));
    $user_password = md5(htmlspecialchars(strip_tags($_POST["user_password"])));

    // Form verilerine göre sorgu yapılıp sonuçlar değişkenlere aktarldı.
    $userask = $db->prepare("SELECT * FROM users WHERE user_nick=:nick");
    $userask->execute(array('nick' => $user_nick));
    while ($userfetch = $userask->fetch(PDO::FETCH_ASSOC)) {
        $vt_id = $userfetch["user_id"];
        $vt_nick = $userfetch["user_nick"];
        $vt_mail = $userfetch["user_mail"];
        $vt_password = $userfetch["user_password"];
        $vt_status = $userfetch["user_status"];
        $vt_role = $userfetch["user_role"];
    }

    // Kullanıcı adı kıstası yapılıyor.
    if (empty($vt_nick) || $user_nick !== $vt_nick) {
        header('Location:../user?login-status=nick-failed');
        exit;
    }

    //Parola karşılaştırması yapılıyor
    if ($user_password !== $vt_password) {
        header('Location:../user?login-status=pass-failed');
        exit;
    } else {
        $_SESSION['user_id'] = $vt_id;
        $_SESSION['user_nick'] = $vt_nick;
        $_SESSION['user_mail'] = $vt_mail;
        $_SESSION['user_status'] = $vt_status;
        $_SESSION['user_role'] = $vt_role;
        

        header('Location:../?login-status=success');
        exit;
    }

    // Ultra hata denetim mekanizması
    echo "<br> Yönlenmedin ve hala buradasın. Bu çok yanlış ya da çok doğru :-)";
}

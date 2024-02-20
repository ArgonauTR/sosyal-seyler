<?PHP

// Ana fonskiyon dosyası ekleniyor.
include("main-function.php");

// Seflink dosyası ekleniyor.
include("seflink.php");

if (isset($_POST["user_registry"])) {

    // Formdan gelen değerler değişkenlere aktarıldı.
    $user_nick = htmlspecialchars(strip_tags($_POST["user_nick"]));
    $user_mail = htmlspecialchars(strip_tags($_POST["user_mail"]));
    $user_password = md5(htmlspecialchars(strip_tags($_POST["user_password"])));

    //Nick karakter sayısı denetleniyor.
    $user_nick_chacter_count = strlen($user_nick);
    if ($user_nick_chacter_count < 3 || $user_nick_chacter_count > 16) {
        header('Location:../user?user=registry&registry-status=user-nick-count');
        exit;
    }

    //Şifre karakter sayısı denetleniyor.
    $user_password_chacter_count = strlen(htmlspecialchars(strip_tags($_POST["user_password"])));
    if ($user_password_chacter_count < 5 || $user_password_chacter_count > 13) {
        header('Location:../user?user=registry&registry-status=user-password-count');
        exit;
    }

    //Bu kullanıcı var mı denetleniyor.
    $userask = $db->prepare("SELECT * FROM users");
    $userask->execute(array());
    while ($userfetch = $userask->fetch(PDO::FETCH_ASSOC)) {
        //Nick denetimi
        if ($userfetch["user_nick"] === $user_nick) {
            header('Location:../user?user=registry&registry-status=user-nick-exist');
            exit;
        }
        //Nick denetimi
        if ($userfetch["user_mail"] === $user_mail) {
            header('Location:../user?user=registry&registry-status=user-mail-exist');
            exit;
        }
    }

    //Kullanıcı kaydı yapılıyor.
    $user_status="pending";
    $user_role="user";
    $user = $db->prepare("INSERT into users set
    user_name=:user_name,
    user_nick=:user_nick,
    user_mail=:user_mail,
    user_password=:user_password,
    user_status=:user_status,
    user_role=:user_role

    ");
    $insert = $user->execute(array(
        'user_name' => $user_nick,
        'user_nick' => permalink($user_nick),
        'user_mail' => $user_mail,
        'user_password' => $user_password,
        'user_status' => $user_status,
        'user_role' => $user_role
    ));

    // Son kaydedilen ID bir değişkene aktarıldı.
    $last_user_id = $db->lastInsertId();

    if ($insert) {
        $_SESSION['user_id'] = $last_user_id;
        $_SESSION['user_nick'] = permalink($user_nick);
        $_SESSION['user_mail'] = $user_mail;
        $_SESSION['user_status'] = $user_status;
        $_SESSION['user_role'] = $user_role;

        header('Location:/?registry-status=registry-success');
        exit;
    } else {
        header('Location:../user?user=registry&registry-status=user-unknow-fail');
        exit;
    }




    // Ultra hata denetim mekanizması
    echo "<br> Yönlenmedin ve hala buradasın. Bu çok yanlış ya da çok doğru :-)";
}

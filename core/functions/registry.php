<?PHP

// Ana fonskiyon dosyası ekleniyor.
include("../codex.php");

if (isset($_POST["user_registry"])) {

    // Formdan gelen değerler değişkenlere aktarıldı.
    $user_nick = htmlspecialchars(strip_tags($_POST["user_nick"]));
    $user_mail = htmlspecialchars(strip_tags($_POST["user_mail"]));
    $user_password = md5(htmlspecialchars(strip_tags($_POST["user_password"])));
    $user_link = newlink("", $user_nick, "user");
    $user_image_url = $site_name."/admin/system/images/user.jpeg";

    //Nick karakter sayısı denetleniyor.
    $user_nick_chacter_count = strlen($user_nick);
    if ($user_nick_chacter_count < 3 || $user_nick_chacter_count > 16) {
        header('Location:' . $site_name . '/registry?alert=nick-count');
        exit;
    }

    //Şifre karakter sayısı denetleniyor.
    $user_password_chacter_count = strlen(htmlspecialchars(strip_tags($_POST["user_password"])));
    if ($user_password_chacter_count < 5 || $user_password_chacter_count > 13) {
        header('Location:' . $site_name . '/registry?alert=password-count');
        exit;
    }

    //Bu kullanıcı var mı denetleniyor.
    $userask = $db->prepare("SELECT * FROM users");
    $userask->execute(array());
    while ($userfetch = $userask->fetch(PDO::FETCH_ASSOC)) {
        //Nick denetimi
        if ($userfetch["user_nick"] === $user_nick) {
            header('Location:' . $site_name . '/registry?alert=nick-exist');
            exit;
        }
        //Nick denetimi
        if ($userfetch["user_mail"] === $user_mail) {
            header('Location:' . $site_name . '/registry?alert=mail-exist');
            exit;
        }
    }

    $user = $db->prepare("INSERT into users set
    user_nick=:user_nick,
    user_image_url=:user_image_url,
    user_mail=:user_mail,
    user_password=:user_password,
    user_url=:user_url,
    user_status=:user_status,
    user_role=:user_role,
    user_bio=:user_bio,
    user_theme=:user_theme,
    user_create_time=:user_create_time
    ");

    $insert = $user->execute(array(
        'user_nick' => permalink($user_nick),
        'user_image_url' => $user_image_url,
        'user_mail' => $user_mail,
        'user_password' => $user_password,
        'user_url' => $user_link,
        'user_status' => "pending",
        'user_role' => "user",
        'user_bio' => "Mesaj eklemeyecek kadar havalayım.",
        'user_theme' => "light",
        'user_create_time' => date('Y-m-d H:i:s')
    ));

    // Son kaydedilen ID bir değişkene aktarıldı.
    $last_user_id = $db->lastInsertId();

    if ($insert) {

        // SESSION değerleri yazılıyor
        $_SESSION['user_id'] = $last_user_id;
        $_SESSION['user_nick'] = permalink($user_nick);
        $_SESSION['user_url'] = $user_link;
        $_SESSION['user_role'] = "user";
        $_SESSION['user_theme'] = "light";

        // COOKIE değerleri yazılıyor.
        $cookie_time = time() + 365 * 24 * 60 * 60;

        setcookie("user_id", $_SESSION['user_id'], $cookie_time, "/");
        setcookie("user_nick", $_SESSION['user_nick'], $cookie_time, "/");
        setcookie("user_url", $_SESSION['user_url'], $cookie_time, "/");
        setcookie("user_role", $_SESSION['user_role'], $cookie_time, "/");
        setcookie("user_theme", $_SESSION['user_theme'], $cookie_time, "/");

        header('Location:' . $site_name . '?alert=registry-success');
        exit;
    } else {
        header('Location:' . $site_name . '/registry?alert=user-unknow-fail');
        exit;
    }
}

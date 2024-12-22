<?php

// Ana fonskiyon dosyası ekleniyor.
include("../codex.php");

if (isset($_POST["new_password"])) {
    $user_nick = htmlspecialchars(strip_tags($_POST["user_nick"]));
    $user_password_reset_key = htmlspecialchars(strip_tags($_POST["user_password_reset_key"]));
    $user_password = md5($_POST["user_password"]);

    $user = userinfo("SELECT * FROM users WHERE user_nick='$user_nick'");


    if ($user[0]["user_password_reset_key"] == $user_password_reset_key) {

        $user_update = $db->prepare("UPDATE users SET
        user_password_reset_key=:user_password_reset_key,
        user_password=:user_password
        WHERE user_nick= '$user_nick'");

        $update = $user_update->execute(array(
            'user_password_reset_key' =>  null,
            'user_password' => $user_password
        ));



        // Form verilerine göre sorgu yapılıp sonuçlar değişkenlere aktarldı.
        $userask = $db->prepare("SELECT * FROM users WHERE user_nick=:nick");
        $userask->execute(array('nick' => $user_nick));
        while ($userfetch = $userask->fetch(PDO::FETCH_ASSOC)) {
            $vt_id = $userfetch["user_id"];
            $vt_nick = $userfetch["user_nick"];
            $vt_password = $userfetch["user_password"];
            $vt_url = $userfetch["user_url"];
            $vt_role = $userfetch["user_role"];
            $vt_theme = $userfetch["user_theme"];
        }

        // Kullanıcı adı kıstası yapılıyor.
        if (empty($vt_nick) || $user_nick !== $vt_nick) {
            header('Location:../login?alert=nick-failed');
            exit;
        }

        //Parola karşılaştırması yapılıyor
        if ($user_password !== $vt_password) {
            header('Location:../login?alert=pass-failed');
            exit;
        } else {

            // SESSION değerleri yazılıyor
            $_SESSION['user_id'] = $vt_id;
            $_SESSION['user_nick'] = $vt_nick;
            $_SESSION['user_url'] = $vt_url;
            $_SESSION['user_role'] = $vt_role;
            $_SESSION['user_theme'] = $vt_theme;

            // COOKIE değerleri yazılıyor.
            $cookie_time = time() + 365 * 24 * 60 * 60;

            setcookie("user_id", $_SESSION['user_id'], $cookie_time, "/");
            setcookie("user_nick", $_SESSION['user_nick'], $cookie_time, "/");
            setcookie("user_url", $_SESSION['user_url'], $cookie_time, "/");
            setcookie("user_role", $_SESSION['user_role'], $cookie_time, "/");
            setcookie("user_theme", $_SESSION['user_theme'], $cookie_time, "/");


            header('Location:../?alert=login-success');
            exit;
        }
    } else {
        header('Location:/?alert=access-denied');
        exit();
    }
}

<?php

// Ana fonskiyon dosyası ekleniyor.
include("../codex.php");

// Tema değiştirme işlemi yapılıyor.
if (isset($_GET['theme'])) {
    $theme = htmlspecialchars(strip_tags($_GET["theme"]));

    $user_id = $_SESSION["user_id"];

    $users = $db->prepare("UPDATE users SET
        user_theme=:user_theme
        WHERE user_id=$user_id");

    $update = $users->execute(array(
        'user_theme' => $theme
    ));


    if ($update) {

        // SESSION değerleri yazılıyor.
        $_SESSION['user_theme'] = $theme;

        // COOKIE değerleri yazılıyor.
        $cookie_time = time() + 365 * 24 * 60 * 60;
        setcookie("user_theme", $_SESSION['user_theme'], $cookie_time, "/");

        // Anasyafaya yönlendiriliyor
        header("Location:" . $site_name . "?alert=thheme-success");
        exit;
    } else {
        header("Location:" . $site_name . "?alert=thheme-failed");
        exit;
    }
}

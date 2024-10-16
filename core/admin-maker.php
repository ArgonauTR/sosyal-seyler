<?php

$user = userinfo("SELECT * FROM users");

if (count($user) ==  0) {
    $user_nick = "admin";
    $user_image_url = $site_name . "/admin/system/images/user.jpeg";
    $user_mail = "info@" . $_SERVER['SERVER_NAME'];
    $user_password = md5("12345");
    $user_link = newlink("", $user_nick, "user");

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
        'user_nick' => $user_nick,
        'user_image_url' => $user_image_url,
        'user_mail' => $user_mail,
        'user_password' => $user_password,
        'user_url' => $user_link,
        'user_status' => "approved",
        'user_role' => "admin",
        'user_bio' => "Admin olarak bilinen kişi.",
        'user_theme' => "light",
        'user_create_time' => date('Y-m-d H:i:s')
    ));
}

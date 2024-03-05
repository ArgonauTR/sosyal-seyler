<?php

// Ana fonskiyon dosyası ekleniyor.
include("main-function.php");

// -----> Genel Ayarlar Güncelleniyor
if (isset($_POST["option_update"])) {

    $option_id = 0; //Varsayılan ayar ID'si.

    $option = $db->prepare("UPDATE options SET
        option_logo_image=:option_logo_image,
        option_favicon_image=:option_favicon_image,
        option_url=:option_url,
        option_name=:option_name,
        option_description=:option_description,
        option_footer=:option_footer,
        option_can_register=:option_can_register,
        option_admin_mail=:option_admin_mail,
        option_mailserver_url=:option_mailserver_url,
        option_mailserver_login=:option_mailserver_login,
        option_mailserver_pass=:option_mailserver_pass,
        option_mailserver_port=:option_mailserver_port,
        option_posts_per_page=:option_posts_per_page,
        option_maintenance=:option_maintenance,
        option_comments_per_page=:option_comments_per_page
    
    WHERE option_id=$option_id");

    $update = $option->execute(array(

        'option_logo_image' => $_POST["option_logo_image"],
        'option_favicon_image' => $_POST["option_favicon_image"],
        'option_url' => $_POST["option_url"],
        'option_name' => $_POST["option_name"],
        'option_description' => $_POST["option_description"],
        'option_footer' => $_POST["option_footer"],
        'option_can_register' => $_POST["option_can_register"],
        'option_admin_mail' => $_POST["option_admin_mail"],
        'option_mailserver_url' => $_POST["option_mailserver_url"],
        'option_mailserver_login' => $_POST["option_mailserver_login"],
        'option_mailserver_pass' => $_POST["option_mailserver_pass"],
        'option_mailserver_port' => $_POST["option_mailserver_port"],
        'option_posts_per_page' => $_POST["option_posts_per_page"],
        'option_maintenance' => $_POST["option_maintenance"],
        'option_comments_per_page' => $_POST["option_comments_per_page"]
    ));

    if ($update) {

        header('Location:../option.php?update=ok');
        exit;
    } else {

        header('Location:../option.php?update=no');
        exit;
    }
}


// -----> FooterLink düzenleniyor
if (isset($_POST["option_respect_option"])) {

    if ($_POST["option_respect"] == "on") {
        $option_respect = "yes";
    } else {
        $option_respect = "no";
    }

    $option_id = 0;

    $option = $db->prepare("UPDATE options SET
    
    option_respect=:option_respect
    
    WHERE option_id=$option_id");

    $update = $option->execute(array(

        'option_respect' => $option_respect
    ));

    if ($update) {

        header('Location:../help.php?update=ok');
        exit;
    } else {

        header('Location:../helps.php?update=no');
        exit;
    }
}

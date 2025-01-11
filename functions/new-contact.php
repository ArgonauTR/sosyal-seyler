<?php

// Ana fonskiyon dosyası ekleniyor.
include("../codex.php");

// Cookie kontrol edilerek güvenlik sağlanıyor.
if ($_SESSION["value_1"] + $_SESSION["value_2"] == $_POST["contact_value"]) {

    // Konu ekleme işlemi yapılıyor
    if (isset($_POST['new_contact'])) {

        // Veriler hazırlanıyor
        $contact_name = htmlspecialchars(strip_tags($_POST["contact_name"]));
        $contact_mail = htmlspecialchars(strip_tags($_POST["contact_mail"]));
        $contact_title = htmlspecialchars(strip_tags($_POST["contact_title"]));
        $contact_content = htmlspecialchars(strip_tags($_POST["contact_content"]));
        $contact_status = "draft";
        $contact_type = "contact";
        $contact_create_time = date('Y-m-d H:i:s');

        // Sorgu hazırlanıyor
        $contacts = $db->prepare("INSERT into contacts set
        contact_name=:contact_name,
        contact_mail=:contact_mail,
        contact_title=:contact_title,
        contact_content=:contact_content,
        contact_status=:contact_status,
        contact_type=:contact_type,
        contact_create_time=:contact_create_time
        ");


        // Veriler ekleniyor
        $insert = $contacts->execute(array(
            'contact_name' => $contact_name,
            'contact_mail' => $contact_mail,
            'contact_title' => $contact_title,
            'contact_content' => $contact_content,
            'contact_status' => $contact_status,
            'contact_type' => $contact_type,
            'contact_create_time' => $contact_create_time

        ));


        // Yönlendirme ve Mesaj veriliyor.
        if ($insert) {
            header("Location:" . $site_name . "/contact?alert=contact-success");
            exit;
        } else {
            header("Location:" . $site_name . "/contact?alert=contact-failed");
            exit;
        }
    }
} else {
    header("Location:" . $site_name . "/contact?alert=contact-bot-failed");
    exit;
}

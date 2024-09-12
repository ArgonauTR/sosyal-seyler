<?php
include("permalink.php");

function newlink($id, $name, $type)
{
    // Site adı buraa alınıyor.
    global $site_name;

    // Konular için link oluşturuyor.
    if ($type == "post") {
        $new_link = $site_name . "/" . $id . "-" . substr(permalink($name), 0, 50);
        return $new_link;
    }

    // Kategoriler için link olşturuyor
    if ($type == "category") {
        $new_link = $site_name . "/categories/" . substr(permalink($name), 0, 30);
        return $new_link;
    }

    // Üyeler için link oluşturuyor
    if ($type == "user") {
        $new_link = $site_name . "/user/" . substr(permalink($name), 0, 20);
        return $new_link;
    }

    // Resimler için link oluşturuluyor
    if ($type == "image") {
        $new_link = $site_name . "/upload/images/" . $name;
        return $new_link;
    }
}

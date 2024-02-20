<?php

// Ana fonskiyon dosyası ekleniyor.
include("main-function.php");


if (isset($_POST['image_update'])) {

    $image_id = $_POST["image_id"];

    $image = $db->prepare("UPDATE images SET

    image_description=:image_description

    WHERE image_id=$image_id");

    $update = $image->execute(array(
        'image_description' => $_POST["image_description"]
    ));

    if ($update) {

        header("Location:../process.php?image=image-update&image_id=" . $image_id . "&status=ok");
        exit;
    } else {

        header("Location:../process.php?image=image-update&image_id=" . $image_id . "&status=no");
        exit;
    }
}

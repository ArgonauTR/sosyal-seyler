<?php

// Ana fonskiyon dosyası ekleniyor.
include("main-function.php");


if (isset($_POST['comment_update'])) {

    $comment_id = $_POST["comment_id"];

    $comments = $db->prepare("UPDATE comments SET

    comment_content=:comment_content

    WHERE comment_id=$comment_id");

    $update = $comments->execute(array(
        'comment_content' => $_POST["comment_content"]
    ));

    if ($update) {

        header("Location:../process.php?comment=comment-update&comment_id=".$comment_id."&status=ok");
        exit;
    } else {

        header("Location:../process.php?comment=comment-update&comment_id=".$comment_id."&status=no");
        exit;
    }
}

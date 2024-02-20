<?php
if (isset($_POST["message_send"])) {

    // Ana fonskiyon dosyası ekleniyor.
    include("main-function.php");

    $message_title = substr(htmlspecialchars(strip_tags($_POST["message_title"])), 0, 100);
    $message_content = htmlspecialchars(strip_tags($_POST["message_content"]));
    $message_status = "wait";
    $message_author_name = substr(htmlspecialchars(strip_tags($_POST["message_author_name"])), 0, 100);
    $message_author_mail = substr(htmlspecialchars(strip_tags($_POST["message_author_mail"])), 0, 100);
    $message_ip = $_SERVER["REMOTE_ADDR"];
    $message_agent = $_SERVER['HTTP_USER_AGENT'];

    $messages = $db->prepare("INSERT into messages set

    message_title=:message_title,
    message_content=:message_content,
    message_status=:message_status,
    message_author_name=:message_author_name,
    message_author_mail=:message_author_mail,
    message_ip=:message_ip,
    message_agent=:message_agent

	");


    $insert = $messages->execute(array(
        'message_title' => $message_title,
        'message_content' => $message_content,
        'message_status' => $message_status,
        'message_author_name' => $message_author_name,
        'message_author_mail' => $message_author_mail,
        'message_ip' => $message_ip,
        'message_agent' => $message_agent


    ));


    if ($insert) {

        header("Location:../message?status=ok");
        exit;
    } else {

        header("Location:../message?status=no");
        exit;
    }
}

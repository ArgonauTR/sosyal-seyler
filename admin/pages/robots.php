<?php
$type = $_GET["type"];

switch($type){
    case "menu": // Anasayfa açılıyor
        include("./pages/process/robot-menu.php");
    break;
    case "robot-user":
        include("./pages/process/robot-user.php");
    break;
    case "robot-post":
        include("./pages/process/robot-post.php");
    break;
    case "robot-comment":
        include("./pages/process/robot-comment.php");
    break;
}

?>
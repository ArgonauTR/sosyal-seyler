<?php
if (isset($_COOKIE["user_id"])) {
    $_SESSION['user_id'] = $_COOKIE['user_id'];
    $_SESSION['user_nick'] = $_COOKIE['user_nick'];
    $_SESSION['user_url'] = $_COOKIE['user_url'];
    $_SESSION['user_role'] = $_COOKIE['user_role'];
    $_SESSION['user_theme'] = $_COOKIE['user_theme'];
}
?>
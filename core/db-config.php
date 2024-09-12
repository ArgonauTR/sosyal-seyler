<?php

try {
    $db = new PDO("mysql:host=localhost;dbname=$db_name;charset=utf8", $db_user, $db_password);
    // echo "Veritabanı bağlantısı başarılı";
} catch (PDOException $e) {
    echo $e->getMessage();
}

?>

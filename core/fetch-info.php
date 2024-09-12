<?php
/*
    Veritabanından çekme işlemi yapılırken burada ki fonskiyonlar SQL sorgularını daha temiz gösteriyor.
    Osman ÖZER - 25.08.2024
*/


// KATEGORİ ÇEKME SORGU FONKSİYONU
function categoryinfo($sql){
    global $db;
    $category = $db->prepare($sql);
    $category->execute();
    return $category->fetchAll(PDO::FETCH_ASSOC);
}

// YORUM ÇEKME SORGU FONKSİYONU
function commentinfo($sql){
    global $db;
    $comment = $db->prepare($sql);
    $comment->execute();
    return $comment->fetchAll(PDO::FETCH_ASSOC);
}

// RESİM ÇEKME SORGU FONKSİYONU
function imageinfo($sql){
    global $db;
    $stmt = $db->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// KONU ÇEKME SORGU FONKSİYONU
function postinfo($sql){
    global $db;
    $stmt = $db->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// ÜYE ÇEKME SORGU FONKSİYONU
function userinfo($sql){
    global $db;
    $stmt = $db->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// İLETİŞİM FORMU BİLGİLERİ ÇEKME SORGU FONKSİYONU
function contactinfo($sql){
    global $db;
    $stmt = $db->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// DÜZEN FORMU BİLGİLERİ ÇEKME SORGU FONKSİYONU
function orderinfo($sql){
    global $db;
    $stmt = $db->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// AYAR ÇEKME SORGU FONKSİYONU
function optioninfo($term){
    global $db;
    $stmt = $db->prepare("SELECT option_value FROM options WHERE option_name = :term LIMIT 1");
    $stmt->bindParam(':term', $term, PDO::PARAM_STR);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result ? $result["option_value"] : null;
}

// REKLAM ÇEKME SORGU FONKSİYONU
function adinfo($term){
    global $db;
    $stmt = $db->prepare("SELECT ad_value FROM ads WHERE ad_name = :term LIMIT 1");
    $stmt->bindParam(':term', $term, PDO::PARAM_STR);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result ? $result["ad_value"] : null;
}

?>
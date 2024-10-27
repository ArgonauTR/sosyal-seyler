<?php

include("codex.php");




$users = userinfo("SELECT * FROM users WHERE user_role='robot'");
echo count($users);

/*
$users = userinfo("SELECT * FROM users");
foreach ($users as $user) {
    $user_id = $user["user_id"];

    $users = $db->prepare("UPDATE users SET
    user_image_url=:user_image_url
    WHERE user_id=$user_id");

    $update = $users->execute(array(
        'user_image_url' => $site_name . "/admin/system/images/user.jpeg"
    ));
    if ($update) {
        echo "==> " . $user["user_nick"] . " kişsinin bilgileri güncellendi.<br>";
    }
}
*/




/*   -----> KATEGORİ BİLGİLERİ GÜNCELLEME KODU
$categories = userinfo("SELECT * FROM categories");
foreach($categories as $category){
    $category_title = $category["category_title"];
    $category_id = $category["category_id"];

    $categories = $db->prepare("UPDATE categories SET
    category_title_sef=:category_title_sef
    WHERE category_id=$category_id");

$update = $categories->execute(array(
    'category_title_sef' => permalink($category_title)
));
if($update){
    echo "==> ".$category["category_title"]." kategorisi bilgileri güncellendi.<br>";
}
}


*/






/*   -----> KULLANICI BİLGİLERİ GÜNCELLEME KODU

$users = userinfo("SELECT * FROM users");
foreach($users as $user){
    $user_id = $user["user_id"];
    $user_nick = $user["user_nick"];


    $users = $db->prepare("UPDATE users SET
    user_url=:user_url,
    user_bio=:user_bio
    WHERE user_id=$user_id");

$update = $users->execute(array(
    'user_url' => newlink("",$user_nick,"user"),
    'user_bio' => "Mesaj eklemeyecek kadar havalayım."
));
if($update){
    echo "==> ".$user["user_nick"]." kullanıcısı bilgileri güncellendi.<br>";
}
}

*/

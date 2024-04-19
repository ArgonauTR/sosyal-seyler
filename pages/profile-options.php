<?php
$user_id = $_SESSION['user_id'];
$userask = $db->prepare("SELECT * FROM users WHERE user_id=:id");
$userask->execute(array('id' => $user_id));
while ($userfetch = $userask->fetch(PDO::FETCH_ASSOC)) {
    $user_name = $userfetch["user_name"];
    $user_nick = $userfetch["user_nick"];
    $user_mail = $userfetch["user_mail"];
    $user_status = $userfetch["user_status"];
    $user_role = $userfetch["user_role"];
    $user_image = $userfetch["user_image"];
    $user_time = $userfetch["user_time"];
}

//Resim Yolunu Çekiyor
$post_thumbnail_id = $user_image;
$imageask = $db->prepare("SELECT * FROM images WHERE image_id=:id");
$imageask->execute(array('id' => $post_thumbnail_id));
while ($imagefetch = $imageask->fetch(PDO::FETCH_ASSOC)) {
    $image_id = $imagefetch["image_id"];
    $image_title = $imagefetch["image_title"];
    $image_link = $imagefetch["image_link"];
}

if(isset($_GET["status"])){
    if($_GET["status"]=="ok"){
        echo '<div class="alert alert-success" role="alert">
        Güncelleme Başarılı
      </div>';
    }else{
        echo '<div class="alert alert-danger" role="alert">
        Güncelleme Hatası Alındı
      </div>';
    }

}
?>
<div class="pt-3 m-3">

    <form action="./functions/user-update.php" method="POST" enctype="multipart/form-data">

        <div class="mb-3 d-flex justify-content-center">
            <?php
            if (isset($image_link)) {
                echo '<a href="' . $image_link . '" target="_blank"><img style="height: 100px;" src="' . $image_link . '" /></a>';
            } else {
                echo '<i class="bi bi-person-fill-x h1 me-2"></i>';
            }
            ?>
        </div>

        <div class="mb-3 mt-3">
            <input type="text" class="form-control bg-dark text-white" name="image_id" value="<?php if (isset($image_id)) {
                                                                                                    echo $image_id;
                                                                                                } ?>" hidden>
        </div> 

        <div class="mb-3 mt-3">
            <input type="text" class="form-control bg-dark text-white" name="user_id" value="<?php echo $user_id; ?>" hidden>
        </div>

        <div class="mb-3">
            <label class="form-label">Profil Resmi</label>
            <input class="form-control bg-dark text-white border-primary" type="file" name="resim">
            <div class="form-text">Yorumlarda ve çeşitli yerlerde görünür</div>
        </div>

        <div class="mb-3">
            <label class="form-label">Takma Ad</label>
            <input type="text" class="form-control bg-dark text-white border-primary" name="user_name" value="<?php echo $user_name; ?>" required>
            <div class="form-text">Yorum Adı, Yazar Adı vs..</div>
        </div>

        <div class="mb-3">
            <label class="form-label">Kullanıcı Adı (Değişmez)</label>
            <input type="text" class="form-control bg-dark text-white border-primary" value="<?php echo $user_nick; ?>" disabled>
            <div class="form-text"><b>Değişmez.</b> Sisteme Giriş İçin.</div>
        </div>

        <div class="mb-3">
            <label class="form-label">E Posta</label>
            <input type="email" class="form-control bg-dark text-white border-primary" name="user_mail" value="<?php echo $user_mail; ?>" required>
            <div class="form-text">Aktif ve kullanımda bir posta olmalıdır.</div>
        </div>

        <div class="form-group d-grid gap-2 col-6 mx-auto text-center">
            <button type="submit" name="user_info_update" class="btn btn-primary text-white border-primary">
                Güncelle
            </button>
        </div>

    </form>

    <div class="border-bottom position-relative h4 mt-4 mb-4">Giriş Şifresini Güncelle</div>
    <form action="./functions/user-update.php" method="POST">

        <div class="mb-3 mt-3">
            <input type="text" class="form-control bg-dark text-white" name="user_id" value="<?php echo $user_id; ?>" hidden>
        </div>

        <div class="mb-3">
            <label class="form-label">Yeni Şifreniz</label>
            <input type="text" class="form-control bg-dark text-white border-primary" name="user_password" placeholder="******" required>
        </div>

        <div class="form-group d-grid gap-2 col-6 mx-auto text-center">
            <button type="submit" name="user_password_update" class="btn btn-primary text-white border-primary">
                Güncelle
            </button>
        </div>

    </form>
</div>
<?php
// Giriş için yetki sınanıyor.
if (empty($_SESSION['user_nick'])) {
    header("Location:/?alert=access-denied");
    exit();
}

// GET değerine bir option atanıyor.
if (empty($_GET["option"])) {
    $_GET["option"] = "image";
}

// Tab için işaretleme yapılıyor.
function tabactive($name)
{
    $option = htmlentities(strip_tags($_GET["option"]));
    if ($option == $name) {
        return "active";
    } else {
        return "";
    }
}

// Kullanıcı verileri çekiliyor.
$nick = $_SESSION["user_nick"];
$user = userinfo("SELECT * FROM users WHERE user_nick='$nick'");

?>
<div class="h2 text-center pb-2"><i class="bi bi-gear"></i> Ayarlar</div>
<ul class="nav nav-tabs">
    <li class="nav-item">
        <a class="nav-link <?php echo tabactive("image"); ?>" href="?option=image"><i class="bi bi-person"></i> Resim</a>
    </li>
    <li class="nav-item">
        <a class="nav-link <?php echo tabactive("message"); ?>" href="?option=message"><i class="bi bi-card-text"></i> Mesaj</a>
    </li>
    <li class="nav-item">
        <a class="nav-link <?php echo tabactive("password"); ?>" href="?option=password"><i class="bi bi-key"></i> Şifre</a>
    </li>
</ul>


<?php
if ($_GET["option"] == "image") {
?>
    <div class="row mt-4">
        <div class="col-4 text-center">
            <img src="<?php echo $user[0]["user_image_url"]; ?>" class="rounded-circle" alt="User Avatar" width="100" height="100">
        </div>
        <div class="col-8 text-center">
            <form method="POST" action="<?php echo $site_name . "/functions/option-pp-update.php"; ?>" enctype="multipart/form-data">
                <label class="form-label">Yeni Resim Seçin</label>
                <input class="form-control" type="file" name="upload" required>
                <button type="submit" class="btn btn-outline-secondary mt-3" name="pp_update">Güncelle</button>
            </form>
        </div>
        <div class="text-mute text-center">
            <p><b>Kare bir görsel kullanmanızı şiddetle öneriyoruz</b></p>
        </div>
    </div>
<?php
} elseif ($_GET["option"] == "message") {
?>
    <div class="text-center mt-4">
        <form method="POST" action="<?php echo $site_name . "/functions/option-bio-update.php"; ?>">
            <div class="mb-3">
                <label class="form-label">Yeni Mesaj Yazın</label>
                <textarea class="form-control" name="user_bio" required><?php echo $user[0]["user_bio"]; ?></textarea>
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-outline-secondary" name="bio_update">Güncelle</button>
            </div>
        </form>
    </div>
<?php
} elseif ($_GET["option"] == "password") {
?>

    <div class="text-center mt-4">
        <form method="POST" action="<?php echo $site_name . "/functions/option-pass-update.php"; ?>">
            <div class="mb-3">
                <input type="password" class="form-control" name="pass_1" placeholder="Yeni Şifre" required>
            </div>
            <div class="mb-3">
                <input type="password" class="form-control" name="pass_2" placeholder="Yeni Şifre (Tekrar)" required>
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-outline-secondary" name="pass_update">Güncelle</button>
            </div>
        </form>
    </div>
<?php
}
?>
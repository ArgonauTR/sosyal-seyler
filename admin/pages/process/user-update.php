<?php
// Kullanıcı verileri çekiliyor.
$user_id = $_GET["user_id"];
$user = userinfo("SELECT * FROM users WHERE user_id='$user_id'");
?>
<div class="col-12 col-lg-9">

    <div class="card">
        <div class="card-header">
            <i class="bi bi-file-earmark-person"></i> Resim Güncelle
        </div>
        <div class="card-body">
            <div class="row mt-4">
                <div class="col-4 text-center">
                    <img src="<?php echo $user[0]["user_image_url"]; ?>" class="rounded-circle" alt="User Avatar" width="100" height="100">
                </div>
                <div class="col-8 text-center">
                    <form method="POST" action="<?php echo $site_name . "/admin/functions/option-pp-update.php"; ?>" enctype="multipart/form-data">
                        <input class="form-control" type="text" name="user_id" value="<?php  echo $user[0]["user_id"] ?>" hidden>
                        <label class="form-label">Yeni Resim Seçin</label>
                        <input class="form-control" type="file" name="upload" required>
                        <button type="submit" class="btn btn-outline-secondary mt-3" name="pp_update">Güncelle</button>
                    </form>
                </div>
                <div class="text-mute text-center">
                    <p><b>Kare bir görsel kullanmanızı şiddetle öneriyoruz</b></p>
                </div>
            </div>
        </div>
    </div>

    <div class="card mt-3">
        <div class="card-header">
            <i class="bi bi-file-earmark-person"></i> Mesaj Güncelle
        </div>
        <div class="card-body">
            <div class="text-center mt-4">
                <form method="POST" action="<?php echo $site_name . "/admin/functions/option-bio-update.php"; ?>">
                <input class="form-control" type="text" name="user_id" value="<?php  echo $user[0]["user_id"] ?>" hidden>
                    <div class="mb-3">
                        <label class="form-label">Yeni Mesaj Yazın</label>
                        <textarea class="form-control" name="user_bio" required><?php echo $user[0]["user_bio"]; ?></textarea>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-outline-secondary" name="bio_update">Güncelle</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="card mt-3">
        <div class="card-header">
            <i class="bi bi-file-earmark-person"></i> Şifre Güncelle
        </div>
        <div class="card-body">
            <div class="text-center mt-4">
                <form method="POST" action="<?php echo $site_name . "/admin/functions/option-pass-update.php"; ?>">
                <input class="form-control" type="text" name="user_id" value="<?php  echo $user[0]["user_id"] ?>" hidden>
                    <div class="mb-3">
                        <input type="text" class="form-control" name="pass_1" placeholder="Yeni Şifre" required>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-outline-secondary" name="pass_update">Güncelle</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
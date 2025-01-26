<?php
// Kullanıcı verileri çekiliyor.
$user_id = $_GET["user_id"];
$user = userinfo("SELECT * FROM users WHERE user_id='$user_id'");
?>
<div class="col-12 col-lg-9">

    <div class="card">
        <div class="card-header">
            <i class="bi bi-file-earmark-person"></i> Profil Güncelle
        </div>
        <div class="card-body">
            <form method="POST" action="<?php echo $site_name . "/admin/functions/user-update.php"; ?>">

                <div class="mb-3 text-center">
                    <img src="<?php echo $user[0]["user_image_url"]; ?>" class="rounded-circle" alt="User Avatar" width="150" height="150">
                </div>

                <div class="mb-3">
                    <input type="text" name="user_id" value="<?php echo $user[0]["user_id"]; ?>" class="form-control" hidden>
                </div>

                <div class="mb-3">
                    <label class="form-label">Profil Resim Linki</label>
                    <input type="text" name="user_image_url" value="<?php echo $user[0]["user_image_url"]; ?>" class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">Kullanıcı Adı</label>
                    <input type="text" value="<?php echo $user[0]["user_nick"]; ?>" class="form-control" disabled>
                </div>

                <div class="mb-3">
                    <label class="form-label">Mail Adresi</label>
                    <input type="text" name="user_mail" value="<?php echo $user[0]["user_mail"]; ?>" class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">Şifre</label>
                    <div class="input-group">
                        <div class="input-group-text">
                            <input class="form-check-input mt-0" type="checkbox" name="user_password_permision">
                        </div>
                        <input type="text" name="user_password" class="form-control">
                    </div>
                    <div class="form-text">Şifreyi Değiştirmek için kutucuğu işaretleyin.</div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Profil Linki</label>
                    <input type="text" value="<?php echo $user[0]["user_url"]; ?>" class="form-control" disabled>
                </div>

                <div class="mb-3">
                    <label class="form-label">Yetkisi</label>
                    <select class="form-select" name="user_role">
                        <?php
                        if ($user[0]["user_role"] == "admin") {
                            echo '<option value="admin" selected>Yönetici</option>';
                            echo '<option value="user">Üye</option>';
                        } else {
                            echo '<option value="admin">Yönetici</option>';
                            echo '<option value="user" selected>Üye</option>';
                        }
                        ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Durumu</label>
                    <select class="form-select" name="user_status">
                        <?php
                        if ($user[0]["user_status"] == "approved") {
                            echo '<option value="approved" selected>Onaylı</option>';
                            echo '<option value="pending">Bekliyor</option>';
                        } else {
                            echo '<option value="approved">Onaylı</option>';
                            echo '<option value="pending" selected>Bekliyor</option>';
                        }
                        ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Biografisi</label>
                    <textarea class="form-control" name="user_bio" rows="3"><?php echo $user[0]["user_bio"]; ?></textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Üyelik Zamanı</label>
                    <input type="text" name="user_create_time" value="<?php echo $user[0]["user_create_time"] . " yani " . datetime($user[0]["user_create_time"]); ?>" class="form-control" disabled>
                </div>

                <div class="mb-3 text-center">
                    <button type="submit" class="btn btn-outline-secondary">
                        <i class="bi bi-floppy"></i> Kaydet
                    </button>
                </div>

            </form>
        </div>
    </div>

</div>
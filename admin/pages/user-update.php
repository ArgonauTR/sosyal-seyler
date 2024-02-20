<div class="col-lg-9">
    <div class="card bg-dark text-white">
        <div class="card-body">
            <div class="card-header">
                <i class="bi bi-arrow-clockwise me-1"></i>
                ÜYE GÜNCELLE
            </div>
            <div class="card-body">
                <?php
                $user_id = $_GET["user_id"];
                $userask = $db->prepare("SELECT * FROM users WHERE user_id=:id");
                $userask->execute(array('id' => $user_id));
                while ($userfetch = $userask->fetch(PDO::FETCH_ASSOC)) {

                    $user_id = $userfetch["user_id"];
                    $user_name = $userfetch["user_name"];
                    $user_nick = $userfetch["user_nick"];
                    $user_mail = $userfetch["user_mail"];
                    $user_password = $userfetch["user_password"];
                    $user_status = $userfetch["user_status"];
                    $user_role = $userfetch["user_role"];
                    $user_image = $userfetch["user_image"];


                    //Resim Yolunu Çekiyor
                    $post_thumbnail_id = $user_image;
                    $imageask = $db->prepare("SELECT * FROM images WHERE image_id=:id");
                    $imageask->execute(array('id' => $post_thumbnail_id));
                    while ($imagefetch = $imageask->fetch(PDO::FETCH_ASSOC)) {
                        $image_id = $imagefetch["image_id"];
                        $image_title = $imagefetch["image_title"];
                        $image_link = $imagefetch["image_link"];
                    }
                }
                ?>

                <!-- BU KISIMDA Kİ FORM KULLANICI BİLGİLERİNİ GÜNCELLER -->

                <form action="./functions/user-update.php" method="POST" enctype="multipart/form-data">

                    <div class="mb-3 mt-3">
                        <input type="text" class="form-control bg-dark text-white" name="user_id" value="<?php echo $user_id; ?>" hidden>
                    </div>

                    <div class="mb-3 d-flex justify-content-center">
                        <?php
                        if (isset($image_link)) {
                            echo '<a href="' . $image_link . '" target="_blank"><img style="height: 150px;" src="' . $image_link . '" /></a>';
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

                    <div class="mb-3 d-flex justify-content-center">
                        <?php echo "Nick: " . $user_nick; ?>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Yeni Resim Yükle</label>
                        <input class="form-control bg-dark text-white" type="file" name="resim">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Kullanıcı Adı</label>
                        <input type="text" class="form-control bg-dark text-white" name="user_name" value="<?php echo $user_name; ?>" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">E-Posta</label>
                        <input type="email" class="form-control bg-dark text-white" name="user_mail" value="<?php echo $user_mail; ?>" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Üyelik Durumu</label>
                        <select class="form-select bg-dark text-white" name="user_status">
                            <option value="approved" <?php if ($user_status == "approved") {
                                                            echo "selected";
                                                        } ?>>Onaylı</option>
                            <option value="pending" <?php if ($user_status == "pending") {
                                                        echo "selected";
                                                    } ?>>Bekliyor</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Üyelik Statüsü</label>
                        <select class="form-select bg-dark text-white" name="user_role">
                            <option value="admin" <?php if ($user_role == "admin") {
                                                        echo "selected";
                                                    } ?>>Admin</option>
                            <option value="author" <?php if ($user_role == "author") {
                                                        echo "selected";
                                                    } ?>>Yazar</option>
                            <option value="user" <?php if ($user_role == "user") {
                                                        echo "selected";
                                                    } ?>>Üye</option>
                        </select>
                    </div>

                    <div class="mb-3 text-center">
                        <button type="submit" class="btn btn-primary" name="user_info_update">Kaydet & Güncelle</button>
                    </div>

                </form>

                <div class="border-bottom mt-5 position-relative">Şifre Güncelle</div>

                <!-- BU KISIMDA Kİ FORM SADECE ŞİFREYİ GÜNCELLER -->

                <form action="./functions/user-update.php" method="POST">

                    <div class="mb-3 mt-3">
                        <input type="text" class="form-control bg-dark text-white" name="user_id" value="<?php echo $user_id; ?>" hidden>
                    </div>

                    <div class="mb-3 mt-3">
                        <label class="form-label">Yeni Şifre</label>
                        <input type="text" class="form-control bg-dark text-white" name="user_password" value="" placeholder="Şifre Belirle">
                    </div>

                    <div class="mb-3 text-center">
                        <button type="submit" class="btn btn-primary" name="user_password_update">Kaydet & Güncelle</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
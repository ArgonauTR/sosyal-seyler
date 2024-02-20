<?php
//Logo Yolu Çekiyor
$post_thumbnail_id = $optionfetch["option_logo_image"];
$imageask = $db->prepare("SELECT * FROM images WHERE image_id=:id");
$imageask->execute(array('id' => $post_thumbnail_id));
while ($imagefetch = $imageask->fetch(PDO::FETCH_ASSOC)) {
    $option_logo_image_id = $imagefetch["image_id"];
    $option_logo_image_link = $imagefetch["image_link"];
}
//İcon Yolu Çekiyor
$post_thumbnail_id = $optionfetch["option_favicon_image"];
$imageask = $db->prepare("SELECT * FROM images WHERE image_id=:id");
$imageask->execute(array('id' => $post_thumbnail_id));
while ($imagefetch = $imageask->fetch(PDO::FETCH_ASSOC)) {
    $option_favicon_image_id = $imagefetch["image_id"];
    $option_favicon_image_link = $imagefetch["image_link"];
}
?>
<div class="col-lg-9">
    <div class="card bg-dark text-white">
        <div class="card-body">
            <div class="card-header">
                AYARLAR
            </div>
            <div class="card-body">

                <div class="border-bottom position-relative mt-4 mb-4"><i class="bi bi-gear me-1"></i>Site Logosunu Güncelle</div>

                <form action="./functions/option-update.php" method="POST" enctype="multipart/form-data">

                    <div class="mb-3 d-flex justify-content-center">
                        <img style="height: 100px;" src="<?php echo $option_logo_image_link; ?>" />
                    </div>

                    <div class="mb-3 mt-3">
                        <input type="text" class="form-control bg-dark text-white" name="option_logo_image_id" value="<?php echo $option_logo_image_id; ?>" hidden>
                    </div>

                    <div class="mb-3">
                        <input class="form-control bg-dark text-white" type="file" name="resim" required>
                    </div>

                    <div class="mb-3 text-center">
                        <button type="submit" class="btn btn-primary" name="option_logo_update">Kaydet & Güncelle</button>
                    </div>

                </form>

                <div class="border-bottom position-relative mt-4 mb-4"><i class="bi bi-gear me-1"></i>Favicon Resmini Güncelle</div>

                <form action="./functions/option-update.php" method="POST" enctype="multipart/form-data">

                    <div class="mb-3 d-flex justify-content-center">
                        <img style="height: 100px;" src="<?php echo $option_favicon_image_link; ?>" />
                    </div>

                    <div class="mb-3 mt-3">
                        <input type="text" class="form-control bg-dark text-white" name="option_favicon_image_id" value="<?php echo $option_favicon_image_id; ?>" hidden>
                    </div>

                    <div class="mb-3">
                        <input class="form-control bg-dark text-white" type="file" name="resim" required>
                    </div>

                    <div class="mb-3 text-center">
                        <button type="submit" class="btn btn-primary" name="option_favicon_update">Kaydet & Güncelle</button>
                    </div>

                </form>

                <div class="border-bottom position-relative mt-4 mb-4"><i class="bi bi-gear me-1"></i>Genel Ayarları Güncelle</div>
                <form action="./functions/option-update.php" method="POST">

                    <div class="mb-3">
                        <label class="form-label">Site Linki</label>
                        <input type="text" class="form-control bg-dark text-white" name="" value="<?php echo $_SERVER["HTTP_HOST"]; ?>" readonly>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Site Adı</label>
                        <input type="text" class="form-control bg-dark text-white" name="option_name" value="<?php echo $optionfetch["option_name"] ?>">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Site Açıklaması</label>
                        <textarea class="form-control bg-dark text-white" rows="3" name="option_description"><?php echo $optionfetch["option_description"] ?></textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Footer Yazısı</label>
                        <textarea class="form-control bg-dark text-white" rows="3" name="option_footer"><?php echo $optionfetch["option_footer"] ?></textarea>
                    </div>

                    <div class="mb-3 text-center">
                        <button type="submit" class="btn btn-primary" name="option_update">Kaydet & Güncelle</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
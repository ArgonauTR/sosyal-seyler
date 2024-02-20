<div class="col-lg-9">
    <div class="card bg-dark text-white">
        <div class="card-body">
            <div class="card-header">
                <i class="bi bi-arrow-clockwise me-1"></i>
                RESİM GÜNCELLE
            </div>
            <div class="card-body">
                <?php
                $image_id = $_GET["image_id"];
                $imageask = $db->prepare("SELECT * FROM images WHERE image_id=:id");
                $imageask->execute(array('id' => $image_id));
                while ($imagefetch = $imageask->fetch(PDO::FETCH_ASSOC)) {

                    $image_id = $imagefetch["image_id"];
                    $image_description = $imagefetch["image_description"];
                    $image_link = $imagefetch["image_link"];
                    $image_width = $imagefetch["image_width"];
                    $image_height = $imagefetch["image_height"];
                    $image_type = $imagefetch["image_type"];
                    $image_time = $imagefetch["image_time"];
                }

                ?>
                <form action="./functions/image-update.php" method="POST" enctype="multipart/form-data">

                    <div class="mb-3 d-flex justify-content-center">
                        <a href="<?php echo $image_link; ?>" target="_blank"><img style="height: 150px;" src="<?php echo $image_link; ?>" /></a>
                    </div>

                    <div class="mb-3 d-flex justify-content-center">
                        <i class="bi bi-arrow-bar-up me-1"></i> Boy: <?php echo $image_height; ?>
                        <i class="bi bi-arrow-bar-right me-1 ms-3"></i> En: <?php echo $image_width; ?>
                        <i class="bi bi-code-square me-1 ms-3"></i> Tür: <?php echo $image_type; ?>
                    </div>

                    <div class="mb-3">
                        <input type="text" class="form-control bg-dark text-white" name="image_id" value="<?php echo $image_id; ?>" hidden>
                    </div>

                    <div class="mb-3">
                        <textarea class="form-control bg-dark text-white" rows="3" name="image_description" required><?php echo $image_description; ?></textarea>
                        <div class="form-text">Seo için kullanılıyor.</div>
                    </div>

                    <div class="mb-3 text-center">
                        <button type="submit" class="btn btn-primary" name="image_update">Kaydet & Güncelle</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
<?php
$image_id = $_GET["image_id"];
$image = imageinfo("SELECT * FROM images WHERE image_id=" . $image_id);
?>
<div class="col-12 col-lg-9">
    <div class="card">
        <div class="card-header">
            <i class="bi bi-image me-2"></i>
            <?php echo $image[0]["image_name"]; ?>
        </div>
        <div class="card-body">
            <div class="text-center">
                <img src="<?php echo $image[0]["image_link"]; ?>" class="img-fluid">
            </div>
            <ul class="list-group list-group-flush mt-4">
                <li class="list-group-item"><b>Başlık: </b><?php echo $image[0]["image_title"]; ?></li>
                <li class="list-group-item"><b>İsim: </b><?php echo $image[0]["image_name"]; ?></li>
                <li class="list-group-item"><b>Link: </b><?php echo $image[0]["image_link"]; ?></li>
                <li class="list-group-item"><b>Genişlik: </b><?php echo $image[0]["image_width"]; ?></li>
                <li class="list-group-item"><b>Yükseklik: </b><?php echo $image[0]["image_height"]; ?></li>
                <li class="list-group-item"><b>Tür: </b><?php echo $image[0]["image_type"]; ?></li>
                <li class="list-group-item"><b>Tarih: </b><?php echo $image[0]["image_create_time"] . " yani " . datetime($image[0]["image_create_time"]); ?></li>
            </ul>
            <div class="form-group mt-4 d-grid gap-2 col-6 mx-auto text-center">
                <a href="<?php echo $site_name . "/admin/images.php"; ?>" class="btn btn-outline-secondary">
                    <i class="bi bi-arrow-return-left"></i> Geri Dön
                </a>
            </div>
        </div>
    </div>
</div>
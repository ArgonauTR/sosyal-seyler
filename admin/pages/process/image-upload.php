<div class="col-12 col-lg-9">
    <div class="card">
        <div class="card-header">
            <i class="bi bi-cloud-plus"></i> Yeni Resim Yükle
        </div>
        <div class="card-body">
            <form method="POST" action="<?php echo $site_name . "/admin/functions/image-upload.php"; ?>" enctype="multipart/form-data">
                <div class="mb-3">
                    <input class="form-control" type="file" name="upload" required>
                </div>
                <div class="form-group mt-4 d-grid gap-2 col-6 mx-auto text-center">
                    <button type="submit" class="btn btn-outline-secondary" name="image_upload">
                        <i class="bi bi-upload"></i> Güncelle
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
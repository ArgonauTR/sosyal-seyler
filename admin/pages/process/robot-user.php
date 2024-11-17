<div class="col-12 col-lg-9">
    <div class="card">
        <div class="card-header">
            <i class="bi bi-person-plus"></i> Robot Üye
        </div>
        <div class="card-body">
            <form method="POST" action="<?php echo $site_name . "/admin/functions/robot-user.php"; ?>" enctype="multipart/form-data">
                <div class="mb-3">
                    <input type="file" name="upload" class="form-control" required>
                </div>
                <div class="mb-3">
                    <input type="text" name="user_nick" class="form-control" placeholder="Nick Girin" required>
                </div>
                <div class="mb-3">
                    <input type="text" name="user_bio" class="form-control" value="Mesaj eklemeyecek kadar havalayım." required>
                </div>
                <div class="form-group mt-4 d-grid gap-2 col-6 mx-auto text-center">
                    <button type="submit" class="btn btn-outline-secondary" name="login">
                        <i class="bi bi-floppy"></i> Kaydet
                    </button>
                </div>
            </form>
        </div>

    </div>
</div>
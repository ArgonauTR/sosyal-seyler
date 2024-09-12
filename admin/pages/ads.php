<div class="col-12 col-lg-9">
    <div class="card">
        <div class="card-header">
            <i class="bi bi-badge-ad me-1"></i> Reklamlar
        </div>
        <div class="card-body">
            <form method="POST" action="<?php echo $site_name . "/admin/functions/ad-update.php"; ?>">

                <div class="mb-3 row">
                    <label class="col-sm-3 col-form-label">Header Altı</label>
                    <div class="col-sm-9">
                        <textarea class="form-control" name="ad_head"><?php echo adinfo("ad_head") ?></textarea>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label class="col-sm-3 col-form-label">Yorum Üstü</label>
                    <div class="col-sm-9">
                        <textarea class="form-control" name="ad_post_page"><?php echo adinfo("ad_post_page") ?></textarea>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label class="col-sm-3 col-form-label">Footer Üstü</label>
                    <div class="col-sm-9">
                        <textarea class="form-control" name="ad_footer"><?php echo adinfo("ad_footer") ?></textarea>
                    </div>
                </div>


                <div class="form-group mt-4 d-grid gap-2 col-6 mx-auto text-center">
                    <button type="submit" class="btn btn-outline-secondary" name="ad_update">
                        <i class="bi bi-floppy"></i> Kaydet
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>
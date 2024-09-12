<div class="col-12 col-lg-9">
    <div class="card">
        <div class="card-header">
            <i class="bi bi-gear me-1"></i> Ayarlar
        </div>
        <div class="card-body">
            <form method="POST" action="<?php echo $site_name . "/admin/functions/option-update.php"; ?>">

                <div class="mb-3 row">
                    <label class="col-sm-3 col-form-label">Site Başlığı</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="option_site_title" value="<?php echo optioninfo("option_site_title") ?>" required>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label class="col-sm-3 col-form-label">Site Açıklaması</label>
                    <div class="col-sm-9">
                        <textarea class="form-control" name="option_site_description"><?php echo optioninfo("option_site_description") ?></textarea>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label class="col-sm-3 col-form-label">Favicon Linki</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="option_favicon_link" value="<?php echo optioninfo("option_favicon_link") ?>" required>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label class="col-sm-3 col-form-label">Gündüz Logosu Linki</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="option_light_logo_link" value="<?php echo optioninfo("option_light_logo_link") ?>" required>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label class="col-sm-3 col-form-label">Gece Logosu Linki</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="option_dark_logo_link" value="<?php echo optioninfo("option_dark_logo_link") ?>" required>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label class="col-sm-3 col-form-label">Site Kimlik Yazısı</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="option_footer_text" value="<?php echo optioninfo("option_footer_text") ?>" required>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label class="col-sm-3 col-form-label">Varsayılan Tema</label>
                    <div class="col-sm-9">
                        <select class="form-select" name="option_default_theme">
                            <?php
                            $theme = optioninfo("option_default_theme");
                            if ($theme == "dark") {
                                echo '<option value="dark" selected>Karanlık Tema</option>';
                                echo '<option value="light">Aydnlık Tema</option>';
                            } else {
                                echo '<option value="dark">Karanlık Tema</option>';
                                echo '<option value="light" selected>Aydnlık Tema</option>';
                            }
                            ?>
                        </select>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label class="col-sm-3 col-form-label">Google Analitics Kodu</label>
                    <div class="col-sm-9">
                        <textarea class="form-control" name="option_analitics_code"><?php echo optioninfo("option_analitics_code") ?></textarea>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label class="col-sm-3 col-form-label">Google SearchConsole Kodu</label>
                    <div class="col-sm-9">
                        <textarea class="form-control" name="option_search_console_theme"><?php echo optioninfo("option_search_console_theme") ?></textarea>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label class="col-sm-3 col-form-label">Google Adsense Kodu</label>
                    <div class="col-sm-9">
                        <textarea class="form-control" name="option_adsense_code"><?php echo optioninfo("option_adsense_code") ?></textarea>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label class="col-sm-3 col-form-label">Sabit Konu ID</label>
                    <div class="col-sm-9">
                        <input type="number" class="form-control" name="option_fixed_top" value="<?php echo optioninfo("option_fixed_top") ?>">
                    </div>
                </div>

                <div class="form-group mt-4 d-grid gap-2 col-6 mx-auto text-center">
                    <button type="submit" class="btn btn-outline-secondary" name="options_update">
                        <i class="bi bi-floppy"></i> Kaydet
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>
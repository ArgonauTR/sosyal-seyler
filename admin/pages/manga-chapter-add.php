<div class="col-lg-9">
    <div class="card bg-dark text-white">
        <div class="card-body">
            <div class="card-header">
                <i class="bi bi-cloud-arrow-up me-1"></i>
                BÖLÜM YÜKLE
            </div>
            <div class="card-body">
                <form action="./functions/chapter-add.php" method="POST" enctype="multipart/form-data">

                    <div class="mb-3">
                        <input type="text" class="form-control bg-dark text-white" name="chapter_manga_id" value="<?php echo $_GET["manga_id"] ?>" placeholder="Manga ID" hidden>
                    </div>

                    <div class="mb-3">
                        <input type="text" class="form-control bg-dark text-white" name="chapter_name" placeholder="Bölüm Adını Giriniz" required>
                    </div>

                    <div class="mb-3">
                        <input type="number" class="form-control bg-dark text-white" name="chapter_num" placeholder="Bölüm Numarasını Giriniz" required>
                    </div>

                    <div class="mb-3">
                        <textarea class="form-control bg-dark text-white" rows="2" name="chapter_description" placeholder="SEO için açıklama giriniz"></textarea>
                    </div>

                    <div class="mb-3">
                        <select class="form-select bg-dark text-white" name="chapter_status">
                            <option value="draft">Taslak</option>
                            <option value="publish">Yayın</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <input class="form-control bg-dark text-white" type="file" name="resim[]" multiple="multiple" required>
                    </div>

                    <div class="mb-3 text-center">
                        <button type="submit" class="btn btn-primary" name="chapter_add">Kaydet & Yayınla</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
<div class="col-lg-9">
    <div class="card bg-dark text-white">
        <div class="card-body">
            <div class="card-header">
                <i class="bi bi-grid me-1"></i>
                KATEGORİ EKLE
            </div>
            <div class="card-body">
                <form action="./functions/category-add.php" method="POST" enctype="multipart/form-data">

                    <div class="mb-3">
                        <input type="text" class="form-control bg-dark text-white" name="category_title" placeholder="Başlığınızı Buraya Giriniz" required>
                    </div>

                    <div class="mb-3">
                        <textarea class="form-control bg-dark text-white" rows="2" name="category_description" placeholder="Kısa Açıklama Giriniz" required></textarea>
                        <div class="form-text">SEO ve Sayfa Açıklaması İçin Önemli</div>
                    </div>

                    <div class="mb-3">
                        <select class="form-select bg-dark text-white" name="category_color">
                            <option class="text-primary" value="primary">Mavi</option>
                            <option class="text-secondary" value="primary">Gri</option>
                            <option class="text-success" value="success">Yeşil</option>
                            <option class="text-danger" value="danger">Kırmızı</option>
                            <option class="text-warning" value="warning">Sarı</option>
                            <option class="text-info" value="info">Turkuaz</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <select class="form-select bg-dark text-white" name="category_status">
                            <option class="text-primary" value="blog">Blog</option>
                            <option class="text-secondary" value="manga">Manga</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <input class="form-control bg-dark text-white" type="file" name="resim" required>
                    </div>

                    <div class="mb-3 text-center">
                        <button type="submit" class="btn btn-primary" name="category_add">Kaydet & Yayınla</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
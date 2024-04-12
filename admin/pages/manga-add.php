<div class="col-lg-9">
    <div class="card bg-dark text-white">
        <div class="card-body">
            <div class="card-header">
                <i class="bi bi-pencil-square me-1"></i>
                MANGA EKLE
            </div>
            <div class="card-body">
                <form action="./functions/manga-add.php" method="POST" enctype="multipart/form-data">

                    <div class="mb-3">
                        <input class="form-control bg-dark text-white" type="file" name="resim" required>
                    </div>

                    <div class="mb-3">
                        <input type="text" class="form-control bg-dark text-white" name="manga_name" placeholder="Adını Giriniz" required>
                    </div>

                    <div class="mb-3">
                        <input type="text" class="form-control bg-dark text-white" name="manga_other_name" placeholder="Diğer Adlarını Girin">
                    </div>

                    <div class="mb-3">
                        <input type="number" class="form-control bg-dark text-white" name="manga_year" placeholder="Yayın yılını giriniz">
                    </div>

                    <div class="mb-3">
                        <input type="text" class="form-control bg-dark text-white" name="manga_country" placeholder="Menşei Ülke Giriniz">
                    </div>

                    <div class="mb-3">
                        <input type="text" class="form-control bg-dark text-white" name="manga_fansub" placeholder="Fansub Giriniz">
                    </div>

                    <div class="mb-3">
                        <input type="text" class="form-control bg-dark text-white" name="manga_fansub_link" placeholder="Fansub Linkini Giriniz">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Yayın Durumu</label>
                        <select class="form-select bg-dark text-white" name="manga_publish_status">
                            <option value="completed">Tamamlandı</option>
                            <option value="continues">Devam Ediyor</option>
                            <option value="vacation">Ara Verildi</option>
                            <option value="abandoned">Bırakıldı</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Çevri Durumu</label>
                        <select class="form-select bg-dark text-white" name="manga_translate_status">
                            <option value="completed">Tamamlandı</option>
                            <option value="continues">Devam Ediyor</option>
                            <option value="vacation">Ara Verildi</option>
                            <option value="abandoned">Bırakıldı</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Yetişkin İçerik Uyarısı Verilsin mi?</label>
                        <select class="form-select bg-dark text-white" name="manga_adult_warning">
                            <option value="yes">Evet</option>
                            <option value="no">Hayır</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Kategori Seçin</label>
                        <select class="form-select bg-dark text-white" name="manga_category_id">
                            <?php

                            $categoryask = $db->prepare("SELECT * FROM categories WHERE category_status='manga' ORDER BY category_title  ASC");
                            $categoryask->execute(array());
                            while ($categoryfetch = $categoryask->fetch(PDO::FETCH_ASSOC)) {
                            ?>
                                <option value="<?php echo $categoryfetch["category_id"]; ?>"><?php echo $categoryfetch["category_title"]; ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Türünü seçini</label>
                        <select class="form-select bg-dark text-white" name="manga_type">
                            <option value="manga">Manga</option>
                            <option value="webtoon">Webtoon</option>
                            <option value="novel">Novel</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Yayınlansın mı?</label>
                        <select class="form-select bg-dark text-white" name="manga_status">
                            <option value="draft">Taslak</option>
                            <option value="publish">Yayın</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <input type="text" class="form-control bg-dark text-white" name="manga_author" placeholder="Yazarın Adını giriniz">
                    </div>

                    <div class="mb-3">
                        <input type="text" class="form-control bg-dark text-white" name="manga_artist" placeholder="Çizerin Adını giriniz">
                    </div>

                    <div class="mb-3">
                        <textarea class="form-control bg-dark text-white" rows="2" name="manga_description" placeholder="SEO için açıklama giriniz"></textarea>
                    </div>

                    <div class="mb-3">
                        <textarea class="form-control" rows="7" id="editor" name="manga_content" placeholder="Konusunu giriniz"></textarea>
                    </div>

                    <div class="mb-3 text-center">
                        <button type="submit" class="btn btn-primary" name="manga_add">Kaydet & Yayınla</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
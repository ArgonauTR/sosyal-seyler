<div class="col-lg-9">
    <div class="card bg-dark text-white">
        <div class="card-body">
            <div class="card-header">
                <i class="bi bi-pencil-square me-1"></i>
                İÇERİK EKLE
            </div>
            <div class="card-body">
                <form action="./functions/post-add.php" method="POST" enctype="multipart/form-data">

                <div class="mb-3">
                        <input class="form-control bg-dark text-white" type="file" name="resim">
                    </div>

                    <div class="mb-3">
                        <input type="text" class="form-control bg-dark text-white" name="post_title" placeholder="Başlığınızı Buraya Giriniz" required>
                    </div>

                    <div class="mb-3">
                        <select class="form-select bg-dark text-white" name="post_category_id">
                            <?php

                            $categoryask = $db->prepare("SELECT * FROM categories ORDER BY category_title  ASC");
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
                        <textarea class="form-control bg-dark text-white" rows="2" name="post_description" placeholder="Kısa Açıklama Giriniz"></textarea>
                        <div class="form-text">Başlğın altında görünecek bir özet girin.</div>
                    </div>

                    <div class="mb-3">
                        <textarea class="form-control" rows="7" id="editor" name="post_content" placeholder="Yazı İçeriğini Buraya Giriniz"></textarea>
                    </div>

                    <div class="mb-3 text-center">
                        <button type="submit" class="btn btn-primary" name="post_add">Kaydet & Yayınla</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
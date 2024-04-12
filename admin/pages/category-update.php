<div class="col-lg-9">
    <div class="card bg-dark text-white">
        <div class="card-body">
            <div class="card-header">
                <i class="bi bi-arrow-clockwise me-1"></i>
                KATEGORİ GÜNCELLE
            </div>
            <div class="card-body">
                <?php
                $category_id = $_GET["category_id"];
                $categoryask = $db->prepare("SELECT * FROM categories WHERE category_id=:id");
                $categoryask->execute(array('id' => $category_id));
                while ($categoryfetch = $categoryask->fetch(PDO::FETCH_ASSOC)) {
                    $category_id = $categoryfetch["category_id"];
                    $category_title = $categoryfetch["category_title"];
                    $category_link = $categoryfetch["category_link"];
                    $category_description = $categoryfetch["category_description"];
                    $category_color = $categoryfetch["category_color"];
                    $category_image_id = $categoryfetch["category_image_id"];
                    $category_status = $categoryfetch["category_status"];

                    //Resim Yolunu Çekiyor
                    $post_thumbnail_id = $categoryfetch["category_image_id"];
                    $imageask = $db->prepare("SELECT * FROM images WHERE image_id=:id");
                    $imageask->execute(array('id' => $post_thumbnail_id));
                    while ($imagefetch = $imageask->fetch(PDO::FETCH_ASSOC)) {
                        $image_link = $imagefetch["image_link"];
                    }
                }
                ?>
                <form action="./functions/category-update.php" method="POST" enctype="multipart/form-data">

                    <div class="mb-3 d-flex justify-content-center">
                        <a href="<?php echo $image_link; ?>" target="_blank"><img style="height: 100px;" src="<?php echo $image_link; ?>" /></a>
                    </div>

                    <div class="mb-3">
                        <input type="text" class="form-control bg-dark text-white" name="category_id" value="<?php echo $category_id; ?>" hidden>
                    </div>

                    <div class="mb-3">
                        <input type="text" class="form-control bg-dark text-white" name="category_title" value="<?php echo $category_title; ?>" required>
                    </div>

                    <div class="mb-3">
                        <textarea class="form-control bg-dark text-white" rows="2" name="category_description" required><?php echo $category_description; ?></textarea>
                        <div class="form-text">SEO ve Sayfa Açıklaması İçin Önemli</div>
                    </div>

                    <div class="mb-3">
                        <select class="form-select bg-dark text-white" name="category_color">
                            <option class="text-primary" value="primary" <?php if ($category_color == "primary") {
                                                                                echo "selected";
                                                                            } ?>>Mavi</option>
                            <option class="text-success" value="success" <?php if ($category_color == "success") {
                                                                                echo "selected";
                                                                            } ?>>Yeşil</option>
                            <option class="text-danger" value="danger" <?php if ($category_color == "danger") {
                                                                            echo "selected";
                                                                        } ?>>Kırmızı</option>
                            <option class="text-warning" value="warning" <?php if ($category_color == "warning") {
                                                                                echo "selected";
                                                                            } ?>>Sarı</option>
                            <option class="text-info" value="info" <?php if ($category_color == "info") {
                                                                        echo "selected";
                                                                    } ?>>Turkuaz</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <select class="form-select bg-dark text-white" name="category_status">
                            <?php
                            if ($category_status == "blog") {
                                echo '<option value="blog" selected>Blog</option>';
                                echo '<option value="manga">Manga</option>';
                            } else {
                                echo '<option value="blog">Blog</option>';
                                echo '<option value="manga" selected>Manga</option>';
                            }
                            ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <input type="text" class="form-control bg-dark text-white" name="category_image_id" value="<?php echo $category_image_id; ?>" hidden>
                    </div>

                    <div class="mb-3">
                        <input class="form-control bg-dark text-white" type="file" name="resim">
                    </div>

                    <div class="mb-3 text-center">
                        <button type="submit" class="btn btn-primary" name="category_update">Kaydet & Güncelle</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
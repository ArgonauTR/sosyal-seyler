<div class="col-lg-9">
    <div class="card bg-dark text-white">
        <div class="card-body">
            <div class="card-header">
                <i class="bi bi-arrow-clockwise me-1"></i>
                İÇERİK GÜNCELLE
            </div>
            <div class="card-body">
                <?php
                $post_id = $_GET["post_id"];

                $postask = $db->prepare("SELECT * FROM posts WHERE post_id=:id");
                $postask->execute(array('id' => $post_id));
                while ($postfetch = $postask->fetch(PDO::FETCH_ASSOC)) {

                    //Kategori id'değişkene aktarılıyor
                    $post_category_id =  $postfetch["post_category_id"];

                    //Yazar Adını Çekiyor.
                    $post_author_id = $postfetch["post_author_id"];
                    $userask = $db->prepare("SELECT * FROM users WHERE user_id=:id");
                    $userask->execute(array('id' => $post_author_id));
                    while ($userfetch = $userask->fetch(PDO::FETCH_ASSOC)) {
                        $usernick = $userfetch["user_nick"];
                    }
                    //Resim Yolunu Çekiyor
                    $post_thumbnail_id = $postfetch["post_thumbnail_id"];
                    $imageask = $db->prepare("SELECT * FROM images WHERE image_id=:id");
                    $imageask->execute(array('id' => $post_thumbnail_id));
                    while ($imagefetch = $imageask->fetch(PDO::FETCH_ASSOC)) {
                        $image_id = $imagefetch["image_id"];
                        $image_title = $imagefetch["image_title"];
                        $image_link = $imagefetch["image_link"];
                    }

                    $post_id = $postfetch["post_id"];
                    $post_wievs = $postfetch["post_wievs"];
                    $post_title = $postfetch["post_title"];
                    $post_description = $postfetch["post_description"];
                    $post_content = $postfetch["post_content"];
                    $post_link = $postfetch["post_link"];
                }
                ?>
                <form action="./functions/post-update.php" method="POST" enctype="multipart/form-data">

                    <?PHP if (!is_null($post_thumbnail_id)) { ?>
                    <div class="mb-3 d-flex justify-content-center">
                        <a href="<?php echo $image_link; ?>" target="_blank"><img style="height: 150px;" src="<?php echo $image_link; ?>" /></a>
                    </div>
                    <?PHP } ?>

                    <div class="mb-3">
                        <input class="form-control bg-dark text-white" type="file" name="resim">
                    </div>

                    <div class="mb-3">
                        <input type="text" class="form-control bg-dark text-white" name="image_id" value="<?php echo $image_id; ?>" hidden>
                    </div>

                    <div class="mb-3">
                        <input type="text" class="form-control bg-dark text-white" name="post_id" value="<?php echo $post_id; ?>" hidden>
                    </div>

                    <div class="mb-3">
                        <input type="text" class="form-control bg-dark text-white" name="post_title" value="<?php echo $post_title; ?>" required>
                    </div>

                    <div class="mb-3">
                        <select class="form-select bg-dark text-white" name="post_category_id">
                            <?php
                            $categoryask = $db->prepare("SELECT * FROM categories ORDER BY category_title  ASC");
                            $categoryask->execute(array());
                            while ($categoryfetch = $categoryask->fetch(PDO::FETCH_ASSOC)) {
                                $category_id = $categoryfetch["category_id"];
                                if ($category_id == $post_category_id) {
                                    echo '<option value="' . $categoryfetch["category_id"] . '" selected>' . $categoryfetch["category_title"] . '</option>';
                                } else {
                                    echo '<option value="' . $categoryfetch["category_id"] . '">' . $categoryfetch["category_title"] . '</option>';
                                }
                            }
                            ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <textarea class="form-control bg-dark text-white" rows="2" name="post_description"><?php echo $post_description; ?></textarea>
                        <div class="form-text">Başlğın altında görünecek bir özet girin.</div>
                    </div>

                    <div class="mb-3">
                        <textarea class="form-control" rows="7" id="editor" name="post_content"><?php echo $post_content; ?></textarea>
                    </div>

                    <div class="mb-3 text-center">
                        <button type="submit" class="btn btn-primary" name="post_update">Kaydet & Güncelle</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
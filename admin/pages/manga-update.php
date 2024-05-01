<?php
// Post işlemleri yaplıyor.
$manga_id = $_GET["manga_id"];

$mangaask = $db->prepare("SELECT * FROM mangas WHERE manga_id=:id");
$mangaask->execute(array('id' => $manga_id));
while ($mangafetch = $mangaask->fetch(PDO::FETCH_ASSOC)) {

    //Yazar Adını Çekiyor.
    $manga_upload_user_id = $mangafetch["manga_upload_user_id"];
    $userask = $db->prepare("SELECT * FROM users WHERE user_id=:id");
    $userask->execute(array('id' => $manga_upload_user_id));
    while ($userfetch = $userask->fetch(PDO::FETCH_ASSOC)) {
        $usernick = $userfetch["user_nick"];
    }
    //Kategori Adını Çekiyor
    $manga_category_id = $mangafetch["manga_category_id"];
    $categoryask = $db->prepare("SELECT * FROM categories WHERE category_id=:id");
    $categoryask->execute(array('id' => $manga_category_id));
    while ($categoryfetch = $categoryask->fetch(PDO::FETCH_ASSOC)) {
        $category_name = $categoryfetch["category_title"];
    }
    //Resim Yolunu Çekiyor
    $manga_image_id = $mangafetch["manga_image_id"];
    $imageask = $db->prepare("SELECT * FROM images WHERE image_id=:id");
    $imageask->execute(array('id' => $manga_image_id));
    while ($imagefetch = $imageask->fetch(PDO::FETCH_ASSOC)) {
        $image_id = $imagefetch["image_id"];
        $image_title = $imagefetch["image_title"];
        $image_link = $imagefetch["image_link"];
    }

    $manga_name = $mangafetch["manga_name"];
    $manga_other_name = $mangafetch["manga_other_name"];
    $manga_author = $mangafetch["manga_author"];
    $manga_artist = $mangafetch["manga_artist"];
    $manga_content = $mangafetch["manga_content"];
    $manga_year = $mangafetch["manga_year"];
    $manga_description = $mangafetch["manga_description"];
    $manga_country = $mangafetch["manga_country"];
    $manga_publish_status = $mangafetch["manga_publish_status"];
    $manga_translate_status = $mangafetch["manga_translate_status"];
    $manga_adult_warning = $mangafetch["manga_adult_warning"];
    $manga_type = $mangafetch["manga_type"];
    $manga_status= $mangafetch["manga_status"];
}

?>

<div class="col-lg-9">
    <div class="card bg-dark text-white">
        <div class="card-body">
            <div class="card-header">
                <i class="bi bi-pencil-square me-1"></i>
                MANGA EKLE
            </div>
            <div class="card-body">
                <form action="./functions/manga-update.php" method="POST" enctype="multipart/form-data">

                <div class="mb-3 d-flex justify-content-center">
                        <a href="<?php echo $image_link; ?>" target="_blank"><img style="height: 150px;" src="<?php echo $image_link; ?>" /></a>
                    </div>

                    <div class="mb-3">
                        <input class="form-control bg-dark text-white" type="file" name="resim">
                    </div>

                    <div class="mb-3">
                        <input type="text" class="form-control bg-dark text-white" name="image_id" value="<?php echo $image_id; ?>" hidden>
                    </div>

                    <div class="mb-3">
                        <input type="text" class="form-control bg-dark text-white" name="manga_id" value="<?php echo $manga_id; ?>" hidden>
                    </div>

                    <div class="mb-3">
                        <input type="text" class="form-control bg-dark text-white" name="manga_name" value="<?php echo $manga_name ?>" placeholder="Adını Giriniz" required>
                    </div>

                    <div class="mb-3">
                        <input type="text" class="form-control bg-dark text-white" name="manga_other_name" value="<?php echo $manga_other_name ?>" placeholder="Diğer Adlarını Girin">
                    </div>

                    <div class="mb-3">
                        <input type="number" class="form-control bg-dark text-white" name="manga_year" value="<?php echo $manga_year ?>" placeholder="Yayın yılını giriniz">
                    </div>

                    <div class="mb-3">
                        <input type="text" class="form-control bg-dark text-white" name="manga_country" value="<?php echo $manga_country ?>" placeholder="Menşei Ülke Giriniz">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Yayın Durumu</label>
                        <select class="form-select bg-dark text-white" name="manga_publish_status">
                            <option <?php if($manga_publish_status == "completed"){echo "selected";} ?> value="completed">Tamamlandı</option>
                            <option <?php if($manga_publish_status == "continues"){echo "selected";} ?>  value="continues">Devam Ediyor</option>
                            <optio <?php if($manga_publish_status == "vacation"){echo "selected";} ?> n value="vacation">Ara Verildi</option>
                            <option <?php if($manga_publish_status == "abandoned"){echo "selected";} ?>  value="abandoned">Bırakıldı</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Çevri Durumu</label>
                        <select class="form-select bg-dark text-white" name="manga_translate_status">
                            <option <?php if($manga_translate_status == "completed"){echo "selected";} ?> value="completed">Tamamlandı</option>
                            <option <?php if($manga_translate_status == "continues"){echo "selected";} ?> value="continues">Devam Ediyor</option>
                            <option <?php if($manga_translate_status == "vacation"){echo "selected";} ?> value="vacation">Ara Verildi</option>
                            <option <?php if($manga_translate_status == "abandoned"){echo "selected";} ?> value="abandoned">Bırakıldı</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Yetişkin İçerik Uyarısı Verilsin mi?</label>
                        <select class="form-select bg-dark text-white" name="manga_adult_warning">
                            <option <?php if($manga_adult_warning == "yes"){echo "selected";} ?> value="yes">Evet</option>
                            <option <?php if($manga_adult_warning == "no"){echo "selected";} ?> value="no">Hayır</option>
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
                            <option <?php if($manga_type == "manga"){echo "selected";} ?> value="manga">Manga</option>
                            <option <?php if($manga_type == "webtoon"){echo "selected";} ?> value="webtoon">Webtoon</option>
                            <option <?php if($manga_type == "novel"){echo "selected";} ?> value="novel">Novel</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Yayınlansın mı?</label>
                        <select class="form-select bg-dark text-white" name="manga_status">
                            <option <?php if($manga_status == "draft"){echo "selected";} ?> value="draft">Taslak</option>
                            <option <?php if($manga_status == "publish"){echo "selected";} ?> value="publish">Yayın</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <input type="text" class="form-control bg-dark text-white" name="manga_author" value="<?php echo $manga_author ?>" placeholder="Yazarın Adını giriniz">
                    </div>

                    <div class="mb-3">
                        <input type="text" class="form-control bg-dark text-white" name="manga_artist" value="<?php echo $manga_artist ?>" placeholder="Çizerin Adını giriniz">
                    </div>

                    <div class="mb-3">
                        <textarea class="form-control bg-dark text-white" rows="2" name="manga_description" placeholder="SEO için açıklama giriniz"><?php echo $manga_description ?></textarea>
                    </div>

                    <div class="mb-3">
                        <textarea class="form-control" rows="7" id="editor" name="manga_content" placeholder="Konusunu giriniz"><?php echo $manga_content ?></textarea>
                    </div>

                    <div class="mb-3 text-center">
                        <button type="submit" class="btn btn-primary" name="manga_update">Kaydet & Yayınla</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
<?php
// Bu sayfanın bitmesi için hala birkaç ayar gerekmektededir.
// Gelecek Sürümlerde eksikleri giderilecek.
?>


<style>
    .btn-none {
        border: none;
        font-size: 24px;
    }

    #container {
        width: 1000px;
        margin: 20px auto;
    }

    .ck-editor__editable[role="textbox"] {
        /* editing area */
        min-height: 200px;
        color: black;
    }

    .ck-content .image {
        /* block images */
        max-width: 80%;
        margin: 20px auto;
    }
</style>


<body class="bg-dark text-white">
    <div class="container">
        <div class="row justify-content-center mt-5 mb-5">
            <?php
            if (@$_GET["status"]) {
                if ($_GET["status"] == "ok") {
                    echo '<div class="alert alert-success" role="alert">Teşekkür ederiz. Konrol edildikten sonra yayınlanacaktır.</div>';
                } else {
                    echo '<div class="alert alert-danger" role="alert">Bir hata oluştu. Tekrar deneyin, hata devam edirse sistem yetkililerine haber veirn. .</div>';
                }
            }

            ?>
            <div class="col-lg-8 col-sm-12">
                <div class="bg-dark text-white">
                    <div class="text-center">
                        <hr>
                        <h5><i class="bi bi-pencil-square me-1"></i>İÇERİK EKLE</h5>
                        <hr>
                    </div>
                    <form action="./admin/functions/post-add.php" method="POST" enctype="multipart/form-data">

                        <div class="mb-3">
                            <input type="text" class="form-control bg-dark text-white" name="post_fronend_author" value="yes" hidden>
                        </div>

                        <label class="form-label">
                            Kapak Resmi Ekle
                        </label>

                        <div class="mb-3">
                            <input class="form-control bg-dark text-white" type="file" name="resim" required>
                        </div>

                        <label class="form-label">
                            İçerik Başlığı Ekle
                        </label>
                        <div class="mb-3">
                            <input type="text" class="form-control bg-dark text-white" name="post_title" placeholder="Başlığınızı Buraya Giriniz" required>
                        </div>

                        <label class="form-label">
                            Kategori Seç
                        </label>
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

                        <label class="form-label">
                            SEO Açıklaması Gir
                        </label>
                        <div class="mb-3">
                            <textarea class="form-control bg-dark text-white" rows="2" name="post_description" placeholder="Kısa Açıklama Giriniz"></textarea>
                            <div class="form-text">Başlğın altında görünecek bir özet girin.</div>
                        </div>

                        <label class="form-label">
                            İçeriği Oluştur
                        </label>
                        <div class="mb-3">
                            <textarea class="form-control" rows="7" id="editor" name="post_content" placeholder="Yazı İçeriğini Buraya Giriniz"></textarea>
                        </div>

                        <div class="mb-3 text-center">
                            <button type="submit" class="btn btn-primary" name="post_add">Kaydet & Yayınla</button>
                        </div>

                    </form>
                </div>
            </div>



            <div class="col-lg-4 col-sm-12">
                <div class="card bg-dark border-white text-white">
                    <div class="card-header text-center">
                        <h5><i class="bi bi-ui-checks me-1"></i>
                            SEO İçerik Oluşturma Klavuzu</h5>
                    </div>
                    <div class="card-body">
                        <b>Anahtar Kelime Araştırması:</b> İçeriğinizi oluşturmadan önce hedef kitlenizin kullanabileceği anahtar kelimeleri araştırın.
                        </br>
                        <b>Doğal Kullanım:</b> Anahtar kelimeleri içeriğe doğal bir şekilde yerleştirin. Zorlama ve anlamsız kullanımdan kaçının.
                        </br>
                        <b>Benzersiz İçerik:</b> Kendi özgün ve benzersiz içeriğinizi oluşturun. Kopya içerikten kaçının, çünkü bu SEO performansınızı olumsuz etkileyebilir.
                        </br>
                        <b>Başlık Optimize Edin:</b> Başlık, içeriğinizi tarif etmeli ve anahtar kelimeyi içermelidir. Başlığı kısa, etkileyici ve ilgi çekici hale getirin.
                        </br>
                        <b>Meta Açıklamaları:</b> Her sayfa için meta açıklamalarını optimize edin. Meta açıklama, içeriğin özünü özetleyen ve arama sonuçlarında gösterilen metindir.
                        </br>
                        <b>Bağlantılar:</b> İçeriğinizde diğer sayfalara veya kaynaklara yönlendiren iç bağlantılar ekleyin. Ayrıca, diğer sitelerden gelen dış bağlantıları çekici hale getirin.
                        </br>
                        <b>Görsel Optimize Edin:</b> Görsellerinizi optimize edin ve dosya adlarında, başlık etiketlerinde ve alternatif metinlerde anahtar kelimeleri kullanın.
                        </br>
                        <b>Mobil Uyumlu İçerik:</b> İçeriğinizin mobil cihazlarda iyi görüntülendiğinden emin olun. Mobil uyumlu olmayan içerik, SEO performansınızı olumsuz etkileyebilir.
                        </br>
                        <b>Hızlı Yükleme Süresi</b> Sayfa yükleme süresini optimize edin. Hızlı yükleme süresi, hem kullanıcı deneyimini hem de arama motoru sıralamalarını etkileyebilir.
                        </br>
                        <b>Sosyal Medya Paylaşımı:</b> İçeriğinizin sosyal medyada paylaşılabilir olmasını sağlayın. Paylaşılabilir içerik, daha fazla trafik ve geri dönüşüm sağlayabilir.
                        </br>
                        <b>Analiz ve İyileştirme:</b> SEO performansınızı düzenli olarak analiz edin ve gerektiğinde içeriğinizi güncelleyin veya iyileştirin.
                    </div>
                </div>
            </div>
        </div>



        <script src="https://cdn.ckeditor.com/ckeditor5/40.2.0/classic/ckeditor.js"></script>

        <script>
            ClassicEditor
                .create(document.querySelector('#editor'), {
                    ckfinder: {
                        uploadUrl: './admin/functions/image-upload.php'
                    }
                })
                .then(editor => {
                    console.log(editor);
                })
                .catch(error => {
                    console.error(error);
                });
        </script>
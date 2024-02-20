<body class=" bg-dark text-white">
    <div class="d-flex justify-content-center mt-5 mb-5">

        <div class="col-12 col-lg-6 p-3">
            <?php
            if (isset($_GET["status"])) {
                if ($_GET["status"] == "ok") {
                    echo '<div class="alert alert-success" role="alert">
                        Teşekkürler. Mesajınız Bize Ulaştı.
                    </div>';
                } else {
                    echo '<div class="alert alert-danger" role="alert">
                        Bir Hata İle Karşılaştık. Lütfen Daha Sonra Tekrar Deneyiniz.
                    </div>';
                }
            }
            ?>
            <form action="./functions/message.php" method="POST">
                <div class="mb-3 h2 text-center">İLETİŞİM FORMU</div>

                <div class="mb-3">
                    <label class="form-label">Adınız Nedir?</label>
                    <input type="text" class="form-control bg-dark text-white border-primary" name="message_author_name" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">E-Posta adresiniz Nedir?</label>
                    <input type="email" class="form-control bg-dark text-white border-primary" name="message_author_mail" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Konu Bağlığı Nedir?</label>
                    <input type="text" class="form-control bg-dark text-white border-primary" name="message_title" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Mesajnız Nedir?</label>
                    <textarea class="form-control bg-dark text-white border-primary" rows="5" name="message_content" required></textarea>
                </div>

                <div class="form-group mt-4 d-grid gap-2 col-6 mx-auto text-center">
                    <button type="submit" class="btn btn-primary text-white border-primary" name="message_send">
                        <i class="bi bi-send me-1"></i>
                        Mesajı Gönder
                    </button>
                </div>
            </form>
        </div>
    </div>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
<body class=" bg-dark text-white">
    <div class="d-flex justify-content-center mt-5 mb-5">
        <div class="col-12 col-lg-6 p-3">

            <div class="border-bottom mt-4 position-relative">
                <span class="position-absolute top-0 start-50 translate-middle badge rounded-pill bg-dark ps-4 pe-4 pt-2 pb-2">
                    <div class="h3 text-white">Yeni Şifre Oluşturma</div>
                </span>
            </div>

            <?php

            $user_id = htmlspecialchars(strip_tags($_GET["user_id"]));
            $user_pass_reset_get = htmlspecialchars(strip_tags($_GET["user_pass_reset"]));
            @$status = htmlspecialchars(strip_tags($_GET["status"]));

            // Üye ID si ile user_pass_reset alınıyor.
            $userask = $db->prepare("SELECT * FROM users WHERE user_id=:id");
            $userask->execute(array('id' => $user_id));
            while ($userfetch = $userask->fetch(PDO::FETCH_ASSOC)) {
                $user_pass_reset_db = $userfetch["user_pass_reset"];
            }

            // Şifre hane sayısı denetleniyor
            if ($status ==  "short-pass") {
                echo '<div class="alert alert-danger m-5" role="alert">Şifreniz 6 karakterden fazla olmalıdır.</div>';
                exit();
            }

            // Şifre hane sayısı denetleniyor
            if ($status ==  "error") {
                echo '<div class="alert alert-danger m-5" role="alert">Bilinmeyen bir hata ile karşılaştık, Yönetimle iletişime geçin veya bir süre sonra tekrar deneyin.</div>';
                exit();
            }

            // Anahtarın doluluğu test ediliyor.
            if ($user_pass_reset_db ==  NULL) {
                echo '<div class="alert alert-danger m-5" role="alert">Bu anahtar daha önce kullanılmış.</div>';
                exit();
            }

            // Anahtarlar karşılaştırılıyor
            if ($user_pass_reset_db !==  $user_pass_reset_get) {
                echo '<div class="alert alert-danger m-5" role="alert">Yanlış bir bağlantıya tıkladınız gibi görünüyor.</div>';
                exit();
            } else {
            ?>
                <form action="../functions/user-repass.php" method="POST">

                    <div class="mb-3 mt-4">
                        <input type="text" name="user_id" value="<?php echo $user_id ?>" class="form-control  bg-dark text-white border-primary" hidden>
                    </div>

                    <div class="mb-3 mt-4">
                        <label class="form-label">
                            <i class="bi bi-key-fill me-2"></i>
                            Yeni Şifrenizi Giriniz.
                        </label>
                        <input type="text" name="user_new_pass" class="form-control  bg-dark text-white border-primary" required>
                        <div class="form-text">6-12 karakter arasında olmalıdır.</div>
                    </div>

                    <div class="form-group mt-4 d-grid gap-2 col-6 mx-auto text-center">
                        <button type="submit" name="user_pass_reset" class="btn btn-primary text-white border-primary">
                            <i class="bi bi-arrow-repeat me-1"></i>
                            Şifreyi Sıfırla
                        </button>
                    </div>

                </form>

            <?php
            }
            ?>
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
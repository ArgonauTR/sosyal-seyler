<div class="d-flex justify-content-center mt-5 mb-5">
    <div class="col-12 col-lg-4">
        <?php

        // Giriş için hata denetim kodları bunlardır.
        if (@!empty($_GET["login-status"])) {
            $login_status = htmlspecialchars(strip_tags($_GET["login-status"]));

            switch ($login_status) {
                case "nick-failed":
                    echo '<div class="alert alert-danger" role="alert">Yanlış Bilgi Girdiniz.</div>';
                    break;
                case "pass-failed":
                    echo '<div class="alert alert-danger" role="alert">Yanlış Bilgi Girdiniz.</div>';
                    break;
            }
        }

        // Kayıt için hata denetim kodları bunlardır.
        if (@!empty($_GET["registry-status"])) {
            $registry_status = htmlspecialchars(strip_tags($_GET["registry-status"]));

            switch ($registry_status) {
                case "user-nick-count":
                    echo '<div class="alert alert-danger" role="alert">Kullanıcı Adı 4-15 karakter arasında olmalıdır</div>';
                    break;
                case "user-password-count":
                    echo '<div class="alert alert-danger" role="alert">Şifre 6-12 karakter arasında olmalıdır</div>';
                    break;
                case "user-nick-exist":
                    echo '<div class="alert alert-danger" role="alert">Bu Kullanıcı zaten alınmış</div>';
                    break;
                case "user-mail-exist":
                    echo '<div class="alert alert-danger" role="alert">Bu posta daha önce kullanılmış</div>';
                    break;
                case "user-unknow-fail":
                    echo '<div class="alert alert-danger" role="alert">Bilinmeyen bir hata oluştu. Bize Bildirin.</div>';
                    break;
            }
        }

        ?>
    </div>
</div>
<body class=" bg-dark text-white">
    <div class="container">
        <?php
        // Giriş yapılmışsa Profil sayfasına atıyor
        if (isset($_SESSION["user_id"])) {
            header('Location:profile');
            exit();
        }

        // Giriş Bildirimler burada oluşuyor.
        include 'user-notifications.php';

        // Giriş için sayfa belirleniyor.
        if (empty($_GET['user'])) {
            include 'user-login.php';
        } else {

            $user = htmlspecialchars(strip_tags($_GET['user']));

            switch ($user) {
                case "login":
                    include 'user-login.php';
                    break;
                case "registry":
                    include 'user-registry.php';
                    break;
                case "reset":
                    include 'user-password-reset.php';
                    break;
                case "confirm":
                    include 'user-confirm.php';
                    break;
                default:
                    include 'user-login.php';
            }
        }
        ?>
    </div>
    <div class="d-flex justify-content-center mt-5 mb-5">
        <div class="col-12 col-lg-4">
            <ul class="list-inline text-center">

                <li class="list-inline-item">
                    <a class="text-mode text-white" href="?user=login" style="text-decoration: none;">
                        <i class="bi bi-box-arrow-in-left me-1"></i>
                        Giriş
                    </a>
                </li>

                <li class="list-inline-item">
                    <a class="text-mode text-white" href="?user=registry" style="text-decoration: none;">
                        <i class="bi bi-pencil ms-3 me-1"></i>
                        Kayıt
                    </a>
                </li>

                <li class="list-inline-item">
                    <a class="text-mode text-white" href="?user=reset" style="text-decoration: none;">
                        <i class="bi bi-arrow-repeat ms-3 me-1"></i>
                        Şifremi Unuttum
                    </a>
                </li>

            </ul>
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
<body class=" bg-dark text-white">
    <div class="container">
    </div>
    <div class="d-flex justify-content-center mt-5 mb-5">
        <div class="col-12 col-lg-6">
            <ul class="nav justify-content-center nav-tabs mb-3">
                <li class="nav-item">
                    <a class="nav-link text-white" href="?profile=profile-profile"><i class="bi bi-person me-1"></i>Profil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="?profile=profile-posts"><i class="bi bi-pencil me-1"></i>Yazılar</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="?profile=profile-comments"><i class="bi bi-chat me-1"></i>Yorumlar</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="?profile=profile-options"><i class="bi bi-gear me-1"></i>Ayarlar</a>
                </li>
            </ul>
            <?php

            // Giriş yapılmamışsa Giriş sayfasına yönlendiriyor.
            if (empty($_SESSION["user_id"])) {
                header('Location:user');
                exit();
            }

            // Giriş için sayfa belirleniyor.
            if (empty($_GET['profile'])) {
                include 'profile-profile.php';
            } else {

                $profile = htmlspecialchars(strip_tags($_GET['profile']));

                switch ($profile) {
                    case "profile-profile":
                        include 'profile-profile.php';
                        break;
                    case "profile-posts":
                        include 'profile-posts.php';
                        break;
                    case "profile-comments":
                        include 'profile-comments.php';
                        break;
                    case "profile-options":
                        include 'profile-options.php';
                        break;
                    default:
                        include 'profile-profile.php';
                }
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
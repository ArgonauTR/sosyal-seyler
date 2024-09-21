<nav class="bg-body-tertiary mb-3">
    <div class="container">
        <div class="row pt-2 pb-2">
            <div class="col-3 d-flex justify-content-start align-items-center">
                <?php
                if (isset($_SESSION["user_theme"])) {
                    if ($_SESSION['user_theme'] == "dark") {
                        echo '<a href="/" title="Site Logosu"><img class="img-fluid" src="' . optioninfo("option_dark_logo_link") . '"></a>';
                    } else {
                        echo '<a href="/" title="Site Logosu"><img class="img-fluid" src="' . optioninfo("option_light_logo_link") . '"></a>';
                    }
                } else {
                    if (optioninfo("option_default_theme") == "dark") {
                        echo '<a href="/" title="Site Logosu"><img class="img-fluid" src="' . optioninfo("option_dark_logo_link") . '"></a>';
                    } else {
                        echo '<a href="/" title="Site Logosu"><img class="img-fluid" src="' . optioninfo("option_light_logo_link") . '"></a>';
                    }
                }
                ?>
            </div>
            <div class="col-lg-4 col-6 mx-auto">
                <form method="POST" action="<?php echo $site_name . "/search"; ?>" class="d-flex mx-auto" role="search">
                    <div class="input-group">
                        <input type="text" class="form-control" name="search_key" placeholder="Ara..">
                        <button class="btn btn-outline-secondary" type="submmit" name="search">
                            <i class="bi bi-search"></i>
                        </button>
                    </div>
                </form>
            </div>
            <div class="col-3 d-flex justify-content-end">
                <?php
                if (isset($_SESSION["user_nick"])) { // Bu kısım giriş varsa çalışacak. 
                ?>
                    <button class="btn me-2 dropdown-toggle bg-success" type="button" data-bs-toggle="dropdown" aria-expanded="false" title="Kullanıcı İşlemleri">
                        <i class="bi bi-person-circle"></i>
                    </button>
                    <ul class="dropdown-menu">
                        <?php if ($_SESSION["user_role"] == "admin") { ?><li><a class="dropdown-item" title="Profil" href="<?php echo $site_name . "/admin"; ?>"><i class="bi bi-shield"></i> Admin</a></li><?php } ?>
                        <li><a class="dropdown-item" title="Profil" href="<?php echo $_SESSION['user_url']; ?>"><i class="bi bi-person"></i> Profil</a></li>
                        <li><a class="dropdown-item" title="Yeni Konu" href="<?php echo $site_name . "/write"; ?>"><i class="bi bi-plus-circle"></i> Yeni Konu</a></li>
                        <?php
                        if ($_SESSION["user_theme"] == "dark") {
                            echo '<li><a class="dropdown-item" title="Aydınlık Mod" href="' . $site_name . '/functions/theme.php?theme=light"><i class="bi bi-brightness-high"></i> Aydınlık</a></li>';
                        } else {
                            echo '<li><a class="dropdown-item" title="Karanlık Mod" href="' . $site_name . '/functions/theme.php?theme=dark"><i class="bi bi-moon"></i> Karanlık</a></li>';
                        }
                        ?>
                        <li><a class="dropdown-item" title="Rastgele yazı" href="<?php echo $site_name . "/functions/random.php"; ?>"><i class="bi bi-shuffle"></i> Rastgele</a></li>
                        <li><a class="dropdown-item" title="Ayarlar" href="<?php echo $site_name . "/user-option"; ?>"><i class="bi bi-gear"></i> Ayarlar</a></li>
                        <li><a class="dropdown-item" title="Çıkış" href="<?php echo $site_name . "/functions/logout.php"; ?>"><i class="bi bi-power"></i> Çıkış</a></li>
                    </ul>
                <?php
                } else { // Bu kısım giriş yapılmamışsa çalışacak
                ?>
                    <button class="btn me-2 dropdown-toggle-none" type="button" data-bs-toggle="dropdown" aria-expanded="false" title="Kullanıcı İşlemleri">
                        <i class="bi bi-person-circle"></i>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" title="Giriş" href="<?php echo $site_name . "/login"; ?>"><i class="bi bi-box-arrow-in-right"></i> Giriş</a></li>
                        <li><a class="dropdown-item" title="Kayıt" href="<?php echo $site_name . "/registry"; ?>"><i class="bi bi-pencil"></i> Kayıt</a></li>
                    </ul>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
</nav>

<div class="d-flex justify-content-center">
    <?php
    if (isset($_GET["alert"])) {
        $alert_name = htmlspecialchars(strip_tags($_GET["alert"]));
        echo alert($alert_name);
    }
    ?>
</div>
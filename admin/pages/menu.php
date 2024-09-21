<ul class="navbar-nav ms-auto">
    <div class="text-center">
        <ul class="list-inline mb-2 mt-2">

            <li class="list-inline-item me-4">
                <a class="text-decoration-none text-muted" href="<?php echo $site_name."/admin/index.php"; ?>" title="ANASAYFA">
                    <i class="bi bi-house"></i>
                </a>
            </li>

            <li class="list-inline-item me-4">
                <a class="text-decoration-none text-muted" href="<?php echo $site_name."/write"; ?>" target="_blank" title="EKLE">
                    <i class="bi bi-plus-circle"></i>
                </a>
            </li>

            <li class="list-inline-item me-4">
                <a class="text-decoration-none text-muted" href="<?php echo $site_name; ?>" target="_blank" title="SİTEYE GİT">
                    <i class="bi bi-eye"></i>
                </a>
            </li>

            <li class="list-inline-item me-4">
                <a class="text-decoration-none text-muted" href="<?php echo $site_name."/admin/options.php"; ?>" title="AYARLAR">
                    <i class="bi bi-gear"></i>
                </a>
            </li>

        </ul>
    </div>
    <div class="border-bottom mt-2 mb-2 position-relative"></div>
    <li class="nav-item">
        <a class="nav-link" href="<?php echo $site_name."/admin/index.php"; ?>">
        <i class="bi bi-house me-1"></i>
            Anasayfa
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="<?php echo $site_name."/admin/posts.php?select=draft"; ?>">
            <i class="bi bi-pencil-square me-1"></i>
            Konular
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="<?php echo $site_name."/admin/comments.php?select=draft"; ?>">
            <i class="bi bi-chat-left-dots me-1"></i>
            Yorumlar
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="<?php echo $site_name."/admin/categories.php"; ?>">
            <i class="bi bi-grid me-1"></i>
            Kategoriler
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="<?php echo $site_name."/admin/images.php"; ?>">
            <i class="bi bi-image me-1"></i>
            Resimler
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="<?php echo $site_name."/admin/users.php?select=pending"; ?>">
            <i class="bi bi-person me-1"></i>
            Üyeler
        </a>
    </li>
    <li class="nav-item">
    <a class="nav-link" href="<?php echo $site_name."/admin/contacts.php?select=draft"; ?>">
            <i class="bi bi-envelope me-1"></i>
            Mesajlar
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="<?php echo $site_name."/admin/ads.php"; ?>">
        <i class="bi bi-badge-ad me-1"></i>
            Reklamlar
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="<?php echo $site_name."/admin/orders.php"; ?>">
        <i class="bi bi-menu-button-wide-fill"></i>
            Düzenler
        </a>
    </li>
    <li class="nav-item">
    <a class="nav-link" href="<?php echo $site_name."/admin/options.php"; ?>">
            <i class="bi bi-gear me-1"></i>
            Ayarlar
        </a>
    </li>
    <li class="nav-item dropdown ms-4 mt-2">
        <a class="btn btn-outline-primary nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="bi bi-person me-1"></i>
            <?php echo $_SESSION["user_nick"]; ?>
        </a>
        <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="/" target="_blank"><i class="bi bi-eye me-1"></i> Siteye Git</a></li>
            <li><a class="dropdown-item" href="../functions/logout.php"><i class="bi bi-power me-1"></i> Güvenli Çıkış</a></li>
        </ul>
    </li>
</ul>
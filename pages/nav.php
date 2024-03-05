<style>
    .offcanvas {
        --bs-offcanvas-width: 75%;
    }
</style>
<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">
        <a class="navbar-brand" href="/">
            <img src="<?php echo $option_logo_image_link; ?>" alt="logo" style="max-width: 150px;">
        </a>
        <div class="d-flex justify-content-center">
            <a class="btn btn-none d-lg-none text-muted" href="search">
                <i class="bi bi-search"></i>
            </a>
            <?php
            if (empty($_SESSION['user_id'])) {
            ?>
                <a class="btn btn-none d-lg-none text-muted" href="user">
                    <i class="bi bi-person"></i>
                </a>
            <?php
            }
            ?>

            <button class="navbar-toggler border-dark" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        <div class="offcanvas offcanvas-start text-bg-dark" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasNavbarLabel"></h5>
                <a class="navbar-brand" href="/">
                    <img src="<?php echo $option_logo_image_link; ?>" alt="logo" style="max-width: 150px;">
                </a>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <ul class="navbar-nav ms-auto">
                    <?php
                    $orderask = $db->prepare("SELECT * FROM orders WHERE order_status='top-menu' ORDER BY order_row Asc");
                    $orderask->execute(array());
                    while ($orderfetch = $orderask->fetch(PDO::FETCH_ASSOC)) {
                    ?>
                        <li class="nav-item">
                            <a class="nav-link active" href="<?php echo $orderfetch["order_link"] ?>">
                                <?php
                                echo '<i class="bi bi-' . $orderfetch["order_icon"] . ' me-1"></i>';
                                echo $orderfetch["order_name"];
                                ?>
                            </a>
                        </li>
                    <?php
                    }
                    ?>

                    <li class="nav-item">
                        <a class="btn btn-outline-light d-none d-lg-inline ms-3" type="button" href="search" title="Popular">
                            <i class="bi bi-search"></i>
                        </a>
                    </li>

                    <?php
                    // Giriş durumuna göre kullanıcı menüsü ve giriş tuşu ayarı yapılıyor.s
                    if (isset($_SESSION['user_id'])) {
                    ?>

                        <li class="nav-item dropdown">

                            <a class="btn btn-outline-primary nav-link dropdown-toggle ms-3" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-person me-1"></i>
                                <?php echo $_SESSION['user_nick']; ?>
                            </a>

                            <ul class="dropdown-menu">
                                <?php
                                if ($_SESSION['user_role'] == "admin") {
                                    echo '
                                        <li>
                                            <a class="dropdown-item" href="/admin/index.php">
                                                <i class="bi bi-shield-lock me-1"></i>
                                                <b>
                                                    Admin Paneli
                                                </b>
                                            </a>
                                        </li>
                                        ';
                                }
                                ?>
                                <li><a class="dropdown-item" href="profile"><i class="bi bi-person me-1"></i>Profil Sayfası</a></li>
                                <li><a class="dropdown-item" href="/functions/logout.php"><i class="bi bi-power me-1"></i>Güvenli Çıkış</a></li>
                            </ul>

                        </li>

                    <?php
                    } else {
                    ?>

                        <li class="nav-item">
                            <a class="btn btn-outline-light d-none d-lg-inline ms-3" type="button" href="user">
                                <i class="bi bi-person me-1"></i>
                            </a>
                        </li>

                    <?php
                    }
                    ?>

                </ul>
            </div>
        </div>
    </div>
</nav>

<?php
// Yeni üyelere "hoşgeldin" mesajı veriyor.
if (@$_GET["registry-status"] == "registry-success") {
    echo '<div class="card bg-success text-white text-center mt-3 h3"><div class="card-body">"' . $_SESSION['user_nick'] . '" aramıza hoş geldin.</div></div>';
}
?>

<?php
// HEADER ALTI REKLAMINI GÖSTERİYOR
$ads_where = "under-header";
$orderask = $db->prepare("SELECT * FROM orders WHERE order_status='ads' && order_ads='$ads_where'  ORDER BY order_row DESC");
$orderask->execute(array());
while ($orderfetch = $orderask->fetch(PDO::FETCH_ASSOC)) {
    echo '<div class="d-flex justify-content-center">' . $orderfetch["order_content"] . '</div>';
}
?>
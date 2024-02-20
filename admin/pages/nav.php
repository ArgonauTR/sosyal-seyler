<style>
    .offcanvas {
        --bs-offcanvas-width: 75%;
    }
</style>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">
            <img src="<?php echo $option_logo_image_link; ?>" alt="logo" style="max-width: 150px;">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="offcanvas offcanvas-start text-bg-dark" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasNavbarLabel"></h5>
                <a class="navbar-brand" href="index.php">
                    <img src="<?php echo $option_logo_image_link; ?>" alt="logo" style="max-width: 150px;">
                </a>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body d-lg-none">
                <?php
                // Off Canvas Menü için eklenmiştir.
                // Kaldırılırsa mobilde görünmez.
                include("pages/menu.php");
                ?>
            </div>
        </div>
    </div>
</nav>
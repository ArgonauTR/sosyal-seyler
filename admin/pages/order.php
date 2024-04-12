<style>
    .clamp-text {
        display: -webkit-box;
        -webkit-box-orient: vertical;
        overflow: hidden;
        -webkit-line-clamp: 1;
    }

    .custom-card {
        transition: box-shadow 0.3s, border-color 0.3s;
    }

    .custom-card:hover {
        box-shadow: 0 4px 8px rgba(255, 255, 255, 0.5);
    }
</style>
<div class="col-lg-9">
    <div class="card bg-dark text-white">
        <div class="card-header">
            <a href="./order.php" class="btn btn-sm btn-outline-secondary mt-2 text-white ms-2" style="text-decoration: none;"><i class="bi bi-grid-1x2 me-2"></i></i>Düzen</a>
            <a href="./order.php?order=top-menu" class="btn btn-sm btn-outline-secondary mt-2 text-white ms-2" style="text-decoration: none;"><i class="bi bi-menu-button-wide-fill me-2"></i>Üst Menü</a>
            <a href="./order.php?order=footer-menu" class="btn btn-sm btn-outline-secondary mt-2 text-white ms-2" style="text-decoration: none;"><i class="bi bi-segmented-nav me-2"></i></i>Alt Menü</a>
            <a href="./order.php?order=sidebar" class="btn btn-sm btn-outline-secondary mt-2 text-white ms-2" style="text-decoration: none;"><i class="bi bi-layout-sidebar-inset-reverse me-2"></i>Kenar Çubuğu</a>
            <a href="./order.php?order=ads" class="btn btn-sm btn-outline-secondary mt-2 text-white ms-2" style="text-decoration: none;"><i class="bi bi-cash-coin me-1"></i>Reklam</a>        </div>
        <div class="card-body">
            <?php

            @$order = $_GET["order"];

            switch ($order) {
                case "top-menu":
                    include("order-top-menu.php");
                    break;
                case "footer-menu":
                    include("order-footer-menu.php");
                    break;
                case "sidebar":
                    include("order-sidebar.php");
                    break;
                case "ads":
                    include("order-ads.php");
                    break;
                default;
                    include("order-main.php");
            }
            ?>
        </div>
    </div>
</div>
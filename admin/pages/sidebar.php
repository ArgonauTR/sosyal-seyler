<body class="bg-secondary">
    <div class="container-fluid">
        <div class="row mt-2">
            <div class="col-lg-3 d-none d-lg-block">
                <div class="card bg-dark text-white">
                    <div class="card-header">
                        <div class="card-title h4 text-mute text-center">Admin Paneli</div>
                    </div>
                    <div class="card-body">
                        <div class="offcanvas-body">
                            <?php
                            // LG ve üstü ekranlarda side bar olarak görünür
                            // Kaldırılırsa sidebar kaybolur
                            include("pages/menu.php");
                            ?>
                        </div>
                    </div>
                </div>
            </div>
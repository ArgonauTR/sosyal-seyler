<body>
    <div class="container">
        <div class="row">
            <div class="col-3 d-none d-lg-block">
                <ul class="nav flex-column h5">
                    <?php
                    $categories = categoryinfo("SELECT * FROM categories WHERE category_fav='on' ORDER BY category_title ASC");
                    foreach ($categories as $category) {
                    ?>
                        <li class="nav-item mb-2">
                            <a href="<?php echo $category["category_link"]; ?>" class="text-decoration-none text-muted"><i class="bi bi-<?php echo $category["category_icon"]; ?>"></i> <?php echo $category["category_title"]; ?></a>
                        </li>
                    <?php
                    }
                    ?>
                    <li class="nav-item mb-2">
                        <a href="<?php echo $site_name . "/categories"; ?>" class="text-decoration-none text-muted">Daha fazla...</a>
                    </li>
                </ul>

            </div>

            <!--- Reklam Alanı -->
            <div class="col-12 col-lg-6">
            <?php
            if(adinfo("ad_head")){
                echo adinfo("ad_head");
            }
            ?>
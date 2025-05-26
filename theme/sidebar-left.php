<div class="col-3 d-none d-lg-block liefect">
    <ul class="nav flex-column h5">
        <?php
        $categories = categoryinfo("SELECT * FROM categories WHERE category_fav='on' ORDER BY category_title ASC");
        foreach ($categories as $category) {
            $category_link = $category["category_link"];
            $category_icon = $category["category_icon"];
            $category_title = $category["category_title"];

            // Aktif olan Kategoriyi belirliyor
            if (isset($_GET["category_title"]) && $_GET["category_title"] == $category["category_title_sef"]) {
                $select = "bg-success p-2 border rounded";
            } else {
                $select = "";
            }

        ?>
            <li class="nav-item mb-2 <?php echo $select ?>">
                <a href="<?php echo $category_link ?>" class="text-decoration-none text-body fw-bold">
                    <i class="bi bi-<?php echo $category_icon ?>"></i>
                    <?php echo $category_title ?>
                </a>
            </li>
        <?php
        }
        ?>
        <li class="nav-item mb-2">
            <hr class="dropdown-divider">
        </li>
        <li class="nav-item mb-2">
            <a href="<?php echo $site_name ?>/categories" class="text-decoration-none text-body fw-bold">
                Daha fazla...
            </a>
        </li>
    </ul>
</div>

<!--- Reklam Alanı -->
<div class="col-12 col-lg-6">
    <?php
    if (adinfo("ad_head")) {
        echo adinfo("ad_head");
    }
    ?>
    <?php
    // Sayfalama için sayfa durum denetimi
    if (empty($_GET["page"])) {
        $page = 1;
    } else {
        $page = $_GET["page"];
    }

    // Sayfalama Değerleri
    $limit = 20;
    $start_limit = ($page * $limit) - $limit;

    // Sayfalama için İşlem yapılıyor
    $count_post = postinfo("SELECT * FROM categories");
    $page_count = ceil(count($count_post) / $limit);


    $categories = categoryinfo("SELECT * FROM categories ORDER BY category_title ASC LIMIT $start_limit,$limit");
    foreach ($categories as $category) {
    ?>
        <div class="card mb-3">
            <div class="card-header">
                <?php echo '<a href="' . $category["category_link"] . '" class="text-decoration-none text-muted"><h5><i class="bi bi-' . $category["category_icon"] . ' me-1"></i>' . $category["category_title"] . '</h5></a>'; ?>
            </div>
            <div class="card-body">
                <?php echo $category["category_description"]; ?>
            </div>
        </div>

    <?php
    }
    ?>
    <div class="d-flex justify-content-center mt-3 mb-3">
        <?php
        //Öncesi sayfası
        if ($page > 1) {
            $newpage = $page - 1;
            echo '<a href="?page=' . $newpage . '" class="btn btn-sm btn-outline-secondary  ms-1"><i class="bi bi-arrow-bar-left me-2"></i>Öncesi</a>';
        }
        // Sayfa Gösterici
        echo '<a href="" class="btn btn-sm btn-outline-darkms-1">Sayfa ' . $page . '</a>';

        //Öncesi sayfası
        if ($page < $page_count) {
            $newpage = $page + 1;
            echo '<a href="?page=' . $newpage . '" class="btn btn-sm btn-outline-secondary" ><i class="bi bi-arrow-bar-right me-2"></i>Sonrası</a>';
        }
        ?>
    </div>

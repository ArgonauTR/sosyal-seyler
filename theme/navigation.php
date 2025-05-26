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
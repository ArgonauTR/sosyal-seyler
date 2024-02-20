<div class="card bg-dark border-white mt-2">
    <?php
    if (empty($_GET['status'])) {
        include("comment-form.php");
    } else {
        if ($_GET["status"] === "ok") {
            echo '<div class="alert alert-success mx-4 mt-4" role="alert">
            <i class="bi bi-check-square me-2"></i>
            Teşekkürler. Yorumunuz onalyandıktan sonra yayınlanacaktır.
            </div>';
        } else {
            echo '<div class="alert alert-warning mx-4 mt-4" role="alert">
            <i class="bi bi-exclamation-triangle me-2"></i>
            Hata! Malesef bir hata ile karşılaştık
            </div>';        }
    }
    include("comment-list.php");
    ?>
</div>
<?php
// YORUM ÜSTÜ REKLAMINI GÖSTERİYOR
$ads_where = "top-comments";
$orderask = $db->prepare("SELECT * FROM orders WHERE order_status='ads' && order_ads='$ads_where'  ORDER BY order_row DESC");
$orderask->execute(array());
while ($orderfetch = $orderask->fetch(PDO::FETCH_ASSOC)) {
    echo '<div class="d-flex justify-content-center">' . $orderfetch["order_content"] . '</div>';
}
?>
<div class="card bg-dark border-white mt-2">
    <?php
    if (empty($_GET['status'])) {
        include("comment-form.php");
    } else {
        if ($_GET["status"] === "ok") {
            echo '<div class="alert alert-success mx-4 mt-4" role="alert">
            <i class="bi bi-check-square me-2"></i>
            Teşekkürler. Yorumunuz onaylandıktan sonra yayınlanacaktır.
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
<?php
// FOOTER ÜSTÜ REKLAMINI GÖSTERİYOR
$ads_where = "top-footer";
$orderask = $db->prepare("SELECT * FROM orders WHERE order_status='ads' && order_ads='$ads_where'  ORDER BY order_row DESC");
$orderask->execute(array());
while ($orderfetch = $orderask->fetch(PDO::FETCH_ASSOC)) {
    echo '<div class="d-flex justify-content-center">' . $orderfetch["order_content"] . '</div>';
}
?>
<div class="border-bottom mt-2 position-relative"> </div>
<footer class="text-center mt-4">
    <ul class="list-inline">
        <?php
        $orderask = $db->prepare("SELECT * FROM orders WHERE order_status='footer-menu' ORDER BY order_row Asc");
        $orderask->execute(array());
        while ($orderfetch = $orderask->fetch(PDO::FETCH_ASSOC)) {
        ?>
            <li class="list-inline-item">
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

    </ul>
    <div class="text-center">
        <?php echo $optionfetch["option_footer"] ?>
    </div>
    <div class="inline mt-2">
        <?php
        if ($optionfetch["option_respect"] == "yes") {
            echo '<a class="text-muted" href="https://sosyalseyler.com/" style="text-decoration: none;"><i class="bi bi-heart-fill me-1"></i>Sosyal Şeyler</a>';
        }
        ?>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>

</html>
</div>
</div>
<footer class="text-center py-4">
    <hr class="my-3">
    <ul class="list-inline mb-0">
        <?php
        $orders = orderinfo("SELECT * FROM orders ORDER BY order_num ASC");
        foreach ($orders as $order) {
            $order_value = $order["order_value"];
            $order_icon = $order["order_icon"];
            $order_name = $order["order_name"];
        ?>
            <li class="list-inline-item">
                <a href="<?php echo $order_value ?>" class="text-decoration-none text-muted d-flex align-items-center">
                    <i class="bi bi-<?php echo $order_icon ?> me-2"></i>
                    <span><?php echo $order_name ?></span>
                </a>
            </li>
        <?php
        }
        ?>
    </ul>
    <p class="mt-3 mb-0 text-muted">
        <?php echo optioninfo("option_footer_text"); ?>
    </p>
</footer>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="<?php echo $site_name ?>/theme/js/default.js"></script>
<script src="<?php echo $site_name ?>/theme/js/editor.js"></script>

</html>
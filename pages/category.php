<?php
@$category_id = htmlspecialchars(strip_tags($_GET["category_id"]));
if (@empty($category_id)) {
    include("category-list.php");
} else {
    include("category-page.php");
}
?>
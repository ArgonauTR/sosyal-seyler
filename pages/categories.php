<?php
if (empty($_GET["category_title"])) {
    include("subpages/categories-all.php");
}else{
    include("subpages/categories-only.php");
}

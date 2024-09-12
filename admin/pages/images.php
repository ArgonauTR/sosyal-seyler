<?php
if (isset($_GET["image_id"])) {
    include("process/image-show.php");
} else {
    include("process/image-list.php");
}
?>
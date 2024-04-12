<?php

require_once("config.php");

include("pages/head.php");
include("pages/nav.php");
if ($optionfetch["option_index_page"] == "blog") {
    include("pages/archive.php");
} else {
    include("pages/mindex.php");
}
include("pages/footer.php");

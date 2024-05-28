<?php

require_once("config.php");

include("pages/head.php");
include("pages/nav.php");

$index_page = $optionfetch["option_index_page"];

switch($index_page){
    case "blog":
        include("pages/archive.php");
        break;
    case "manga":
        include("pages/mindex.php");
        break;
    case "summary":
        include("pages/summary.php");
        break;
    default:
        include("pages/archive.php");
}

include("pages/footer.php");

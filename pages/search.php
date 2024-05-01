<body class=" bg-dark text-white">
    <div class="container">
        <?php
        if (empty($_GET['search'])) {
            include 'pages/search-engine.php';
        } else {
            if ($_GET["search"] === "result") {
                include 'pages/search-result.php';
            }elseif($_GET["search"] === "manga_result"){
                include 'pages/search-manga-result.php';
            } else {
                include 'pages/search-engine.php';
            }
        }
        ?>
    </div>
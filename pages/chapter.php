<style>
    img {
        max-width: 100%;
        height: auto;
        display: block;
    }

    .clamp-text {
        display: -webkit-box;
        -webkit-box-orient: vertical;
        overflow: hidden;
        -webkit-line-clamp: 1;
    }

    .rounded-bottom-corners {
        border-bottom-left-radius: 10px;
        border-bottom-right-radius: 10px;
        box-shadow: 0px 10px 10px rgba(0, 0, 0, 0.2);
    }

    .custom-card {
        transition: box-shadow 0.3s, border-color 0.3s;
    }

    .custom-card:hover {
        box-shadow: 0 4px 8px rgba(255, 255, 255, 0.5);
    }
</style>

<?php
$manga_id = $_GET["manga_id"];
$mangaask = $db->prepare("SELECT * FROM mangas WHERE manga_id=:id");
$mangaask->execute(array('id' => $manga_id));
while ($mangafetch = $mangaask->fetch(PDO::FETCH_ASSOC)) {
    $manga_name = $mangafetch["manga_name"];
    $manga_link = $mangafetch["manga_link"];
}

?>

<body class="bg-dark text-white">
    <div class="container">
        <div class="card bg-dark text-white mt-3" style="border: none;">
            <div class="h2"><a href="<?php echo $manga_link ?>" class="text-white" style="text-decoration: none;"><?php echo $manga_name ?></a></div>
            <div class="d-flex justify-content-center">
                <a href="" class="btn bgn-sm btn-outline-secondary border-secondary text-white ms-1 me-1">
                    <i class="bi bi-arrow-left-short text-secondary"></i>
                </a>
                <div class="dropdown">
                    <a href="" class="btn bgn-sm btn-outline-secondary dropdown-toggle ms-1 me-1" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Bölüm - 7
                    </a>
                    <ul class="dropdown-menu">
                        <?php
                        $manga_id = $_GET["manga_id"];
                        $chapterask = $db->prepare("SELECT * FROM chapters WHERE chapter_status='publish' && chapter_manga_id='$manga_id' ORDER BY chapter_num DESC");
                        $chapterask->execute(array());
                        while ($chapterfetch = $chapterask->fetch(PDO::FETCH_ASSOC)) {
                        ?>
                            <li><a class="dropdown-item" href="<?php echo $chapterfetch["chapter_link"] ?>"><?php echo "Bölüm-" . $chapterfetch["chapter_num"] . "-" . $chapterfetch["chapter_name"] ?></a></li>
                        <?php
                        }
                        ?>
                    </ul>
                </div>
                <a href="" class="btn bgn-sm btn-outline-secondary border-secondary text-white ms-1 me-1">
                    <i class="bi bi-arrow-right-short text-secondary"></i>
                </a>
            </div>
            <div class="d-flex justify-content-center">
                <div class="col-12 col-lg-8">
                    <?php
                    $chapter_id = $_GET["chapter_id"];
                    $ctask = $db->prepare("SELECT * FROM chapter_tax WHERE ct_manga_id='$manga_id' && ct_chapter_num='$chapter_id' ORDER BY ct_order ASC");
                    $ctask->execute(array());
                    while ($ctfetch = $ctask->fetch(PDO::FETCH_ASSOC)) {
                    ?>
                        <img src="<?php echo $ctfetch["ct_link"] ?>" class="img-fluid p-2">

                    <?php
                    }
                    ?>
                </div>
            </div>
            <div class="d-flex justify-content-center">
                <a href="" class="btn bgn-sm btn-outline-secondary border-secondary text-white ms-1 me-1">
                    <i class="bi bi-arrow-left-short text-secondary"></i>
                </a>
                <div class="dropdown">
                    <a href="" class="btn bgn-sm btn-outline-secondary dropdown-toggle ms-1 me-1" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Bölüm - 7
                    </a>
                    <ul class="dropdown-menu">
                        <?php
                        $manga_id = $_GET["manga_id"];
                        $chapterask = $db->prepare("SELECT * FROM chapters WHERE chapter_status='publish' && chapter_manga_id='$manga_id' ORDER BY chapter_num DESC");
                        $chapterask->execute(array());
                        while ($chapterfetch = $chapterask->fetch(PDO::FETCH_ASSOC)) {
                        ?>
                            <li><a class="dropdown-item" href="<?php echo $chapterfetch["chapter_link"] ?>"><?php echo "Bölüm-" . $chapterfetch["chapter_num"] . "-" . $chapterfetch["chapter_name"] ?></a></li>
                        <?php
                        }
                        ?>
                    </ul>
                </div>
                <a href="" class="btn bgn-sm btn-outline-secondary border-secondary text-white ms-1 me-1">
                    <i class="bi bi-arrow-right-short text-secondary"></i>
                </a>
            </div>
        </div>
        <div class="card bg-dark text-white text-center h2 mt-2 mb-2 border-primary">
            <div class="card-body">
                BURAYA DISQUS YORUMLARI EKLENECEK
            </div>
        </div>
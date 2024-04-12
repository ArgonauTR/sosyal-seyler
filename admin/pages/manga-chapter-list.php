<style>
    .clamp-text {
        display: -webkit-box;
        -webkit-box-orient: vertical;
        overflow: hidden;
        -webkit-line-clamp: 1;
    }

    .custom-card {
        transition: box-shadow 0.3s, border-color 0.3s;
    }

    .custom-card:hover {
        box-shadow: 0 4px 8px rgba(255, 255, 255, 0.5);
    }

    .link {
        text-decoration: none;
        color: white;
    }
</style>

<div class="col-lg-9">
    <div class="card bg-dark text-white">
        <div class="card-head">
        <div class="card-header">
                <a href="?manga=manga-chapter-list&manga_id=<?php echo $_GET["manga_id"] ?>&status=publish" class="btn btn-sm btn-outline-secondary text-white mt-2" style="text-decoration: none;"><i class="bi bi-clipboard-check me-2"></i>Yayımlanmış</a>
                <a href="?manga=manga-chapter-list&manga_id=<?php echo $_GET["manga_id"] ?>&status=draft" class="btn btn-sm btn-outline-secondary text-white ms-2 mt-2" style="text-decoration: none;"><i class="bi bi-clock-history me-2"></i>Taslak</a>            </div>
            <div class="card-body p-1">
                <?php
                // Listeleme için yazı yayın durumu denetimi.
                if (empty($_GET["status"])) {
                    $status = "publish";
                } else {
                    $status = $_GET["status"];
                }

                // Sayfalama için sayfa durum denetimi
                if (empty($_GET["page"])) {
                    $page = 1;
                } else {
                    $page = $_GET["page"];
                }

                // Mangalar listeleniyor
                $manga_id = $_GET["manga_id"];
                $chapterask = $db->prepare("SELECT * FROM chapters WHERE chapter_status='$status' && chapter_manga_id='$manga_id' ORDER BY chapter_num DESC");
                $chapterask->execute(array());
                while ($chapterfetch = $chapterask->fetch(PDO::FETCH_ASSOC)) {
                ?>
                    <div class="d-flex justify-content-between p-2 mt-2 custom-card">
                        <div class="clamp-text">
                            <b class="me-2">
                                <?php echo $chapterfetch["chapter_num"] ?>
                            </b>
                            <a href="#" class="text-white" style="text-decoration: none;">
                                <?php echo $chapterfetch["chapter_name"] ?>
                            </a>
                        </div>
                        <div class="">
                            <a class="nav-link dropdown-toggle-none" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-three-dots-vertical"></i>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="<?php echo $chapterfetch["chapter_link"]; ?>" target="_blank"><i class="bi bi-eye me-1"></i>Sitede Gör</a></li>
                                <?php
                                if ($chapterfetch["chapter_status"] == "publish") {
                                    echo '<li><a class="dropdown-item" href="./functions/chapter-status.php?chapter_id=' . $chapterfetch["chapter_id"] . '&manga_id='.$manga_id.'&status=draft"><i class="bi bi-x-square me-1"></i>Askıya Al</a></li>';
                                } else {
                                    echo '<li><a class="dropdown-item" href="./functions/chapter-status.php?chapter_id=' . $chapterfetch["chapter_id"] . '&manga_id='.$manga_id.'&status=publish"><i class="bi bi-check2-square me-1"></i>Onayla</a></li>';
                                }
                                ?>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="./functions/chapter-delete.php?manga_id=<?php echo $manga_id ?>&chapter_num=<?php echo $chapterfetch["chapter_num"]; ?>&chapter_id=<?php echo $chapterfetch["chapter_id"] ?>&status=delete"><i class="bi bi-trash me-1"></i>Sil</a></li>
                            </ul>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
</div>
</div>
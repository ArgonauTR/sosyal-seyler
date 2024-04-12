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
</style>

<div class="col-lg-9">
    <div class="card bg-dark text-white">
        <div class="card-header">
            <a href="?status=read" class="btn btn-sm btn-outline-secondary text-white ms-2 mt-2" style="text-decoration: none;"><i class="bi bi-clipboard-check me-2"></i>Okunmuş</a>
            <a href="?status=wait" class="btn btn-sm btn-outline-secondary text-white mt-2" style="text-decoration: none;"><i class="bi bi-clock-history me-2"></i>Bekliyor</a>
        </div>
        <div class="card-body p-1">
            <?php
            if (empty($_GET["status"])) {
                $status = "read";
            } else {
                $status = $_GET["status"];
            }

            // Sayfalama için sayfa durum denetimi
            if (empty($_GET["page"])) {
                $page = 1;
            } else {
                $page = $_GET["page"];
            }

            // Sayfalama Değerleri
            $limit = 20; // Bir sayfada gösterilecek elemanı belirliyor.
            $start_limit = ($page * $limit) - $limit;

            // Post Sayısı bulucu.
            $count = 0;
            $messageask = $db->prepare("SELECT * FROM messages");
            $messageask->execute(array());
            while ($messagefetch = $messageask->fetch(PDO::FETCH_ASSOC)) {
                $count++;
            }
            // Post sayısı kullanılarak sayfa sayısı bulundu
            $page_count = ceil($count / $limit);

            $messageask = $db->prepare("SELECT * FROM messages WHERE message_status='$status' ORDER BY message_id DESC LIMIT $start_limit,$limit");
            $messageask->execute(array());
            while ($messagefetch = $messageask->fetch(PDO::FETCH_ASSOC)) {
            ?>
                <div class="d-flex justify-content-between p-2 mt-2 custom-card">
                    <div class="clamp-text">
                        <b class="me-2">
                            <?php echo $messagefetch["message_id"] ?>
                        </b>
                        <a href="#" class="text-white" style="text-decoration: none;">
                            <?php echo $messagefetch["message_title"] ?>
                        </a>
                    </div>
                    <div class="">
                        <a class="nav-link dropdown-toggle-none" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-three-dots-vertical"></i>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="./process.php?message=read&message_id=<?php echo $messagefetch["message_id"]; ?>"><i class="bi bi-eye me-1"></i>Görüntüle</a></li>
                            <?php
                            if ($messagefetch["message_status"] == "read") {
                                echo '<li><a class="dropdown-item" href="./functions/message-status.php?message_id=' . $messagefetch["message_id"] . '&status=wait"><i class="bi bi-x-square me-1"></i>Okunmamış Yap</a></li>';
                            } else {
                                echo '<li><a class="dropdown-item" href="./functions/message-status.php?message_id=' . $messagefetch["message_id"] . '&status=read"><i class="bi bi-check2-square me-1"></i>Okunmuş Yap</a></li>';
                            }
                            ?>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="./functions/message-delete.php?message_id=<?php echo $messagefetch["message_id"]; ?>&status=delete"><i class="bi bi-trash me-1"></i>Sil</a></li>
                        </ul>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
        <nav class="d-flex justify-content-center mt-3 mb-3">
            <?php
            //Öncesi sayfası
            if ($page > 1) {
                $newpage = $page - 1;
                echo '<a href="?page=' . $newpage . '" class="btn btn-sm btn-outline-secondary text-white ms-1" style="text-decoration: none;"><i class="bi bi-arrow-bar-left me-2"></i>Öncesi</a>';
            }
            // Sayfa Gösterici
            echo '<a href="" class="btn btn-sm btn-outline-dark text-white disabled ms-1" style="text-decoration: none;">Sayfa ' . $page . '</a>';

            //Öncesi sayfası
            if ($page < $page_count) {
                $newpage = $page + 1;
                echo '<a href="?page=' . $newpage . '" class="btn btn-sm btn-outline-secondary text-white ms-1" style="text-decoration: none;"><i class="bi bi-arrow-bar-right me-2"></i>Sonrası</a>';
            }
            ?>
        </nav>
    </div>
</div>
</div>
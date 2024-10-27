<div class="col-12 col-lg-9">
    <div class="card">
        <div class="card-header">
            <a href="?select=draft" class="btn"><i class="bi bi-clock-history"></i> Bekleyenler</a>
            <a href="?select=publish" class="btn"><i class="bi bi-check-circle"></i> Okunmuşlar</a>
        </div>
        <div class="card-body">
            <?php

            // Taslak/yayın arasındaki geçişi hafızada tutar.
            if (empty($_SESSION["select"])) {
                $_SESSION["select"] = "draft";
            } else {
                if (isset($_GET["select"])) {
                    if ($_GET["select"] == "draft") {
                        $_SESSION["select"] = "draft";
                    } else {
                        $_SESSION["select"] = "publish";
                    }
                }
            }

            $status = $_SESSION["select"];


            // Sayfalama için sayfa durum denetimi
            if (empty($_GET["page"])) {
                $page = 1;
            } else {
                $page = $_GET["page"];
            }

            // Sayfalama Değerleri
            $limit = 20;
            $start_limit = ($page * $limit) - $limit;

            // Sayfalama için İşlem yapılıyor
            $count_post = postinfo("SELECT * FROM contacts");
            $page_count = ceil(count($count_post) / $limit);

            $contacts = contactinfo("SELECT * FROM contacts WHERE contact_status='$status' ORDER BY contact_id DESC LIMIT $start_limit,$limit");
            if(empty($contacts)){
                echo '<p class="text-success h3"><i class="bi bi-check2-square"></i> Harika. Tüm işler bitmiş.</p>';
            }
            foreach ($contacts as $contact) {
            ?>
                <div class="d-flex justify-content-between p-2 mt-2 custom-card">
                    <div class="clamp-text">
                        <b class="text-decoration-none text-muted me-2">
                            <?php echo $contact["contact_id"] ?>
                        </b>
                        <a href="#" class="text-decoration-none text-muted">
                            <?php echo $contact["contact_title"] ?>
                        </a>
                    </div>
                    <div class="">
                        <a class="nav-link dropdown-toggle-none" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-three-dots-vertical"></i>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="<?php echo $site_name."/admin/process.php?contact_id=".$contact["contact_id"]; ?>&type=contact-read" target="_blank"><i class="bi bi-eye me-1"></i>Görüntüle</a></li>
                           <li><a class="dropdown-item" href="mailto:<?php echo $contact["contact_mail"]; ?>"><i class="bi bi-envelope-at"></i> Cevapla</a></li>
                           <?php
                            if ($contact["contact_status"] == "publish") {
                                echo '<li><a class="dropdown-item" href="'.$site_name.'/admin/functions/contact-status.php?status=draft&contact_id='.$contact["contact_id"].'"><i class="bi bi-clock-history me-1"></i>Bekliyor Yap</a></li>';
                            } else {
                                echo '<li><a class="dropdown-item" href="'.$site_name.'/admin/functions/contact-status.php?status=publish&contact_id='.$contact["contact_id"].'"><i class="bi bi-clock-history me-1"></i>Okunmuş Yap</a></li>';
                            }
                            ?>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="<?php echo $site_name; ?>/admin/functions/contact-delete.php?contact_id=<?php echo $contact["contact_id"]; ?>"><i class="bi bi-trash me-1"></i>Sil</a></li>
                        </ul>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
        <div class="d-flex justify-content-center mt-3 mb-3">
            <?php
            //Öncesi sayfası
            if ($page > 1) {
                $newpage = $page - 1;
                echo '<a href="?page=' . $newpage . '" class="btn btn-sm btn-outline-secondary  ms-1"><i class="bi bi-arrow-bar-left me-2"></i>Öncesi</a>';
            }
            // Sayfa Gösterici
            echo '<a href="" class="btn btn-sm btn-outline-darkms-1">Sayfa ' . $page . '</a>';

            //Öncesi sayfası
            if ($page < $page_count) {
                $newpage = $page + 1;
                echo '<a href="?page=' . $newpage . '" class="btn btn-sm btn-outline-secondary" ><i class="bi bi-arrow-bar-right me-2"></i>Sonrası</a>';
            }
            ?>
        </div>
    </div>
</div>
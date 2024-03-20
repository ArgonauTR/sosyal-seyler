<?PHP

//Post istatistiklerini sayıyor.
$post_draft = 0;
$post_publish = 0;
$postask = $db->prepare("SELECT * FROM posts");
$postask->execute(array());
while ($postfetch = $postask->fetch(PDO::FETCH_ASSOC)) {
    if ($postfetch["post_status"] == "publish") {
        $post_publish++;
    }
    if ($postfetch["post_status"] == "draft") {
        $post_draft++;
    }
}

//Kategori istatistiklerini sayıyıor.
$category_count = 0;
$categoryask = $db->prepare("SELECT * FROM categories");
$categoryask->execute(array());
while ($categoryfetch = $categoryask->fetch(PDO::FETCH_ASSOC)) {
    $category_count++;
}

//Yorum istatistiklerini sayıyor.
$comment_publish = 0;
$comment_draft = 0;
$commentask = $db->prepare("SELECT * FROM comments ORDER BY comment_id DESC");
$commentask->execute(array());
while ($commentfetch = $commentask->fetch(PDO::FETCH_ASSOC)) {
    if ($commentfetch["comment_status"] == "publish") {
        $comment_publish++;
    }
    if ($commentfetch["comment_status"] == "draft") {
        $comment_draft++;
    }
}

//Resim istatistiklerini sayıyor.
$image_count = 0;
$imageask = $db->prepare("SELECT * FROM images");
$imageask->execute(array());
while ($imagefetch = $imageask->fetch(PDO::FETCH_ASSOC)) {
    $image_count++;
}

//Üye istatistiklerini sayıyor.
$user_approved = 0;
$user_pending = 0;
$user_admin = 0;
$user_author = 0;
$user_user = 0;
$userask = $db->prepare("SELECT * FROM users");
$userask->execute(array());
while ($userfetch = $userask->fetch(PDO::FETCH_ASSOC)) {
    if ($userfetch["user_status"] == "approved") {
        $user_approved++;
    }
    if ($userfetch["user_status"] == "pending") {
        $user_pending++;
    }
    if ($userfetch["user_role"] == "admin") {
        $user_admin++;
    }
    if ($userfetch["user_role"] == "author") {
        $user_author++;
    }
    if ($userfetch["user_role"] == "user") {
        $user_user++;
    }
}

//Mesaj İstatistiklerini Sayıyor
$message_read = 0;
$message_wait = 0;
$messageask = $db->prepare("SELECT * FROM messages");
$messageask->execute(array());
while ($messagefetch = $messageask->fetch(PDO::FETCH_ASSOC)) {
    if ($messagefetch["message_status"] == "wait") {
        $message_wait++;
    }
    if ($messagefetch["message_status"] == "read") {
        $message_read++;
    }
}

//JSON'dan sistem verileri alınıp karşılaştırılıyor.
// Site Json Verileri
$system_jason = file_get_contents("../system/info.json");
$system_data = json_decode($system_jason, true);
// Kaynak Json Verileri
$source_jason = file_get_contents("https://sosyalseyler.com/system/info.json");
$source_data = json_decode($source_jason, true);
//Version bilgisi kıyaslanıyor
$update = 0;
if ($source_data["compilation"] > $system_data["compilation"]) {
    $update = 1;
}
?>

<div class="col-lg-9">

    <?php
    if ($user_pending > 0 || $comment_draft > 0 || $post_draft > 0 || $message_wait > 0 || $update > 0) {
        if ($user_pending > 0) {
            echo '<div class="alert alert-warning mx-4 mt-4" role="alert">
            <i class="bi bi-arrow-clockwise me-1"></i>' . $user_pending . '
            Adet Bekleyen Kullanıcı Var.
            </div>';
        }
        if ($comment_draft > 0) {
            echo '<div class="alert alert-warning mx-4 mt-4" role="alert">
            <i class="bi bi-arrow-clockwise me-1"></i>' . $comment_draft . '
            Adet Bekleyen Yorum Var.
            </div>';
        }
        if ($post_draft > 0) {
            echo '<div class="alert alert-warning mx-4 mt-4" role="alert">
            <i class="bi bi-arrow-clockwise me-1"></i>' . $post_draft . '
            Adet Bekleyen İçerik Var.
            </div>';
        }
        if ($message_wait > 0) {
            echo '<div class="alert alert-warning mx-4 mt-4" role="alert">
            <i class="bi bi-arrow-clockwise me-1"></i>' . $message_wait . '
            Adet bekleyen mesaj var.
            </div>';
        }
        if ($update > 0) {
            echo '<div class="alert alert-danger mx-4 mt-4" role="alert">
            <i class="bi bi-arrow-clockwise me-1"></i>
            GÜNCELLEME VAR.
            Şu anda ' . $source_data["compilation"] - $system_data["compilation"] . '
            Versiyon Geridesiniz. Güncel Sürüm <a class="btn btn-sm btn-outline-primary ms-2" target="_blank" href="' . $source_data["update"] . '">' . $source_data["version"] . ' - ' . $source_data["title"] . '</a>  haberi için tıklayınız
            </div>';
        }
    }
    ?>

    <div class="row row-cols-1 row-cols-lg-3 g-2 text-white">

        <!-- İçerik İstatistikleri Kartı -->
        <div class="card bg-dark border-secondary">
            <div class="card-header text-center">
                <i class="bi bi-layout-text-window me-1"></i>
                İçerik İstatistikleri
            </div>
            <div class="card-body">
                <table class="table text-white">
                    <tbody>
                        <tr>
                            <td>Taslak Yazılar</td>
                            <td>
                                <span class="badge bg-danger"><?php echo $post_draft; ?></span>
                            </td>
                        </tr>
                        <tr>
                            <td>Onaylı Yazılar</td>
                            <td><span class="badge bg-success"><?php echo $post_publish; ?></span></td>
                        </tr>
                        <tr>
                            <td>Kategoriler</td>
                            <td>
                                <span class="badge bg-primary"><?php echo $category_count; ?></span>
                            </td>
                        </tr>
                        <tr>
                            <td>Resimler</td>
                            <td>
                                <span class="badge bg-danger"><?php echo $image_count; ?></span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Geribildirim İstatistikleri Kartı -->
        <div class="card  custom-card bg-dark border-secondary">
            <div class="card-header text-center p-2">
                <i class="bi bi-bell me-1"></i>
                Geribildirim İstatistikleri
            </div>
            <div class="card-body">
                <table class="table text-white">
                    <tbody>
                        <tr>
                            <td>Taslak Yorum</td>
                            <td>
                                <span class="badge bg-danger"><?php echo $comment_draft; ?></span>
                            </td>
                        </tr>
                        <tr>
                            <td>Onaylı Yorum</td>
                            <td><span class="badge bg-success"><?php echo $comment_publish; ?></span></td>
                        </tr>
                        <tr>
                            <td>Bekleyen Mesaj</td>
                            <td>
                                <span class="badge bg-danger"><?php echo $message_wait; ?></span>
                            </td>
                        </tr>
                        <tr>
                            <td>Okunmuş Mesaj</td>
                            <td><span class="badge bg-success"><?php echo $message_read; ?></span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Üye İstatistikleri -->
        <div class="card  custom-card bg-dark border-secondary">
            <div class="card-header text-center p-2">
                <i class="bi bi-person me-1"></i>
                Üyeler İstatistikleri
            </div>
            <div class="card-body">
                <table class="table text-white">
                    <tbody>
                        <tr>
                            <td>Bekleyen Üyelik</td>
                            <td>
                                <span class="badge bg-danger"><?php echo $user_pending; ?></span>
                            </td>
                        </tr>
                        <tr>
                            <td>Onaylı Üyelik</td>
                            <td><span class="badge bg-success"><?php echo $user_approved; ?></span></td>
                        </tr>
                        <tr>
                            <td>Admin Görevi</td>
                            <td><span class="badge bg-primary"><?php echo $user_admin; ?></span></td>
                        </tr>
                        <tr>
                            <td>Yazar Görevli</td>
                            <td><span class="badge bg-primary"><?php echo $user_author; ?></span></td>
                        </tr>
                        <tr>
                            <td>Üye Görevli</td>
                            <td><span class="badge bg-primary"><?php echo $user_user; ?></span></td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>

        <!-- SİSTEM VERİLERİNİ BURADA GÖSTERİYORUZ -->
        <div class="card  custom-card bg-dark border-secondary">
            <div class="card-header text-center p-2">
                <i class="bi bi-cone-striped me-1"></i>
                SİSTEM VERİLERİ
            </div>
            <div class="card-body">
                <p>
                    <b>Site Linki: </b><?php echo $_SERVER["HTTP_HOST"]; ?>
                </p>
                <p>
                    <b>Sistem Tarih - Saati: </b><?php echo date("d/m/Y H:i:s"); ?>
                </p>
                <p>
                    <b>IP Adresiniz: </b><?php echo $_SERVER['REMOTE_ADDR']; ?>
                </p>
                <p>
                    <b>PHP Versiyonunuz: </b><?php echo phpversion(); ?>
                </p>
            </div>
        </div>

        <!-- YAZILIM BİLGİLERİ BURADA GÖSTERİYORUZ -->
        <div class="card  custom-card bg-dark border-secondary">
            <div class="card-header text-center p-2">
                <i class="bi bi-code-slash me-1"></i>
                YAZILIM BİLGİLERİ
            </div>
            <div class="card-body">
                <p>
                    <b>Yazılım Adı: </b><?php echo $system_data["tag"]; ?>
                </p>
                <p>
                    <b>Versiyon Yayın Tarihi: </b><?php echo $system_data["time"]; ?>
                </p>
                <p>
                    <b>Versiyon Haberi: </b><a class="btn btn-sm btn-outline-info ms-2" target="_blank" href="<?php echo $system_data["update"]; ?>"><?php echo $system_data["version"] . " - " . $system_data["title"]; ?></a>
                </p>
            </div>
        </div>

        <!-- GELİŞTİRİCİ NOTU BURADA GÖSTERİYORUZ -->
        <div class="card  custom-card bg-dark border-secondary">
            <div class="card-header text-center p-2">
                <i class="bi bi-app-indicator me-1"></i>
                GELİŞTİRİCİ NOTU
            </div>
            <div class="card-body">
                <p>
                    Yazılımın gelişme sürecinde bazı hatalar ve eksiklikler ile karşılaşabilirsiniz. Bu süreçte anlayışlı olup hataları bize bildirirseniz memnun oluruz.
                </p>
            </div>
        </div>

    </div>
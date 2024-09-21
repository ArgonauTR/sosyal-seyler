<?php
// Tüm postların sayısı
$posts_all = postinfo("SELECT * FROM posts");

// Taslak postların sayısı
$posts_draft = postinfo("SELECT * FROM posts WHERE post_status='draft'");
if (count($posts_draft) != 0) {
    $posts_draft_ready = '<span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">' . count($posts_draft) . '</span>';
} else {
    $posts_draft_ready = null;
}

// Tüm yorumların sayısı.
$comments_all = commentinfo("SELECT * FROM comments");

// Tüm yorumların sayısı.
$comments_draft = commentinfo("SELECT * FROM comments WHERE comment_status='draft'");
if (count($comments_draft) != 0) {
    $comments_draft_ready = '<span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">' . count($comments_draft) . '</span>';
} else {
    $comments_draft_ready = null;
}

// Tüm mesajların sayısı.
$contact_all = commentinfo("SELECT * FROM contacts");

// Tüm yorumların sayısı.
$contacts_draft = commentinfo("SELECT * FROM contacts WHERE contact_status='draft'");
if (count($contacts_draft) != 0) {
    $contacts_draft_ready = '<span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">' . count($contacts_draft) . '</span>';
} else {
    $contacts_draft_ready = null;
}

// Tüm kategorilerin sayısı
$categories_all = categoryinfo("SELECT * FROM categories");

// Tüm Resimlerin sayısı
$images_all = categoryinfo("SELECT * FROM images");

// Tüm üyelerin sayısı.
$users_all = userinfo("SELECT * FROM users");

// Bekleyen kullanıcılarnı sayısı.
$users_pending = userinfo("SELECT * FROM users WHERE user_status='pending'");
if (count($users_pending) != 0) {
    $users_pending_ready = '<span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">' . count($users_pending) . '</span>';
} else {
    $users_pending_ready = null;
}

//JSON'dan sistem verileri alınıp karşılaştırılıyor.
// Site Json Verileri
$system_jason = file_get_contents("system/info.json");
$system_data = json_decode($system_jason, true);
// Kaynak Json Verileri
$source_jason = file_get_contents("https://sosyalseyler.com/admin/system/info.json");
$source_data = json_decode($source_jason, true);
//Version bilgisi kıyaslanıyor
$update = 0;
if ($source_data["compilation"] > $system_data["compilation"]) {
    $update_pending_ready = '<span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">' . $source_data["version"] . '</span>';
} else {
    $update_pending_ready = null;
}
?>
<div class="col-12 col-lg-9">
    <div class="row">
        <div class="col-6 col-md-4 col-lg-3 mb-4">
            <div class="card text-center">
                <?php echo $posts_draft_ready; ?>
                <div class="card-body">
                    <h1 class="card-title"><?php echo count($posts_all); ?></h1>
                    <p class="card-text">Konular</p>
                </div>
            </div>
        </div>
        <div class="col-6  col-md-4 col-lg-3 mb-4">
            <div class="card text-center">
                <?php echo $comments_draft_ready; ?>
                <div class="card-body">
                    <h1 class="card-title"><?php echo count($comments_all); ?></h1>
                    <p class="card-text">Yorumlar</p>
                </div>
            </div>
        </div>
        <div class="col-6 col-md-4 col-lg-3 mb-4">
            <div class="card text-center">
                <div class="card-body">
                    <h1 class="card-title"><?php echo count($categories_all); ?></h1>
                    <p class="card-text">Kategoriler</p>
                </div>
            </div>
        </div>
        <div class="col-6 col-md-4 col-lg-3 mb-4">
            <div class="card text-center">
                <div class="card-body">
                    <h1 class="card-title"><?php echo count($images_all); ?></h1>
                    <p class="card-text">Resimler</p>
                </div>
            </div>
        </div>
        <div class="col-6 col-md-4 col-lg-3 mb-4">
            <div class="card text-center">
                <?php echo $users_pending_ready; ?>
                <div class="card-body">
                    <h1 class="card-title"><?php echo count($users_all); ?></h1>
                    <p class="card-text">Üyeler</p>
                </div>
            </div>
        </div>
        <div class="col-6 col-md-4 col-lg-3 mb-4">
            <div class="card text-center">
                <?php echo $contacts_draft_ready; ?>
                <div class="card-body">
                    <h1 class="card-title"><?php echo count($contact_all); ?></h1>
                    <p class="card-text">Mesajlar</p>
                </div>
            </div>
        </div>
        <hr>
        <div class="col-6 col-md-4 col-lg-3 mb-4">
            <div class="card text-center">
            <?php echo $update_pending_ready; ?>
                <div class="card-body">
                    <h1 class="card-title"><?php echo $system_data["version"]; ?></h1>
                    <p class="card-text">Versiyon</p>
                </div>
            </div>
        </div>
        <div class="col-6 col-md-4 col-lg-3 mb-4">
            <div class="card text-center">
                <div class="card-body">
                    <h1 class="card-title"><?php echo phpversion(); ?></h1>
                    <p class="card-text">PHP</p>
                </div>
            </div>
        </div>
        <div class="col-6 col-md-4 col-lg-3 mb-4">
            <div class="card text-center">
                <div class="card-body">
                    <h1 class="card-title"><?php echo date("d/m"); ?></h1>
                    <p class="card-text">Tarih</p>
                </div>
            </div>
        </div>
        <div class="col-6 col-md-4 col-lg-3 mb-4">
            <div class="card text-center">
                <div class="card-body">
                    <h1 class="card-title"><?php echo date("H:i"); ?></h1>
                    <p class="card-text">Saat</p>
                </div>
            </div>
        </div>


    </div>
</div>
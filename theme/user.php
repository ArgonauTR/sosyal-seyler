<?php
// Yorumlar/Konular arasındaki geçişi hafızada tutar.
if (empty($_SESSION["select"])) {
    $_SESSION["select"] = "posts";
} else {
    if (isset($_GET["select"])) {
        if ($_GET["select"] == "posts") {
            $_SESSION["select"] = "posts";
        } else {
            $_SESSION["select"] = "comments";
        }
    }
}

// Kullanıcı verileri çekiliyor.
$nick = htmlspecialchars(strip_tags($_GET["user_nick"]));
$user = userinfo("SELECT * FROM users WHERE user_nick='$nick'");
$user_id = $user[0]["user_id"];

// Sayfalama için sayfa durum denetimi
if (empty($_GET["page"])) {
    $page = 1;
} else {
    $page = $_GET["page"];
}

// Sayfalama Değerleri
$limit = 10;
$start_limit = ($page * $limit) - $limit;

if ($_SESSION["select"] == "posts") {
    // Sayfalama için İşlem yapılıyor
    $count_post = postinfo("SELECT * FROM posts WHERE post_author_id='$user_id'");
    $page_count = ceil(count($count_post) / $limit);

    // Post verileri çekiliyor.
    $posts = postinfo("SELECT * FROM posts WHERE post_author_id='$user_id' ORDER BY post_id DESC LIMIT $start_limit,$limit");
} else {
    // Sayfalama için İşlem yapılıyor
    $count_post = postinfo("SELECT * FROM comments WHERE comment_author_id='$user_id'");
    $page_count = ceil(count($count_post) / $limit);

    // Yorum Verileri çekiliyor.
    $comments = commentinfo("SELECT * FROM comments WHERE comment_author_id='$user_id' ORDER BY comment_id DESC LIMIT $start_limit,$limit");
}


?>
    <div class="col-auto text-center">
        <img src="<?php echo $user[0]["user_image_url"]; ?>" class="rounded-circle" alt="User Avatar" width="150" height="150">
        <div class="h2"><?php echo $user[0]["user_nick"]; ?></div>
        <span><?php echo datetime($user[0]["user_create_time"]) . " aramıza katıldı."; ?></span>
        <div class="card mt-2">
            <div class="card-body"><?php echo nl2br($user[0]["user_bio"]); ?></div>
        </div>
        <ul class="nav justify-content-center nav-tabs mt-4">
            <li class="nav-item">
                <?php
                if ($_SESSION["select"] == "posts") {
                    echo '<a class="nav-link active" href="?select=posts"><i class="bi bi-pencil-square"></i> Konular</a>';
                } else {
                    echo '<a class="nav-link" href="?select=posts"><i class="bi bi-pencil-square"></i> Konular</a>';
                }
                ?>
            </li>
            <li class="nav-item">
                <?php
                if ($_SESSION["select"] == "comments") {
                    echo '<a class="nav-link active" href="?select=comments"><i class="bi bi-chat-square-text"></i> Yorumlar</a>';
                } else {
                    echo '<a class="nav-link" href="?select=comments"><i class="bi bi-chat-square-text"></i> Yorumlar</a>';
                }
                ?>
            </li>
        </ul>
    </div>
    <?php
    if ($_SESSION["select"] == "posts") {
        foreach ($posts as $post) {
            echo '
        <div class="clamp-text custom-card mt-2 p-1">
            <b class="text-decoration-none text-muted me-2"><i class="bi bi-eye me-1"></i>' . $post["post_wievs"] . '</b>
            <a href="' . $post["post_link"] . '" class="text-decoration-none text-muted">' . htmlspecialchars(strip_tags($post["post_title"])) . '</a>
        </div>
            ';
        }
    } else {
        foreach ($comments as $comment) {
            $comment_post_id = $comment["comment_post_id"];
            $comment_post_link = postinfo("SELECT * FROM posts WHERE post_id='$comment_post_id'");
            echo '
        <div class="clamp-text custom-card mt-2 p-1">
            <i class="bi bi-chat-left-dots me-1"></i>
            <a href="' . $comment_post_link[0]["post_link"] . '" class="text-decoration-none text-muted">' . htmlspecialchars(strip_tags($comment["comment_content"])) . '</a>
        </div>
            ';
        }
    }
    ?>
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
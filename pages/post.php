<?php
$post_id = htmlspecialchars(strip_tags($_GET["post_id"]));

// Yazı Okunma Sayısını Güncelliyor.
$db->prepare("UPDATE posts SET post_wievs = post_wievs + 1 WHERE post_id = ?")->execute([$post_id]);

// Post bilgilerini çekiyor.
$posts = postinfo("SELECT * FROM posts WHERE post_id=" . $post_id);

foreach ($posts as $post) {

    // Kullanıcı adı çekildi.
    $user = userinfo("SELECT * FROM users WHERE user_id=" . $post["post_author_id"]);

    // Kategori adı çeklidi.
    $category = categoryinfo("SELECT * FROM categories WHERE category_id=" . $post["post_category_id"]);
?>
    <div class="row">
        <div class="col-auto">
            <img src="<?php echo $user[0]["user_image_url"]; ?>" class="rounded-circle" alt="User Avatar" width="50" height="50">
        </div>
        <div class="col">
            <div class="h2"><?php echo $post['post_title'] ?></div>
            <a href="<?php echo $user[0]["user_url"]; ?>" class="text-decoration-none text-muted"><i class="bi bi-person ms-1"></i> <?php echo $user[0]["user_nick"]; ?></a>
            <a href="<?php echo $category[0]["category_link"]; ?>" class="text-decoration-none text-muted"><i class="bi bi-tag ms-1"></i> <?php echo $category[0]["category_title"]; ?></a>
            <i class="bi bi-clock-history ms-1"></i> <?php echo datetime($post['post_create_time']); ?>
            <i class="bi bi-eye ms-1"></i> <?php echo $post['post_wievs']; ?>
        </div>
    </div>
    <br>
    <div class="mb-5">
        <?php echo nl2br($post['post_content']); ?>
    </div>
<?php
}
if (isset($_SESSION["user_nick"])) { // üYE OLUP GİRİŞ YAPMIŞLAR FORMU GÖRÜR.
?>
    <div class="mb-3">
        <form method="POST" action="<?php echo $site_name . "/functions/comment.php"; ?>">
            <div class="mb-3">
                <input type="text" class="form-control" name="post_link" value="<?php echo $post['post_link'] ?>" hidden>
            </div>
            <div class="mb-3">
                <input type="text" class="form-control" name="post_id" value="<?php echo $post['post_id'] ?>" hidden>
            </div>
            <div class="mb-3">
                <textarea class="form-control" name="post_comment" placeholder="<?php echo $_SESSION["user_nick"] . " olarak yorum yap."; ?>" rows="3" required></textarea>
            </div>
            <div class="form-group mt-4 d-grid gap-2 col-6 mx-auto text-center">
                <button type="submit" class="btn btn-outline-secondary" name="new_comment">
                    <i class="bi bi-send"></i> Yorum Yap
                </button>
            </div>
        </form>
    </div>
<?php
} else { // GİRİŞ YAPMAYANLAR VERİ GÖNDERİLMEYEN BOŞ VORMU GÖRÜRÜR.
?>
    <div class="mb-3">
        <form>
            <div class="mb-3">
                <textarea class="form-control" placeholder="Ne düşünüyosun?" rows="3" required></textarea>
            </div>
            <div class="form-group mt-4 d-grid gap-2 col-6 mx-auto text-center">
                <button type="submit" class="btn btn-outline-secondary disabled">
                    <i class="bi bi-send-x"></i> Önce Üye Olun
                </button>
            </div>
        </form>
    </div>
<?php
}
?>
<!--- Reklam Alanı -->
<?php
if (adinfo("ad_post_page")) {
    echo adinfo("ad_post_page");
}
?>

<?php


if (isset($_SESSION["user_nick"])) {  // Giriş yapmış kullanıcılar.
    $comments = commentinfo("SELECT * FROM comments WHERE comment_parent_id IS NULL AND comment_post_id=" . $post_id . " ORDER BY comment_id ASC");
} else {
    $comments = commentinfo("SELECT * FROM comments WHERE comment_parent_id IS NULL AND comment_status='publish' && comment_post_id=" . $post_id . " ORDER BY comment_id ASC");
}
foreach ($comments as $comment) {

    $users = userinfo("SELECT * FROM users WHERE user_id=" . $comment['comment_author_id']);
    foreach ($users as $user) {
?>
        <div class="">
            <hr class="my-3">
            <div class="row">
                <div class="col-auto">
                    <img src="<?php echo $user["user_image_url"]; ?>" class="rounded-circle" alt="User Avatar" width="50" height="50">
                </div>
                <div class="col">
                    <a href="<?php echo $user["user_url"]; ?>" class="text-decoration-none text-muted">
                        <div class="h5"><?php echo $user["user_nick"]; ?></div>
                    </a>
                    <i class="bi bi-clock"></i> <?php echo datetime($comment["comment_create_time"]); ?>
                </div>
            </div>
            <br>
            <div class="mb-3">
                <?php echo nl2br($comment['comment_content']); ?>
                <div class="d-flex justify-content-end">
                    <a href="#" class="text-decoration-none text-muted" data-bs-toggle="collapse" data-bs-target="<?php echo '#reply' . $comment["comment_id"]; ?>" aria-expanded="false">
                        <i class="bi bi-reply-all me-2"></i> Cevapla
                    </a>
                </div>
            </div>
            <div class="collapse" id="<?php echo 'reply' . $comment["comment_id"]; ?>">
                <?php
                // CEVAP KISMININ BAŞLADIĞI YER
                if (isset($_SESSION["user_nick"])) { // üYE OLUP GİRİŞ YAPMIŞLAR FORMU GÖRÜR.
                ?>
                    <form method="POST" action="<?php echo $site_name . "/functions/comment.php"; ?>">

                        <input type="text" class="form-control" name="post_link" value="<?php echo $post['post_link'] ?>" hidden>
                        <input type="text" class="form-control" name="post_id" value="<?php echo $post['post_id'] ?>" hidden>
                        <input type="text" class="form-control" name="comment_parent_id" value="<?php echo $comment['comment_id'] ?>" hidden>

                        <div class="input-group mb-1">
                            <input type="text" class="form-control" name="post_comment" placeholder="<?php echo $_SESSION["user_nick"] . " olarak cevap ver."; ?>" required>
                            <button class="btn btn-outline-secondary" type="submint" name="new_reply">
                                <i class="bi bi-send"></i>
                            </button>
                        </div>

                    </form>
                <?php
                } else { // GİRİŞ YAPMAYANLAR VERİ GÖNDERİLMEYEN BOŞ VORMU GÖRÜRÜR.
                ?>
                    <form>
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Önce üye olun.">
                            <button class="btn btn-outline-secondary" type="button">
                                <i class="bi bi-send-x"></i>
                            </button>
                        </div>
                    </form>
                <?php
                }
                // CEVAP KISMININ BTTİĞİ YER
                ?>
            </div>
            <?php
            $parent_id = $comment["comment_id"];
            if (isset($_SESSION["user_nick"])) {  // Giriş yapmış kullanıcılar.
                $replys = commentinfo("SELECT * FROM comments WHERE comment_parent_id=$parent_id AND comment_post_id=$post_id ORDER BY comment_id ASC");
            } else {
                $replys = commentinfo("SELECT * FROM comments WHERE comment_parent_id= $parent_id AND comment_status='publish' AND comment_post_id= $post_id ORDER BY comment_id ASC");
            }
            foreach ($replys as $reply) {

                $users = userinfo("SELECT * FROM users WHERE user_id=" . $reply['comment_author_id']);
                foreach ($users as $user) {
            ?>
                    <div class="ms-5 mb-5">
                        <div class="row">
                            <div class="col-auto">
                                <img src="<?php echo $user["user_image_url"]; ?>" class="rounded-circle" alt="User Avatar" width="50" height="50">
                            </div>
                            <div class="col">
                                <a href="<?php echo $user["user_url"]; ?>" class="text-decoration-none text-muted">
                                    <div class="h5"><?php echo $user["user_nick"]; ?></div>
                                </a>
                                <i class="bi bi-clock"></i> <?php echo datetime($reply["comment_create_time"]); ?>
                            </div>
                        </div>
                        <br>
                        <div class="mb-3">
                            <?php echo nl2br($reply['comment_content']); ?>
                        </div>

                    </div>
            <?php
                }
            }
            ?>
        </div>
<?php }
} ?>
<?php
// Rastgele ROBOT kullanıcı seçiliyor.
$user = userinfo("SELECT * FROM users WHERE user_role='robot' ORDER BY RAND() LIMIT 1");
$user_id = $user[0]["user_id"];


// Seçilmiş olan kullanıcının atmadığı bir post seçiliyor.
$post = postinfo("SELECT * FROM posts WHERE post_author_id != '$user_id' ORDER BY RAND() LIMIT 1");

// Seçilen konudaki Kullanıcı adı alınıyor.
$post_author_name = userinfo("SELECT * FROM users WHERE user_id=" . $post[0]["post_author_id"]);

// Yorum yapılacak kullanıcı seçiliyor.
$comment_user = userinfo("SELECT * FROM users WHERE user_role='robot' AND user_id != '$user_id' ORDER BY RAND() LIMIT 1");
$author_id = $comment_user[0]["user_id"];
$author_name = $comment_user[0]["user_nick"];

?>
<div class="col-12 col-lg-9">
    <div class="card">
        <div class="card-header">
            <i class="bi bi-chat-left-quote"></i> Robot Yorum
        </div>
        <div class="card-body">
            <h2 class="clamp-text mb-3"><?php echo $post[0]["post_title"]; ?></h2>
            <form method="POST" action="<?php echo $site_name . "/admin/functions/robot-comment.php"; ?>">
                <div class="mb-3">
                    <textarea class="form-control" name="comment_content" rows="5" placeholder="<?php echo $author_name . ' yazıyor...'; ?>" required></textarea>
                </div>
                <div class="mb-3 mt-4">
                    <input type="text" class="form-control" name="comment_author_id" value="<?php echo $author_id ?>" hidden>
                </div>
                <div class="mb-3 mt-4">
                    <input type="text" class="form-control" name="comment_post_id" value="<?php echo $post[0]["post_id"] ?>" hidden>
                </div>
                <div class="form-group mt-4 d-grid gap-2 col-6 mx-auto text-center">
                    <button type="submit" class="btn btn-outline-secondary" name="new_comment">
                        <i class="bi bi-send"></i> Gönder
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
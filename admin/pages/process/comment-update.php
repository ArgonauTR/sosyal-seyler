<?php
$id = $_GET["id"];
$comments = commentinfo("SELECT * FROM comments WHERE comment_id=" . $id);
$users = userinfo("SELECT * FROM users WHERE user_id=" . $comments[0]["comment_author_id"]);
$posts = postinfo("SELECT * FROM posts WHERE post_id=" . $comments[0]["comment_post_id"]);
$categoriyes = categoryinfo("SELECT * FROM categories WHERE category_id=" . $posts[0]["post_category_id"]);
?>
<div class="col-12 col-lg-9">
    <div class="card">
        <div class="card-header">
            <?php echo '<i class="bi bi-person"></i> ' . $users[0]["user_nick"] . '  >> <i class="bi bi-grid"></i> ' . $categoriyes[0]["category_title"]; ?>
            <hr>
            <b>Konu Başlığı: </b><?php echo $posts[0]["post_title"]; ?>
        </div>
        <div class="card-body">
            <form method="POST" action="<?php echo $site_name . "/admin/functions/comment-update.php"; ?>">
                <div class="mb-3">
                    <input type="text" class="form-control" name="comment_id" value="<?php echo $comments[0]["comment_id"] ?>" hidden>
                </div>
                <div class="mb-3">
                    <textarea class="form-control" name="comment_content" rows="5" required><?php echo $comments[0]["comment_content"]; ?></textarea>
                </div>
                <div class="form-group mt-4 d-grid gap-2 col-6 mx-auto text-center">
                    <button type="submit" class="btn btn-outline-secondary" name="comment_update">
                        <i class="bi bi-pen"></i> Güncelle
                    </button>
                </div>
            </form>
        </div>
        <div class="card-footer mt-5 text-center">
        <a href="/admin/functions/comment-status.php?comment_id=<?php echo $id; ?>&status=publish" class="btn"><i class="bi bi-check2-square"></i> Onayla</a>
        <a href="/admin/functions/comment-status.php?comment_id=<?php echo $id; ?>&status=draft" class="btn"><i class="bi bi-x-square"></i> Askıya Al </a>
        <a href="functions/comment-delete.php?comment_id=<?php echo $id; ?>" class="btn"><i class="bi bi-trash"></i> Sil </a>
        </div>
    </div>
</div>
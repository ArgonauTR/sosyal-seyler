<div class="mb-2">
    <div class="d-flex justify-content-end">
        <a href="#" class="text-decoration-none text-muted" data-bs-toggle="collapse" data-bs-target="<?php echo '#reply' . $comment["comment_id"]; ?>" aria-expanded="false">
            <i class="bi bi-reply-all me-2"></i> Cevapla
        </a>
    </div>
</div>
<div class="collapse" id="<?php echo 'reply' . $comment["comment_id"]; ?>">
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
</div>
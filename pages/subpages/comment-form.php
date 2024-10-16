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
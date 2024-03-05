<form method="POST" action="../functions/comment.php">
<div class="form-group">
        <input type="text" class="form-control bg-dark text-white" name="comment_parent_id" value="<?php echo $comment_id; ?>" hidden>
    </div>
    <div class="form-group">
        <input type="text" class="form-control bg-dark text-white" name="post_id" value="<?php echo $post_id; ?>" hidden>
    </div>
    <div class="form-group">
        <input type="text" class="form-control bg-dark text-white" name="post_link" value="<?php echo $post_link; ?>" hidden>
    </div>
    <div class="form-group">
        <input type="text" class="form-control bg-dark text-white" name="comment_author_name" placeholder="Adınızı girin" required>
    </div>
    <div class="form-group mt-2">
        <textarea class="form-control bg-dark text-white" name="comment_content" rows="4" placeholder="Yorumunuzu buraya yazın" required></textarea>
    </div>
    <div class="form-group mt-2 d-grid gap-2 col-6 mx-auto text-center">
        <button type="submit" name="anonymouscomment" class="btn btn-outline-white text-white border-white">Gönder</button>
    </div>
</form>
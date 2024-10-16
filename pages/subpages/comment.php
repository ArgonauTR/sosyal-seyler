<hr class="my-3">
<div class="d-flex justify-content-between">
    <div class="row">
        <div class="col-auto">
            <img src="<?php echo $user[0]["user_image_url"]; ?>" class="rounded-circle" alt="User Avatar" width="30" height="30">
        </div>
        <div class="col">
            <a href="<?php echo $user[0]["user_url"]; ?>" class="text-decoration-none text-muted">
                <div class="h5"><?php echo $user[0]["user_nick"]; ?></div>
            </a>
        </div>
    </div>
    <div class="">
        <i class="bi bi-clock"></i> <?php echo datetime($comment["comment_create_time"]); ?>
    </div>
</div>
<?php echo nl2br($comment['comment_content']); ?>
<br>
<br>
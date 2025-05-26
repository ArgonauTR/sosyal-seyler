<hr class="my-3">
<div class="d-flex justify-content-between align-items-center mb-2" itemscope itemtype="http://schema.org/UserComments">
    <div class="d-flex align-items-center" itemprop="creator" itemscope itemtype="http://schema.org/Person">
        <img src="<?php echo $user_image_url ?>"
             class="rounded-circle me-2"
             alt="User Avatar"
             width="30"
             height="30"
             itemprop="image">
        <a href="<?php echo $user_url ?>"
           class="text-decoration-none text-muted"
           itemprop="url">
            <div class="h5 mb-0" itemprop="name">
                <?php echo $user_nick ?>
            </div>
        </a>
    </div>
    <div class="text-muted small">
        <i class="bi bi-clock me-1"></i>
        <time datetime="<?php echo $time_comment_create_time ?>"
              itemprop="commentTime">
            <?php echo $comment_create_time ?>
        </time>
    </div>
</div>
<div itemprop="commentText mb-5">
    <?php echo $comment_content ?>
</div>

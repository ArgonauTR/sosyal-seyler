<div class="ms-5 mb-5" itemprop="comment" itemscope itemtype="http://schema.org/UserComments">
    <div class="d-flex justify-content-between align-items-center mb-2">
        <div class="d-flex align-items-center" itemprop="creator" itemscope itemtype="http://schema.org/Person">
            <img src="<?php echo $reply_user_image_url; ?>"
                 class="rounded-circle me-2"
                 alt="User Avatar"
                 width="30"
                 height="30"
                 itemprop="image">
            <a href="<?php echo $reply_user_url ?>"
               class="text-decoration-none text-muted"
               itemprop="url">
                <div class="h5 mb-0" itemprop="name">
                    <?php echo $reply_user_nick; ?>
                </div>
            </a>
        </div>
        <div class="text-muted small">
            <i class="bi bi-clock me-1"></i>
            <time datetime="<?php echo $reply_shema_date_time ?>"
                  itemprop="commentTime">
                <?php echo $reply_date_time ?>
            </time>
        </div>
    </div>
    <div class="mb-3" itemprop="commentText">
        <?php echo $reply_comment_content ?>
    </div>
</div>
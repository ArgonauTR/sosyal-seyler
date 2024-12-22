<div class="ms-5 mb-5" itemprop="comment" itemscope itemtype="http://schema.org/UserComments">
    <div class="d-flex justify-content-between">
        <!-- Yorum Yapan Kullanıcı Bilgileri -->
        <div class="row" itemprop="creator" itemscope itemtype="http://schema.org/Person">
            <div class="col-auto">
                <img src="<?php echo $user[0]["user_image_url"]; ?>" 
                     class="rounded-circle" 
                     alt="User Avatar" 
                     width="30" 
                     height="30" 
                     itemprop="image">
            </div>
            <div class="col">
                <a href="<?php echo $user[0]["user_url"]; ?>" 
                   class="text-decoration-none text-muted" 
                   itemprop="url">
                    <div class="h5" itemprop="name">
                        <?php echo $user[0]["user_nick"]; ?>
                    </div>
                </a>
            </div>
        </div>
        <!-- Yorum Zamanı -->
        <div>
            <i class="bi bi-clock"></i> 
            <time datetime="<?php echo date('c', strtotime($reply['comment_create_time'])); ?>" 
                  itemprop="commentTime">
                <?php echo datetime($reply["comment_create_time"]); ?>
            </time>
        </div>
    </div>
    <!-- Yorum Metni -->
    <div class="mb-3" itemprop="commentText">
        <?php echo nl2br($reply['comment_content']); ?>
    </div>
</div>

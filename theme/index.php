<div class="row align-items-center mb-3 pb-2 border-bottom">
    <div class="col-auto">
        <a href="<?php echo $user_url; ?>">
            <img src="<?php echo $user_img_url; ?>" class="rounded-circle" alt="User Avatar" width="50" height="50">
        </a>
    </div>
    <div class="col">
        <div class="h5 mb-1 clamp-text">
            <a href="<?php echo $post['post_link'] ?>" class="text-decoration-none text-body fw-bold">
                <?php echo $post['post_title'] ?>
            </a>
        </div>
        <div class="text-muted small clamp-text">
            <a href="<?php echo $user_url; ?>" class="text-decoration-none text-muted me-2">
                <i class="bi bi-person me-1"></i><?php echo $user_nick; ?>
            </a>
            <a href="<?php echo $category_link; ?>" class="text-decoration-none text-muted me-2">
                <i class="bi bi-tag me-1"></i><?php echo $category_title; ?>
            </a>
            <span class="d-inline-block mt-1 mt-sm-0">
                <i class="bi bi-clock-history me-1"></i> <?php echo $post_create_time; ?>
            </span>
        </div>
    </div>
</div>
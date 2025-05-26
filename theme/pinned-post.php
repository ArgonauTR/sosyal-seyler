<div class="card mb-4 border-primary shadow-sm">
    <div class="card-body">
        <div class="d-flex align-items-center">
            <div class="flex-shrink-0 position-relative me-3">
                <a href="<?php echo $pin_user_url ?>">
                    <img src="<?php echo $pin_user_image_url ?>" class="rounded-circle" alt="User Avatar" width="50" height="50">
                </a>
            </div>
            <div class="flex-grow-1">
                <h5 class="card-title mb-1 clamp-text">
                    <a href="<?php echo $pin_post_link ?>" class="text-decoration-none text-body fw-bold">
                        <?php echo $pin_post_title ?>
                    </a>
                </h5>
                <p class="card-text text-muted small mb-0 clamp-text">
                    <a href="<?php echo $pin_user_url ?>" class="text-decoration-none text-muted me-2">
                        <i class="bi bi-person me-1"></i><?php echo $pin_user_nick ?>
                    </a>
                    <a href="<?php echo $pin_category_link ?>" class="text-decoration-none text-muted me-2">
                        <i class="bi bi-tag me-1"></i><?php echo $pin_category_title ?>
                    </a>
                    <i class="bi bi-clock-history me-1"></i> <?php echo datetime($post[0]['post_create_time']); ?>
                </p>
            </div>
        </div>
    </div>
</div>
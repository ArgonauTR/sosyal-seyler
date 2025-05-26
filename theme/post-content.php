<div class="row align-items-center mb-3">
    <div class="col-auto me-3">
        <a href="<?php echo $user_url ?>" class="d-block">
            <img src="<?php echo $user_image_url ?>" class="rounded-circle shadow-sm" alt="User Avatar" width="50" height="50">
        </a>
    </div>
    <div class="col">
        <div class="d-flex justify-content-between align-items-center">
            <h1 class="h4 mb-1">
                <a href="#" class="text-decoration-none text-body fw-bold"><?php echo $post_title ?></a>
            </h1>
            <div class="dropdown">
                <button class="btn btn-link tex-body p-0" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi bi-share"></i>
                </button>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton1">
                    <li>
                        <a class="dropdown-item" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $post_link ?>">
                            <i class="bi bi-facebook"></i> Facebook
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="https://twitter.com/intent/tweet?url=<?php echo $post_link ?>&text=<?php echo htmlspecialchars(strip_tags($post_content)) ?>&hashtags=<?php echo $category_title ?>">
                            <i class="bi bi-twitter-x"></i> X.com
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="https://www.linkedin.com/sharing/share-offsite/?url=<?php echo $post_link ?>">
                            <i class="bi bi-linkedin"></i> Linkedin
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="https://api.whatsapp.com/send?text=<?php echo $post_title ?>%20<?php echo $post_link ?>">
                            <i class="bi bi-whatsapp"></i> Whatsapp
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="https://t.me/share/url?url=<?php echo $post_link ?>&text=<?php echo $post_title ?>">
                            <i class="bi bi-telegram"></i> Telegram
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="text-muted small">
            <a href="<?php echo $user_url ?>" class="text-decoration-none text-muted me-3">
                <i class="bi bi-person-fill me-1"></i><?php echo $user_nick ?>
            </a>
            <a href="<?php echo $category_link ?>" class="text-decoration-none text-muted me-3">
                <i class="bi bi-tags-fill me-1"></i><?php echo $category_title ?>
            </a>
            <span class="me-3">
                <i class="bi bi-clock me-1"></i><?php echo $post_create_time ?>
            </span>
            <span>
                <i class="bi bi-eye-fill me-1"></i><?php echo $post_wievs ?>
            </span>
        </div>
    </div>
</div>

<div class="mb-5">
    <?php echo $post_content ?>
</div>
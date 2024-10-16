    <div class="row">
        <div class="col-auto">
            <img src="<?php echo $user[0]["user_image_url"]; ?>" class="rounded-circle" alt="User Avatar" width="50" height="50">
        </div>
        <div class="col">
            <div class="h2"><?php echo $post['post_title'] ?></div>
            <a href="<?php echo $user[0]["user_url"]; ?>" class="text-decoration-none text-muted"><i class="bi bi-person ms-1"></i> <?php echo $user[0]["user_nick"]; ?></a>
            <a href="<?php echo $category[0]["category_link"]; ?>" class="text-decoration-none text-muted"><i class="bi bi-tag ms-1"></i> <?php echo $category[0]["category_title"]; ?></a>
            <i class="bi bi-clock-history ms-1"></i> <?php echo datetime($post['post_create_time']); ?>
            <i class="bi bi-eye ms-1"></i> <?php echo $post['post_wievs']; ?>
        </div>
    </div>
    <br>
    <div class="mb-5">
        <?php echo nl2br($post['post_content']); ?>
    </div>
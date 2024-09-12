<?php
// Sabit yazı ID si alınıyor.
$pinned_id = optioninfo("option_fixed_top");

$post = postinfo("SELECT * FROM posts WHERE post_id=" . $pinned_id);


// Kullanıcı adı çekildi.
$user = userinfo("SELECT * FROM users WHERE user_id=" . $post[0]["post_author_id"]);

// Kategori adı çeklidi.
$category = categoryinfo("SELECT * FROM categories WHERE category_id=" . $post[0]["post_category_id"]);
?>
<div class="row">
    <div class="col-auto position-relative">
        <img src="<?php echo $user[0]["user_image_url"]; ?>" class="rounded-circle" alt="User Avatar" width="50" height="50">
        <span class="position-absolute top-0 start-100 translate-middle text-danger">
            <span class="visually">
                <i class="bi bi-pin-angle-fill"></i>
            </span>
        </span>
    </div>
    <div class="col">
        <div class="h3 clamp-text">
            <a href="<?php echo $post[0]['post_link'] ?>" class="text-decoration-none text-muted"><?php echo $post[0]['post_title'] ?></a>
        </div>
        <div class="clamp-text">
            <?php echo '<a href="' . $user[0]["user_url"] . '" class="text-decoration-none text-muted"><i class="bi bi-person ms-1 me-1"></i>' . $user[0]["user_nick"] . '</a>'; ?>
            <?php echo '<a href="' . $category[0]["category_link"] . '" class="text-decoration-none text-muted"><i class="bi bi-tag ms-1 me-1"></i>' . $category[0]["category_title"] . '</a>'; ?>
            <i class="bi bi-clock-history ms-1"></i> <?php echo datetime($post[0]['post_create_time']); ?>
        </div>
    </div>
</div>
<hr>
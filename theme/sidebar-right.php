<!--- Reklam Alanı -->
<?php
if (adinfo("ad_footer")) {
    echo adinfo("ad_footer");
}
?>
</div>

<div class="col-3 d-none d-lg-block">
    <?php
    $comments = commentinfo("SELECT * FROM comments WHERE comment_status = 'publish' ORDER BY comment_id DESC LIMIT 5");
    foreach ($comments as $comment) {
        $post = postinfo("SELECT * FROM posts WHERE post_id=" . $comment["comment_post_id"]);
        $user = userinfo("SELECT * FROM users WHERE user_id=" . $comment["comment_author_id"]);
        $category = categoryinfo("SELECT * FROM categories WHERE category_id=" . $post[0]["post_category_id"]);

        // Değişkenler hazırlanıyor.
        $post_link = $post[0]["post_link"];
        $user_nick = $user[0]["user_nick"];
        $category_title = $category[0]["category_title"];
        $comment_content = $comment["comment_content"];
    ?>
        <div class="card mb-3">
            <a href="<?php echo $post_link ?>" class="stretched-link"></a>
            <div class="card-header">
                <i class="bi bi-person"></i><?php echo $user_nick ?>
                <i class="bi bi-arrow-right"></i>
                <i class="bi bi-tag"></i><?php echo $category_title ?>
            </div>
            <div class="card-body">
                <?php echo $comment_content  ?>
            </div>
        </div>
    <?php
    }
    ?>
</div>
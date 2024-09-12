<!--- Reklam Alanı -->
<?php
if (adinfo("ad_footer")) {
    echo adinfo("ad_footer");
}
?>
</div>

<div class="col-3 d-none d-lg-block">
    <?php
    $comments = commentinfo("SELECT * FROM comments WHERE comment_status = 'publish' ORDER BY comment_id DESC LIMIT 10");
    foreach ($comments as $comment) {
        $post = postinfo("SELECT * FROM posts WHERE post_id=" . $comment["comment_post_id"]);
    ?>
        <div class="rounded-start-pill border border-2 p-3 ms-5 mb-2 custom-card">
            <div class="clamp-text">
                <i class="bi bi-chat-dots me-1"></i>
                <a class="text-decoration-none text-muted " href="<?php echo $post[0]["post_link"]; ?>"><?php echo $comment["comment_content"]; ?></a>
            </div>
        </div>
    <?php
    }
    ?>
</div>
</div>
</div>
</body>
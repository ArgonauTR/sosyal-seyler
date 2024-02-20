<style>
    .clamp-text {
        display: -webkit-box;
        -webkit-box-orient: vertical;
        overflow: hidden;
        -webkit-line-clamp: 1;
    }

    .custom-card {
        transition: box-shadow 0.3s, border-color 0.3s;
    }

    .custom-card:hover {
        box-shadow: 0 4px 8px rgba(255, 255, 255, 0.5);
    }
</style>

<div class="m-3">
    <?php
    $post_author_id = $_SESSION["user_id"];
    $postask = $db->prepare("SELECT * FROM posts WHERE post_status='publish' && post_author_id=$post_author_id ORDER BY post_id DESC");
    $postask->execute(array());
    while ($postfetch = $postask->fetch(PDO::FETCH_ASSOC)) {
    ?>
        <div class="d-flex justify-content-between p-2 mt-2 custom-card">
            <div class="clamp-text">
                <b class="me-2">
                    <i class="bi bi-eye me-1"></i>
                    <?php echo $postfetch["post_wievs"]; ?>
                </b>
                <a href="<?php echo $postfetch["post_link"]; ?>" class="text-white ms-2" style="text-decoration: none;">
                    <i class="bi bi-pencil-square me-1"></i>
                    <?php echo $postfetch["post_title"]; ?>
                </a>
            </div>
        </div>
    <?php
    }
    ?>
</div>
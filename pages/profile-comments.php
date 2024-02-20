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
    $session_id = $_SESSION["user_id"];
    $commentask = $db->prepare("SELECT * FROM comments WHERE comment_author_id=$session_id");
    $commentask->execute(array());
    while ($commentfetch = $commentask->fetch(PDO::FETCH_ASSOC)) {
    ?>
        <div class="d-flex justify-content-between p-2 mt-2 custom-card">
            <div class="clamp-text">
                <a href="#" class="text-white" style="text-decoration: none;">
                    <i class="bi bi-chat-left-dots me-1"></i>
                    <?php echo $commentfetch["comment_content"] ?>
                </a>
            </div>
        </div>
    <?php
    }
    ?>
</div>
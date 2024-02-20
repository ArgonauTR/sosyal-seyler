<div class="col-lg-9">
    <div class="card bg-dark text-white">
        <div class="card-body">
            <div class="card-header">
                <i class="bi bi-arrow-clockwise me-1"></i>
                YORUM GÜNCELLE
            </div>
            <div class="card-body">
                <?php
                $comment_id = $_GET["comment_id"];
                $commentask = $db->prepare("SELECT * FROM comments WHERE comment_id=:id");
                $commentask->execute(array('id' => $comment_id));
                while ($commentfetch = $commentask->fetch(PDO::FETCH_ASSOC)) {

                    $comment_id = $commentfetch["comment_id"];
                    $comment_post_id = $commentfetch["comment_post_id"];
                    $comment_author_id = $commentfetch["comment_author_id"];
                    $comment_author_name = $commentfetch["comment_author_name"];
                    $comment_content = $commentfetch["comment_content"];

                    if (isset($comment_author_id)) {
                        //Yazar Adını Çekiyor.
                        $user_id = $comment_author_id;
                        $userask = $db->prepare("SELECT * FROM users WHERE user_id=:id");
                        $userask->execute(array('id' => $user_id));
                        while ($userfetch = $userask->fetch(PDO::FETCH_ASSOC)) {
                            $usernick = $userfetch["user_nick"];
                            $comment_author_name = $usernick;
                        }
                    } else {
                        $comment_author_name = $commentfetch["comment_author_name"];
                    }

                }

                ?>
                <form action="./functions/comment-update.php" method="POST" enctype="multipart/form-data">

                    <div class="mb-3">
                        <input type="text" class="form-control bg-dark text-white" name="comment_id" value="<?php echo $comment_id; ?>" hidden>
                    </div>

                    <div class="mb-3 h4">
                        <?php echo "\"".$comment_author_name."\" kişisinin yorumunu düzenliyorsun"; ?>
                    </div>

                    <div class="mb-3">
                        <textarea class="form-control bg-dark text-white" rows="3" name="comment_content" required><?php echo $comment_content; ?></textarea>
                    </div>

                    <div class="mb-3 text-center">
                        <button type="submit" class="btn btn-primary" name="comment_update">Kaydet & Güncelle</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
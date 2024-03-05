<style>
    .max-image {
        max-width: 30px;
        max-height: 30px;
        border-radius: 100%;
        /* Kareyi daireye dönüştürmek için %50 border-radius kullanılır */
        border: 2px solid #000;
        /* İsteğe bağlı: Kenarlık ekleyebilirsiniz */
        object-fit: cover;
        /* İsteğe bağlı: Resmi daire içine sığdırmak için */
    }
</style>
<?php
$commentask = $db->prepare("SELECT * FROM comments WHERE comment_status='publish' && comment_parent_id IS NULL && comment_post_id=$post_id ORDER BY comment_id DESC");
$commentask->execute(array());
while ($commentfetch = $commentask->fetch(PDO::FETCH_ASSOC)) {
    $comment_id = $commentfetch["comment_id"];
    $comment_content = $commentfetch["comment_content"];
    $comment_time = $commentfetch["comment_time"];
    $comment_author_id = $commentfetch["comment_author_id"];
    $comment_parent_id = $commentfetch["comment_parent_id"];

    $image_link = null;
    if (isset($comment_author_id)) {
        //Yazar Adını Çekiyor.
        $post_author_id = $comment_author_id;
        $userask = $db->prepare("SELECT * FROM users WHERE user_id=:id");
        $userask->execute(array('id' => $post_author_id));
        while ($userfetch = $userask->fetch(PDO::FETCH_ASSOC)) {
            $usernick = '<i class="bi bi-check2-circle text-success"></i> ' . $userfetch["user_name"];
            $comment_author_name = $usernick;
            $user_image_id = $userfetch["user_image"];
        }
        //Resim Yolunu Çekiyor
        $post_thumbnail_id = $user_image_id;
        $imageask = $db->prepare("SELECT * FROM images WHERE image_id=:id");
        $imageask->execute(array('id' => $post_thumbnail_id));
        while ($imagefetch = $imageask->fetch(PDO::FETCH_ASSOC)) {
            $image_id = $imagefetch["image_id"];
            $image_title = $imagefetch["image_title"];
            $image_link = $imagefetch["image_link"];
        }
    } else {
        $comment_author_name = $commentfetch["comment_author_name"];
    }
?>
    <div class="card-footer">
        <div class="d-flex inline align-items-center">
            <?php
            if (isset($image_link)) {
                echo '<img class="img-fluid rounded float-start border-white mt-2 mb-2 max-image" src="' . $image_link . '" />';
            } else {
                echo '<i class="bi bi-person-circle me-2"></i>';
            }
            ?>
            <h4><?php echo $comment_author_name; ?></h4>
            <span class="ms-2"><i>(<?php echo parcala($comment_time); ?>)</i></span>
        </div>
        <?php echo nl2br($comment_content); ?>
        <br>
        <a href="" class="text-white ms-3" style="text-decoration: none;" data-bs-toggle="collapse" data-bs-target="<?php echo "#col" . $comment_id; ?>" aria-expanded="false" aria-controls="collapseExample">
            <i class="bi bi-reply me-2"></i>
            Cevapla
        </a>
        <div class="collapse" id="<?php echo "col" . $comment_id; ?>">
            <div class="card card-body bg-dark border-white">
            <?php
                if (isset($_SESSION["user_role"])) {
                    include "answer-form-user.php";
                }else{
                    include "answer-form-anonim.php";
                }
            ?>
            </div>

        </div>
        <?php
        $answerask = $db->prepare("SELECT * FROM comments WHERE comment_status='publish' && comment_post_id=$post_id && comment_parent_id=$comment_id ORDER BY comment_id ASC");
        $answerask->execute(array());
        while ($answerfetch = $answerask->fetch(PDO::FETCH_ASSOC)) {

            $answer_id = $answerfetch["comment_id"];
            $answer_content = $answerfetch["comment_content"];
            $answer_time = $answerfetch["comment_time"];
            $answer_author_id = $answerfetch["comment_author_id"];
            $answer_parent_id = $answerfetch["comment_parent_id"];

            $image_link = null;
            if (isset($answer_author_id)) {
                //Yazar Adını Çekiyor.
                $post_author_id = $answer_author_id;
                $userask = $db->prepare("SELECT * FROM users WHERE user_id=:id");
                $userask->execute(array('id' => $post_author_id));
                while ($userfetch = $userask->fetch(PDO::FETCH_ASSOC)) {
                    $usernick = '<i class="bi bi-check2-circle text-success"></i> ' . $userfetch["user_name"];
                    $answer_author_name = $usernick;
                    $user_image_id = $userfetch["user_image"];
                }
                //Resim Yolunu Çekiyor
                $post_thumbnail_id = $user_image_id;
                $imageask = $db->prepare("SELECT * FROM images WHERE image_id=:id");
                $imageask->execute(array('id' => $post_thumbnail_id));
                while ($imagefetch = $imageask->fetch(PDO::FETCH_ASSOC)) {
                    $image_id = $imagefetch["image_id"];
                    $image_title = $imagefetch["image_title"];
                    $image_link = $imagefetch["image_link"];
                }
            } else {
                $answer_author_name = $answerfetch["comment_author_name"];
            }
        ?>
            <div class="ms-5">
                <div class="d-flex inline align-items-center">
                    <?php
                    if (isset($image_link)) {
                        echo '<img class="img-fluid rounded float-start border-white mt-2 mb-2 max-image" src="' . $image_link . '" />';
                    } else {
                        echo '<i class="bi bi-person-circle me-2"></i>';
                    }
                    ?>
                    <h4><?php echo $answer_author_name; ?></h4>
                    <span class="ms-2"><i>(<?php echo parcala($comment_time); ?>)</i></span>
                </div>
                <?php echo nl2br($answer_content); ?>
            </div>
        <?php
        }
        ?>
    </div>
<?php
}
?>
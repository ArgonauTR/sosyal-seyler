<?php
$commentask = $db->prepare("SELECT * FROM comments WHERE comment_status='publish' && comment_post_id=$post_id ORDER BY comment_id DESC");
$commentask->execute(array());
while ($commentfetch = $commentask->fetch(PDO::FETCH_ASSOC)) {
    $comment_content = $commentfetch["comment_content"];
    $comment_time = $commentfetch["comment_time"];
    $comment_author_id = $commentfetch["comment_author_id"];

    $image_link = null;
    if (isset($comment_author_id)) {
        //Yazar Adını Çekiyor.
        $post_author_id = $comment_author_id;
        $userask = $db->prepare("SELECT * FROM users WHERE user_id=:id");
        $userask->execute(array('id' => $post_author_id));
        while ($userfetch = $userask->fetch(PDO::FETCH_ASSOC)) {
            $usernick = '<i class="bi bi-check2-circle text-success"></i> '.$userfetch["user_name"];
            $comment_author_name = $usernick;
            $user_image_id=$userfetch["user_image"];

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
        <div class="row">
            <div class="col-2  d-flex justify-content-center">
                <?php
                if (isset($image_link)) {
                    echo '<img class="img-fluid rounded float-start border-white mt-2 mb-2" src="' . $image_link . '" />';
                } else {
                    echo '<i class="bi bi-person-circle h1 me-2"></i>';
                }
                ?>
            </div>
            <div class="col-10 mt-2">
                <div class="d-flex inline align-items-center">
                    <h4><?php echo $comment_author_name; ?></h4>
                    <span class="ms-2"><i>(<?php echo parcala($comment_time); ?>)</i></span>
                </div>
                <?php echo nl2br($comment_content); ?>
            </div>
        </div>
    </div>

<?php
}
?>
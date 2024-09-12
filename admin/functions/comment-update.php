<?PHP

// Ana fonskiyon dosyası ekleniyor.
include("../../codex.php");

if (isset($_POST["comment_update"])) {
    $comment_id = $_POST["comment_id"];
    $comment_content = $_POST["comment_content"];

    $comments = $db->prepare("UPDATE comments SET
        comment_content=:comment_content
        WHERE comment_id=$comment_id");

    $update = $comments->execute(array(
        'comment_content' => $comment_content
    ));

    if ($update) {
        header("Location:".$site_name."/admin/process.php?type=comment_update&id=".$comment_id."&alert=update-success");
        exit();
    } else {
        header("Location:".$site_name."/admin/process.php?type=comment_update&id=".$comment_id."&alert=update-failed");
        exit();
    }
}

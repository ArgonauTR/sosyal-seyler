<?PHP

// Ana fonskiyon dosyası ekleniyor.
include("../../codex.php");

// Güvenlik kontrolü yapılıyor.
if (!isset($_SESSION["user_role"]) and $_SESSION["user_role"] != "admin") {
    header("Location:" . $site_name . "/?status=permission-exist");
    exit();
}

$comment_id = $_GET["comment_id"];

$comments = $db->prepare("DELETE from comments where comment_id=:id");
$delete = $comments->execute(array(
    'id' => $comment_id
));

if ($delete) {
    header("Location:../comments.php?status=draft");
    exit();
} else {

    header("Location:../comments.php?status=publish");
    exit();
}

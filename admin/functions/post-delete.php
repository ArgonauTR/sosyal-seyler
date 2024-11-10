<?PHP

// Ana fonskiyon dosyası ekleniyor.
include("../../codex.php");

// Güvenlik kontrolü yapılıyor.
if (!isset($_SESSION["user_role"]) and $_SESSION["user_role"] != "admin") {
    header("Location:" . $site_name . "/?status=permission-exist");
    exit();
}

// Post ID bir değişkene aktarlılıyor.
$post_id = $_GET["post_id"];

// Post VT den siliniyor.
$posts = $db->prepare("DELETE from posts where post_id=:id");
$delete = $posts->execute(array(
    'id' => $post_id
));

// Postun Yorumları VT den silinoyr.

$comments = $db->prepare("DELETE from comments where comment_post_id=:id");
$delete = $comments->execute(array(
    'id' => $post_id
));


// Sonuca göre önlendirme yapılıyor.
if ($delete) {
    header("Location:../posts.php?delete=delete-ok");
    exit();
} else {

    header("Location:../posts.php?delete=delete-no");
    exit();
}

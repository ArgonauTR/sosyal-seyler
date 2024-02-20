<?PHP

// Ana fonskiyon dosyası ekleniyor.
include("main-function.php");

if (isset($_GET["status"])) {

    $status = $_GET["status"];
    $post_id = $_GET["post_id"];

    $posts = $db->prepare("DELETE from posts where post_id=:id");
	$delete = $posts->execute(array(
		'id' => $post_id
	));

    if ($delete) {
        header("Location:../post.php?delete=delete-ok");
        exit();
    } else {

        header("Location:../post.php?delete=delete-no");
        exit();
    }

}
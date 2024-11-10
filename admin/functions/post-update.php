<?PHP

// Ana fonskiyon dosyası ekleniyor.
include("../../codex.php");

// Güvenlik kontrolü yapılıyor.
if (!isset($_SESSION["user_role"]) and $_SESSION["user_role"] != "admin") {
    header("Location:" . $site_name . "/?status=permission-exist");
    exit();
}

if (isset($_POST["post_update"])) {
    $post_id = $_POST["post_id"];
    $post_title = $_POST["post_title"];
    $post_category_id = $_POST["post_category_id"];
    $post_content = $_POST["post_content"];


    $posts = $db->prepare("UPDATE posts SET
        post_title=:post_title,
        post_category_id=:post_category_id,
        post_content=:post_content
        WHERE post_id=$post_id");

    $update = $posts->execute(array(
        'post_title' => $post_title,
        'post_category_id' => $post_category_id,
        'post_content' => $post_content
    ));

    if ($update) {
        header("Location:".$site_name."/admin/process.php?type=post_update&id=".$post_id."&alert=update-success");
        exit();
    } else {
        header("Location:".$site_name."/admin/process.php?type=post_update&id=".$post_id."&alert=update-failed");
        exit();
    }
}

<?PHP

// Ana fonskiyon dosyası ekleniyor.
include("../../codex.php");

$category_id = $_GET["category_id"];

$categories = $db->prepare("DELETE from categories where category_id=:id");
$delete = $categories->execute(array(
    'id' => $category_id
));

if ($update) {
    header("Location:" . $site_name . "/admin/categories.php?status=delete-success");
    exit();
} else {
    header("Location:" . $site_name . "/admin/categories.php?status=delete-failed");
    exit();
}

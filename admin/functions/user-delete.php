<?PHP

// Ana fonskiyon dosyası ekleniyor.
include("main-function.php");

if (isset($_GET["status"])) {

    $status = $_GET["status"];
    $user_id = $_GET["user_id"];

    $user = $db->prepare("DELETE from users where user_id=:id");
	$delete = $user->execute(array(
		'id' => $user_id
	));

    if ($delete) {
        header("Location:../user.php?delete=delete-ok");
        exit();
    } else {

        header("Location:../user.php?delete=delete-no");
        exit();
    }

}
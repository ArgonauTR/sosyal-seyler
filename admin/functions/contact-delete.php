<?PHP

// Ana fonskiyon dosyası ekleniyor.
include("../../codex.php");

$contact_id = $_GET["contact_id"];

$contacts = $db->prepare("DELETE from contacts where contact_id=:id");
$delete = $contacts->execute(array(
    'id' => $contact_id
));

if ($update) {
    header("Location:" . $site_name . "/admin/contacts.php?status=draft");
    exit();
} else {
    header("Location:" . $site_name . "/admin/contacts.php?status=draft");
    exit();
}

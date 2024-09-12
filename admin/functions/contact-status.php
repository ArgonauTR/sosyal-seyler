<?PHP

// Ana fonskiyon dosyası ekleniyor.
include("../../codex.php");

if (isset($_GET["status"])) {

    $status = $_GET["status"];
    $contact_id = $_GET["contact_id"];

    //GET den değer DRAFT olarka gelmişse içeriğin TASLAK olarak güncellenmesi gerekir.
    // Aşağıda içerik TASLAK olarak güncelleniyor.
    if ($status == "draft") {
        
        $contacts = $db->prepare("UPDATE contacts SET
        contact_status=:contact_status
        WHERE contact_id=$contact_id");

        $update = $contacts->execute(array(
            'contact_status' => "draft"
        ));

        if ($update) {
            header("Location:../contacts.php?status=draft");
            exit();
        } else {

            header("Location:../contacts.php?status=publish");
            exit();
        }
    }


    //GET den değer PUBLİSH olarka gelmişse içeriğin YAYIN olarak güncellenmesi gerekir.
    // Aşağıda içerik YAYIN olarak güncelleniyor.
    if ($status == "publish") {

        $contacts = $db->prepare("UPDATE contacts SET
        contact_status=:contact_status
        WHERE contact_id=$contact_id");

        $update = $contacts->execute(array(
            'contact_status' => "publish"
        ));

        if ($update) {
            header("Location:../contacts.php?status=publish");
            exit();
        } else {

            header("Location:../contacts.php?status=draft");
            exit();
        }
    }
}

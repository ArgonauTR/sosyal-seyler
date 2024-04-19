<?PHP

// Ana fonskiyon dosyası ekleniyor.
include("main-function.php");

if (isset($_GET["status"])) {

    // Üye bilgileri değişkenlere aktarılıyor.
    $status = $_GET["status"];
    $user_id = $_GET["user_id"];

    // Üye veritabanından siliniyor.
    $user = $db->prepare("DELETE from users where user_id=:id");
    $delete = $user->execute(array(
        'id' => $user_id
    ));

    //Üye Yorumları Anonime çevriliyor.
    $comments = $db->prepare("UPDATE comments SET
    comment_author_id=:comment_author_id,
    comment_author_name=:comment_author_name

    WHERE comment_author_id=$user_id");

    $update = $comments->execute(array(
        'comment_author_id' => NULL,
        'comment_author_name' => "anonim"
    ));


    // üye yazıları güvene alınıyor.
    $posts = $db->prepare("UPDATE posts SET

    post_author_id=:post_author_id
 
     WHERE post_author_id=$user_id");


    $update = $posts->execute(array(
        'post_author_id' => $optionfetch["option_default_author"]
    ));

    if ($delete) {
        header("Location:../user.php?delete=delete-ok");
        exit();
    } else {

        header("Location:../user.php?delete=delete-no");
        exit();
    }
}

<?PHP

// Ana fonskiyon dosyası ekleniyor.
include("../codex.php");
$post = postinfo("SELECT * FROM posts ORDER BY RAND() LIMIT 1");
$link = $post[0]["post_link"];

header('Location:'.$link);
exit;

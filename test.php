<?php

include("config.php");

$manga_id = 4;
$chapterask = $db->prepare("SELECT * FROM chapters WHERE chapter_status='publish' && chapter_manga_id='$manga_id' ORDER BY chapter_num DESC LIMIT 4");
$chapterask->execute(array());
while ($chapterfetch = $chapterask->fetch(PDO::FETCH_ASSOC)) {
 $chapters = $chapterfetch;
}

echo "<pre>";
print_r($chapters);
echo "</pre>";

echo "<hr>";
echo $chapters["chapter_id"]+1;

?>
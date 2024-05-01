<?php
$site = $_SERVER['HTTP_HOST']; // Site adını alıyoruz.

echo "User-Agent: *";
echo "<br>";
echo "Allow: /";
echo "<br>";
echo "https://".$site."/sitemap.xml";
echo "<br>";
echo "https://".$site."/sitemap-manga.xml";

?>

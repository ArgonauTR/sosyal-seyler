<?php
include "config.php"; // Veritabanı bağlantısı

// Aşağıda ki fonskiyon tarihi parçalayıp sadece yılı döndürüyor.
function parcala($tarih)
{
    $parca = explode(" ", $tarih);
    return $parca[0];
}

$site = $_SERVER['HTTP_HOST']; // Site adını alıyoruz.

header('Content-type: Application/xml; charset="utf8"', true);

echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';

$mangaask = $db->prepare("SELECT * FROM mangas WHERE manga_status='publish' ORDER BY manga_id DESC");
$mangaask->execute(array());
while ($mangafetch = $mangaask->fetch(PDO::FETCH_ASSOC)) {
    echo '<url>';
    echo '<loc>' . $mangafetch["manga_link"] . '</loc>';
    echo '<lastmod>' . parcala($mangafetch["manga_time"]) . '</lastmod>';
    echo '</url>';
}
echo '</urlset>';
<?php
include "config.php"; // Veritabanı bağlantısı

// Aşağıda ki fonskiyon tarihi parçalayıp sadece yılı döndürüyor.
function parcala($tarih){
    $parca = explode(" ",$tarih);
    return $parca[0];
}

$site = $_SERVER['HTTP_HOST']; // Site adını alıyoruz.
header('Content-type: Application/xml; charset="utf8"', true);
//Burada toplam eleman sayısı bulunuyor.
$sayac = 0;
$postask = $db->prepare("SELECT * FROM posts WHERE post_status='publish'");
$postask->execute(array());
while ($postfetch = $postask->fetch(PDO::FETCH_ASSOC)) {
    $sayac = $sayac + 1;
}

$sayfa = empty($_GET["parca"]) ? 1 : $_GET["parca"]; // Sayfa numarası değişkene aktarılıyor.
$limit = 2000; // Her sayfada bulunacak eleman sayısı.
$startlimit = ($sayfa * $limit) - $limit; // Başlangıç elemanı belirleniyor.

$parca = ceil($sayac / $limit); // Liste için eleman sayısı belirliyor

if (@$_GET["parca"] < 1) {
    for ($say = 1; $say <= $parca; $say++) {
?>
        <sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
            <sitemap>
                <loc>https://<?PHP echo $site; ?>/sitemap-<?PHP echo $say; ?>.xml</loc>
            </sitemap> 
        </sitemapindex>

    <?php
    }
} else {
    $postask = $db->prepare("SELECT * FROM posts WHERE post_status='publish' ORDER BY post_id DESC LIMIT $startlimit,$limit");
    $postask->execute(array());
    ?>
    <urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
        <?php
        while ($postfetch = $postask->fetch(PDO::FETCH_ASSOC)) {
        ?>
            <url>
                <loc><?php echo $postfetch["post_link"];  ?></loc>
                <lastmod><?php echo parcala($postfetch["post_time"]); ?></lastmod>
            </url>
        <?php
        }
        ?>
    </urlset>
<?php
}

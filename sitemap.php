<?php
// veritabanı ve fonksiyonlar
include "codex.php";

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
                <loc><?PHP echo $site_name; ?>/sitemap-<?PHP echo $say; ?>.xml</loc>
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
                <lastmod><?php echo dateexplode($postfetch["post_create_time"]); ?></lastmod>
            </url>
        <?php
        }
        ?>
    </urlset>
<?php
}

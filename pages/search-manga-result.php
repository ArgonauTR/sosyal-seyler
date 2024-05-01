<?php
// Form verileri gönderildiğinde
if (isset($_GET["keyword"])) {
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        $keyword = htmlspecialchars(strip_tags($_GET["keyword"]));
    }
}
?>

<div class="d-flex justify-content-center mt-5 mb-5">
    <div class="col-12 col-lg-8 text-center">
        <h2 class="mb-3">"<?php echo $keyword; ?>" araması için sonuçlar.</h2>
        <?php
        $search_keyword = '%' . $keyword . '%';
        $mangaask = $db->prepare("SELECT * FROM mangas WHERE manga_name LIKE :search_keyword ORDER BY manga_id DESC LIMIT 10");
        $mangaask->bindParam(':search_keyword', $search_keyword, PDO::PARAM_STR);
        $mangaask->execute();
        while ($mangafetch = $mangaask->fetch(PDO::FETCH_ASSOC)) {
            //Kategori Adını Çekiyor
            $manga_category_id = $mangafetch["manga_category_id"];
            $categoryask = $db->prepare("SELECT * FROM categories WHERE category_id=:id");
            $categoryask->execute(array('id' => $manga_category_id));
            while ($categoryfetch = $categoryask->fetch(PDO::FETCH_ASSOC)) {
                $category_name = $categoryfetch["category_title"];
                $category_color = $categoryfetch["category_color"];
            }
        ?>
            <div class="card bg-dark text-white <?php echo "border-" . $category_color; ?> text-start mt-2">
                <div class="card-body">
                    <h4>
                        <a href="<?php echo $mangafetch["manga_link"]; ?>" style="text-decoration: none;">
                            <?php echo $mangafetch["manga_name"]; ?>
                        </a>
                        <span class="badge <?php echo "bg-" . $category_color; ?>">
                        <?php echo $category_name;?>
                    </span>
                    </h4>
                </div>
            </div>
        <?php
        }
        ?>
    </div>
</div>
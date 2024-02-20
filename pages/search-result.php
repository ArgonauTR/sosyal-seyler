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
        $postask = $db->prepare("SELECT * FROM posts WHERE post_title LIKE :search_keyword ORDER BY post_id DESC LIMIT 10");
        $postask->bindParam(':search_keyword', $search_keyword, PDO::PARAM_STR);
        $postask->execute();
        while ($postfetch = $postask->fetch(PDO::FETCH_ASSOC)) {
            //Kategori Adını Çekiyor
            $post_category_id = $postfetch["post_category_id"];
            $categoryask = $db->prepare("SELECT * FROM categories WHERE category_id=:id");
            $categoryask->execute(array('id' => $post_category_id));
            while ($categoryfetch = $categoryask->fetch(PDO::FETCH_ASSOC)) {
                $category_name = $categoryfetch["category_title"];
                $category_color = $categoryfetch["category_color"];
            }
        ?>
            <div class="card bg-dark text-white <?php echo "border-" . $category_color; ?> text-start mt-2">
                <div class="card-body">
                    <h4>
                        <a href="<?php echo $postfetch["post_link"]; ?>" style="text-decoration: none;">
                            <?php echo $postfetch["post_title"]; ?>
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
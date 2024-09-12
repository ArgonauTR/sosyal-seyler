<?php
// İşlem yapılacak id değişkene aktalrılıyor.
$id = $_GET["id"];

$posts = postinfo("SELECT * FROM posts WHERE post_id=" . $id);
?>
<div class="col-12 col-lg-9">
    <div class="card">
        <div class="card-header">
            <i class="bi bi-pen"></i>
            <?php echo $posts[0]["post_title"]; ?>
        </div>
        <div class="card-body">
            <form method="POST" action="<?php echo $site_name . "/admin/functions/post-update.php"; ?>" id="postForm">
                <div class="mb-3">
                    <input type="text" class="form-control" name="post_id" value="<?php echo $posts[0]["post_id"] ?>" hidden>
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control" name="post_title" value="<?php echo $posts[0]["post_title"] ?>" required>
                </div>
                <div class="mb-3">
                    <select class="form-select" name="post_category_id">
                        <?php
                        $categories = categoryinfo("SELECT * FROM categories ORDER BY category_title ASC");
                        foreach ($categories as $category) {
                            if ($posts[0]["post_category_id"] === $category["category_id"]) {
                                echo '<option selected value="' . $category["category_id"] . '">' . $category["category_title"] . '</option>';
                            } else {
                                echo '<option value="' . $category["category_id"] . '">' . $category["category_title"] . '</option>';
                            }
                        }
                        ?>
                    </select>
                </div>
                <div class="mb-3">
                    <div id="editor" style="height: 200px;"><?php echo $posts[0]["post_content"]; ?></div>
                    <input type="hidden" id="editorContent" name="post_content">
                </div>

                <div class="form-group mt-4 d-grid gap-2 col-6 mx-auto text-center">
                    <button type="submit" class="btn btn-outline-secondary" name="post_update">
                        <i class="bi bi-pen"></i> Güncelle
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
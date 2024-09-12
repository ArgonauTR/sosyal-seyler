<?php
if (empty($_SESSION['user_nick'])) {
    // İzinsiz işlemler anasayfaya yönlendiriliyor.

    header('Location:/?alert=no-login');
    exit();
}
?>
    <div class="m-4">
        <h2 class="text-center"><i class="bi bi-plus"></i> Yeni Konu</h2>
        <form method="POST" action="<?php echo $site_name . "/functions/new-post.php"; ?>" id="postForm">

            <div class="mb-3 mt-4">
                <input type="text" class="form-control" name="post_title" placeholder="Başlık Giriniz" required>
            </div>

            <div class="mb-3">
                <select class="form-select" name="post_category_id">
                    <?php

                    $categoryask = $db->prepare("SELECT * FROM categories ORDER BY category_title  ASC");
                    $categoryask->execute(array());
                    while ($categoryfetch = $categoryask->fetch(PDO::FETCH_ASSOC)) {
                    ?>
                        <option value="<?php echo $categoryfetch["category_id"]; ?>"><?php echo $categoryfetch["category_title"]; ?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>


            <div class="mb-3">
                <div id="editor" style="height: 200px;"></div>
                <input type="hidden" id="editorContent" name="post_content">
            </div>

            <div class="form-group mt-4 d-grid gap-2 col-6 mx-auto text-center">
                <button type="submit" class="btn btn-outline-secondary" name="new_post">
                    <i class="bi bi-send"></i> Gönder
                </button>
            </div>

        </form>
    </div>
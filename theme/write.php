<div class="mt-4 mb-4">
    <h2 class="text-center"><i class="bi bi-plus"></i> Yeni Konu</h2>
    <form method="POST" action="./functions/new-post.php" enctype="multipart/form-data" id="myForm">

        <div class="mb-3 mt-4">
            <input type="text" class="form-control" name="post_title" placeholder="Başlık Giriniz" required>
        </div>

        <div class="mb-3">
            <select class="form-select" name="post_category_id">
                <?php
                foreach ($categories as $category) {
                ?>
                    <option value="<?php echo $category["category_id"]; ?>">
                        <?php echo $category["category_title"]; ?>
                    </option>
                <?php
                }
                ?>
            </select>
        </div>

        <div class="mb-3 text-dark">
            <textarea class="form-control" id="editor" name="post_content" pattern="[A-Za-z]{3,}" title="En az 3 harf girin"></textarea>
            <span class="text-danger" id="error"></span>
        </div>

        <div class="form-group mt-4 d-grid gap-2 col-6 mx-auto text-center">
            <button type="submit" class="btn btn-outline-secondary" name="new_post">
                <i class="bi bi-send"></i> Gönder
            </button>
        </div>

    </form>
</div>

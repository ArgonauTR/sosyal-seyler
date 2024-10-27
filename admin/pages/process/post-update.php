<?php
// İşlem yapılacak id değişkene aktalrılıyor.
$id = $_GET["id"];

$posts = postinfo("SELECT * FROM posts WHERE post_id=" . $id);
?>

<style>
    :root {
        /* Genel ayarlar */
        --ck-border-radius: 5px;
        --ck-font-size-base: 14px;

        /* Yardımcı değişkenler */
        --ck-custom-background: hsl(270, 1%, 29%);
        --ck-custom-foreground: hsl(255, 3%, 18%);
        --ck-custom-border: hsl(300, 1%, 22%);
        --ck-custom-white: hsl(0, 0%, 100%);

        /* Genel renkler */
        --ck-color-base-foreground: var(--ck-custom-background);
        --ck-color-focus-border: hsl(208, 90%, 62%);
        --ck-color-text: hsl(0, 0%, 98%);
        --ck-color-shadow-drop: hsla(0, 0%, 0%, 0.2);
        --ck-color-shadow-inner: hsla(0, 0%, 0%, 0.1);

        /* Buton renkleri */
        --ck-color-button-default-background: var(--ck-custom-background);
        --ck-color-button-default-hover-background: hsl(270, 1%, 22%);
        --ck-color-button-default-active-background: hsl(270, 2%, 20%);
        --ck-color-button-default-active-shadow: hsl(270, 2%, 23%);
        --ck-color-button-default-disabled-background: var(--ck-custom-background);
        --ck-color-button-on-background: var(--ck-custom-foreground);
        --ck-color-button-on-hover-background: hsl(255, 4%, 16%);
        --ck-color-button-on-active-background: hsl(255, 4%, 14%);
        --ck-color-button-on-active-shadow: hsl(240, 3%, 19%);
        --ck-color-button-on-disabled-background: var(--ck-custom-foreground);
        --ck-color-button-action-background: hsl(168, 76%, 42%);
        --ck-color-button-action-hover-background: hsl(168, 76%, 38%);
        --ck-color-button-action-active-background: hsl(168, 76%, 36%);
        --ck-color-button-action-active-shadow: hsl(168, 75%, 34%);
        --ck-color-button-action-disabled-background: hsl(168, 76%, 42%);
        --ck-color-button-action-text: var(--ck-custom-white);
        --ck-color-button-save: hsl(120, 100%, 46%);
        --ck-color-button-cancel: hsl(15, 100%, 56%);

        /* Dropdown panel renkleri */
        --ck-color-dropdown-panel-background: var(--ck-custom-background);
        --ck-color-dropdown-panel-border: var(--ck-custom-foreground);

        /* Dialog renkleri */
        --ck-color-dialog-background: var(--ck-custom-background);
        --ck-color-dialog-form-header-border: var(--ck-custom-border);

        /* Split button renkleri */
        --ck-color-split-button-hover-background: var(--ck-color-button-default-hover-background);
        --ck-color-split-button-hover-border: var(--ck-custom-foreground);

        /* Input renkleri */
        --ck-color-input-background: var(--ck-custom-background);
        --ck-color-input-border: hsl(257, 3%, 43%);
        --ck-color-input-text: hsl(0, 0%, 98%);
        --ck-color-input-disabled-background: hsl(255, 4%, 21%);
        --ck-color-input-disabled-border: hsl(250, 3%, 38%);
        --ck-color-input-disabled-text: hsl(0, 0%, 50%);

        /* Labeled field view renkleri */
        --ck-color-labeled-field-label-background: var(--ck-custom-background);

        /* List renkleri */
        --ck-color-list-background: var(--ck-custom-background);
        --ck-color-list-button-hover-background: var(--ck-color-base-foreground);
        --ck-color-list-button-on-background: var(--ck-color-base-active);
        --ck-color-list-button-on-background-focus: var(--ck-color-base-active-focus);
        --ck-color-list-button-on-text: var(--ck-color-base-background);

        /* Balloon panel renkleri */
        --ck-color-panel-background: var(--ck-custom-background);
        --ck-color-panel-border: var(--ck-custom-border);

        /* Toolbar renkleri */
        --ck-color-toolbar-background: var(--ck-custom-background);
        --ck-color-toolbar-border: var(--ck-custom-border);

        /* Tooltip renkleri */
        --ck-color-tooltip-background: hsl(252, 7%, 14%);
        --ck-color-tooltip-text: hsl(0, 0%, 93%);

        /* Image paketi renkleri */
        --ck-color-image-caption-background: hsl(0, 0%, 97%);
        --ck-color-image-caption-text: hsl(0, 0%, 20%);

        /* Widget paketi renkleri */
        --ck-color-widget-blurred-border: hsl(0, 0%, 87%);
        --ck-color-widget-hover-border: hsl(43, 100%, 68%);
        --ck-color-widget-editable-focus-background: var(--ck-custom-white);

        /* Link paketi renkleri */
        --ck-color-link-default: hsl(190, 100%, 75%);
    }

    .ck-editor__editable {
        min-height: 200px;
    }
</style>

<div class="col-12 col-lg-9">
    <div class="card">
        <div class="card-header">
            <i class="bi bi-pen"></i>
            <?php echo $posts[0]["post_title"]; ?>
        </div>
        <div class="card-body">
            <form method="POST" action="<?php echo $site_name . "/admin/functions/post-update.php"; ?>" enctype="multipart/form-data">
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
            

                <div class="mb-3 text-dark">
            <textarea class="form-control" id="editor" name="post_content"><?php echo $posts[0]["post_content"] ?></textarea>
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

<script>
    ClassicEditor
        .create(document.querySelector('#editor'), {
            ckfinder: {
                uploadUrl: '../functions/image-upload.php'
            },
            toolbar: {
                items: [
                    'bold', 'numberedList', 'link', 'imageUpload'
                ]
            },
            language: 'tr',
            mediaEmbed: {
                previewsInData: true
            }
        })
        .then(editor => {
            console.log(editor);
        })
        .catch(error => {
            console.error(error);
        });
</script>
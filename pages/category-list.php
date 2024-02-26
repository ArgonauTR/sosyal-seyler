<style>
    .clamp-text {
        display: -webkit-box;
        -webkit-box-orient: vertical;
        overflow: hidden;
        -webkit-line-clamp: 2;
    }

    .custom-card {
        transition: box-shadow 0.3s, border-color 0.3s;
    }

    .custom-card:hover {
        box-shadow: 0 4px 8px rgba(255, 255, 255, 0.5);
        border-color: #007bff;
    }

    .blur {
        filter: blur(3px);
    }
</style>

<body class=" bg-dark text-white">

    <div class="container">
        <div class="row align-items-start">
            <?php
            $categoryask = $db->prepare("SELECT * FROM categories ORDER BY category_title ASC");
            $categoryask->execute(array());
            while ($categoryfetch = $categoryask->fetch(PDO::FETCH_ASSOC)) {

                $category_color = $categoryfetch["category_color"];

                //Resim Yolunu Çekiyor
                $post_thumbnail_id = $categoryfetch["category_image_id"];
                $imageask = $db->prepare("SELECT * FROM images WHERE image_id=:id");
                $imageask->execute(array('id' => $post_thumbnail_id));
                while ($imagefetch = $imageask->fetch(PDO::FETCH_ASSOC)) {
                    $image_title = $imagefetch["image_title"];
                    $image_link = $imagefetch["image_link"];
                }
            ?>
                <div class="col-md-3 col-sm-6 mt-4">
                    <div class="card <?php echo "border-" . $category_color; ?> text-center custom-card">
                        <a href="<?php echo $categoryfetch["category_link"]; ?>" class="stretched-link"></a>
                        <img src="<?php echo $image_link; ?>" class="card-img blur" alt="<?php echo $image_title; ?>">
                        <div class="card-img-overlay">
                            <h5 class="card-title mt-2">
                                <b>
                                    <?php echo $categoryfetch["category_title"]; ?>
                                </b>
                            </h5>
                            <p class="card-text mt-4 clamp-text">
                                <?php echo $categoryfetch["category_description"]; ?>
                            </p>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
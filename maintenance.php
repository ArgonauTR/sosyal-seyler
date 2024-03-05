<?php
require_once("config.php");
ob_start();
session_start();
date_default_timezone_set('Europe/Istanbul');

//Ayar tablosu sorgusu başta çekilerek siteye yayıldı
$optionask = $db->prepare("SELECT * FROM options WHERE option_id=:id");
$optionask->execute(array(
    'id' => 0
));
$optionfetch = $optionask->fetch(PDO::FETCH_ASSOC);

//Logo Yolu Çekiyor 
$post_thumbnail_id = $optionfetch["option_logo_image"];
$imageask = $db->prepare("SELECT * FROM images WHERE image_id=:id");
$imageask->execute(array('id' => $post_thumbnail_id));
while ($imagefetch = $imageask->fetch(PDO::FETCH_ASSOC)) {
    $option_logo_image_id = $imagefetch["image_id"];
    $option_logo_image_link = $imagefetch["image_link"];
}

?>
<!doctype html>
<html lang="tr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bakım Modu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
</head>

<body class="bg-dark">

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-12">
                <div class="card bg-dark border-white text-white text-center mt-5">
                    <div class="card-header">
                        <img class="card-img-top p-3" src="<?php echo $option_logo_image_link; ?>" alt="logo" style="max-width: 250px;">
                    </div>
                    <div class="card-body">
                        <h1>BAKIM MODU</h1>
                        <p>
                        <h3>Şu anda bakım için kapalıyız. Çok yakında hazır oluruz. Lütfen en yakın zamanda yine ziyaret</h3>
                        </p>
                    </div>
                    <div class="card-footer">
                        <?php echo $optionfetch["option_footer"]; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="position-absolute bottom-0 start-0">
        <a href="" class="text-white ms-2 mb-2" data-bs-toggle="modal" data-bs-target="#exampleModal" style="text-decoration: none;">
            <i class="bi bi-box-arrow-in-left me-1"></i>
            Giriş Yap
        </a>

        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content bg-dark text-white">
                    <div class="modal-body">
                        <h2 class="text-center">GİRİŞ</h2>
                        <form action="./functions/user-login.php" method="POST">
                            <div class="mb-3 mt-4">
                                <label class="form-label">
                                    <i class="bi bi-person me-2"></i>
                                    Kulanıcı Adı
                                </label>
                                <input type="text" class="form-control  bg-dark text-white border-primary" name="user_nick" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">
                                    <i class="bi bi-key me-2"></i>
                                    Şifre
                                </label>
                                <input type="password" class="form-control  bg-dark text-white border-primary" name="user_password" required>
                            </div>
                            <div class="form-group mt-4 d-grid gap-2 col-6 mx-auto text-center">
                                <button type="submit" class="btn btn-primary text-white border-primary" name="user_login">
                                    <i class="bi bi-box-arrow-in-left me-1"></i>
                                    Giriş
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>
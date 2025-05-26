<!doctype html>
<html lang="tr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kurulum - Sosyal Şeyler</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>

    <div class="d-flex justify-content-center align-items-center m-5">
        <div class="col-12 col-lg-6 card">
            <div class="card-header">
                <i class="bi bi-wrench-adjustable"></i>
                Sosyal Şeyler Kurulum
            </div>
            <div class="card-body">
                <form action="./../core/install.php" method="POST">

                    <div class="form-text">
                        Örnekler gibi alan adınızı giriniz.
                        <br>
                        <ul>
                            <li>sosyalseyler.com</li>
                            <li>forum/sosyalseyler.com</li>
                            <li>sosyalseyler.com/forum</li>
                        </ul>
                    </div>

                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">https://</span>
                        <input type="text" class="form-control" name="site_url" required>
                    </div>

                    <hr>

                    <div class="mb-3">
                        <label class="form-label">Veritabanı Adı</label>
                        <input type="text" class="form-control" name="db_name" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Veritabanı Kullanıcısı</label>
                        <input type="text" class="form-control" name="db_user" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Veritabanı Şifrsei</label>
                        <input type="text" class="form-control" name="db_pass">
                    </div>

                    <hr>

                    <div class="mb-3">
                        <label class="form-label">Admin Kullanıcı Adı</label>
                        <input type="text" class="form-control" name="admin_nick" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Admin E-Postası</label>
                        <input type="text" class="form-control" name="admin_mail" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Admin Şifresi</label>
                        <input type="text" class="form-control" name="admin_pass" required>
                    </div>

                    <div class="mb-3 text-center">
                        <button type="submit" class="btn btn-outline-secondary">Kurulumu Yap</button>
                    </div>

                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
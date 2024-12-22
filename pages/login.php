    <div class="m-4 p-4">
        <h2 class="text-center">GİRİŞ</h2>
        <form action="./functions/login.php" method="POST">
            <div class="mb-3 mt-4">
                <label class="form-label">
                    <i class="bi bi-person"></i> Kulanıcı Adı
                </label>
                <input type="text" class="form-control" name="user_nick" required>
            </div>
            <div class="mb-3">
                <label class="form-label">
                    <i class="bi bi-key"></i> Şifre
                </label>
                <input type="password" class="form-control" name="user_password" required>
            </div>
            <div class="mb-3 text-end">
                <label class="form-label">
                    <a href="./reset" class="text-decoration-none text-muted"><i class="bi bi-arrow-repeat"></i> Şifremi Unuttum</a>
                </label>
            </div>
            <div class="form-group mt-4 d-grid gap-2 col-6 mx-auto text-center">
                <button type="submit" class="btn btn-outline-secondary" name="user_login">
                    <i class="bi bi-box-arrow-in-left me-1"></i>
                    Giriş
                </button>
            </div>
        </form>
    </div>

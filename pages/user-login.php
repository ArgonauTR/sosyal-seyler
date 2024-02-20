<div class="d-flex justify-content-center mt-5 mb-5">
    <div class="col-12 col-lg-4">
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
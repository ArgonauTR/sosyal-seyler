<div class="m-4 p-4">
    <h2 class="text-center">KAYIT</h2>
    <form action="./functions/registry.php" method="post">
        <div class="mb-3 mt-4">
            <label class="form-label">
                <i class="bi bi-person-add"></i> Takma Ad
            </label>
            <input type="text" name="user_nick" class="form-control" required>
            <div class="form-text">4-15 karakter arasında olmalıdır.</div>
        </div>
        <div class="mb-3">
            <label class="form-label">
                <i class="bi bi-envelope-at"></i> E-Posta Adresi
            </label>
            <input type="email" name="user_mail" class="form-control" required>
            <div class="form-text">Kullaımda ki bir e-posta olmalıdır.</div>
        </div>
        <div class="mb-3">
            <label class="form-label">
                <i class="bi bi-key"></i> Şifre
            </label>
            <input type="password" name="user_password" class="form-control" required>
            <div class="form-text">6-12 karakter arasında olmalıdır.</div>
        </div>
        <div class="form-group mt-4 d-grid gap-2 col-6 mx-auto text-center">
            <button type="submit" name="user_registry" class="btn btn-outline-secondary">
                <i class="bi bi-pencil me-1"></i>
                Kayıt
            </button>
        </div>
    </form>
</div>
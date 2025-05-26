<div class="m-4 p-4">
    <h2 class="text-center">ŞİFREMİ UNUTTUM</h2>
    <form action="./functions/reset-password.php" method="POST">
        <div class="mb-3 mt-4">
            <label class="form-label">
                <i class="bi bi-person"></i> Kulanıcı Adı
            </label>
            <input type="text" class="form-control" name="user_nick" required>
        </div>
        <div class="mb-3 mt-4">
            <p>
                <i class="bi bi-check-circle"></i>
                Kullanıcı adınızı doğru girmişseniz, kayıt olurken kullandığınız e-posta adrsine bir sıfırlama bağlantısı yollanacaktır.
            </p>
        </div>
        <div class="form-group mt-4 d-grid gap-2 col-6 mx-auto text-center">
            <button type="submit" class="btn btn-outline-secondary" name="reset_password">
                <i class="bi bi-envelope-arrow-up"></i>
                Şifremi Sıfırla
            </button>
        </div>
    </form>
</div>

<div class="d-flex justify-content-center mt-5 mb-5">
    <div class="col-12 col-lg-4">
        <h2 class="text-center">ŞİFREMİ UNUTTUM</h2>
        <form action="../functions/user-new-pass.php" method="POST">
            <div class="mb-3 mt-4">
                <label class="form-label">
                    <i class="bi bi-envelope-at me-2"></i>
                    E-Posta Adresi
                </label>
                <input type="email" name="user_mail" class="form-control  bg-dark text-white border-primary">
            </div>
            <div class="form-group mt-4 d-grid gap-2 col-6 mx-auto text-center">
                <button type="submit" name="user_new_pass" class="btn btn-primary text-white border-primary">
                <i class="bi bi-arrow-repeat me-1"></i>
                    Sıfırla
                </button>
            </div>
        </form>
    </div>
</div>
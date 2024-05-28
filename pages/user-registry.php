<div class="d-flex justify-content-center mt-5 mb-5">
    <div class="col-12 col-lg-4">
        <h2 class="text-center">KAYIT</h2>
        <?php
        if ($optionfetch["option_can_register"] == "yes") {
        ?>
            <form action="./functions/user-registry.php" method="post" id="myForm">
                <div class="mb-3 mt-4">
                    <label class="form-label">
                        <i class="bi bi-person-add me-2"></i>
                        Takma Ad
                    </label>
                    <input type="text" name="user_nick" class="form-control  bg-dark text-white border-primary" required>
                    <div class="form-text">4-15 karakter arasında olmalıdır.</div>
                </div>
                <div class="mb-3">
                    <label class="form-label">
                        <i class="bi bi-envelope-at me-2"></i>
                        E-Posta Adresi
                    </label>
                    <input type="email" name="user_mail" class="form-control  bg-dark text-white border-primary" required>
                    <div class="form-text">Kullaımda ki bir e-posta olmalıdır.</div>
                </div>
                <div class="mb-3">
                    <label class="form-label">
                        <i class="bi bi-key me-2"></i>
                        Şifre
                    </label>
                    <input type="password" name="user_password" class="form-control  bg-dark text-white border-primary" required>
                    <div class="form-text">6-12 karakter arasında olmalıdır.</div>
                </div>
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="myCheckbox">
                    <label class="form-check-label" for="exampleCheck1"><a href="<?php echo $optionfetch["option_terms"] ?>" style="text-decoration: none;">Şartları ve Koşulları Okudum ve Kabul Ediyorum.</a></label>
                </div>
                <div class="form-group mt-4 d-grid gap-2 col-6 mx-auto text-center">
                    <button type="submit" name="user_registry" class="btn btn-primary text-white border-primary">
                        <i class="bi bi-pencil me-1"></i>
                        Kayıt
                    </button>
                </div>
            </form>
        <?php
        } else {
        ?>
            <div class="card bg-dark text-white border-primary text-center">
                <div class="card-body">
                    <p>
                        Üzgünüz, Şu anda üye kabul edemiyoruz. Lütfen daha sonra tekrar kontol edin.
                    </p>
                </div>
            </div>
        <?php
        }
        ?>
    </div>
</div>

    <script>
        document.getElementById("myForm").addEventListener("submit", function(event) {
            const checkbox = document.getElementById("myCheckbox");
            if (!checkbox.checked) {
                event.preventDefault(); // Formu göndermeyi engelle
                alert("Lütfen onay kutusunu işaretleyin!");
            }
        });
    </script>
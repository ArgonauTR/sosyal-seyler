    <div class="m-4">
        <h2 class="text-center"><i class="bi bi-telephone"></i> İletişim</h2>
        <form method="POST" action="<?php echo $site_name . "/functions/new-contact.php"; ?>" id="myForm" onsubmit="return validateCaptcha()">

            <div class="mb-3 mt-4">
                <input type="text" class="form-control" name="contact_name" placeholder="Adınızı Girin" required>
            </div>

            <div class="mb-3 mt-4">
                <input type="email" class="form-control" name="contact_mail" placeholder="E-Mail Adresi Girin" required>
            </div>

            <div class="mb-3 mt-4">
                <input type="text" class="form-control" name="contact_title" placeholder="Başlık Girin" required>
            </div>

            <div class="mb-3">
                <textarea class="form-control" name="contact_content" rows="5" placeholder="Mesajınızı bu alana yazınız" required></textarea>
            </div>

            <div class="mb-3">
                <label for="captcha">Robot musun? </label>
                <span id="operation"></span>
                <input type="text"  id="captcha" required />
            </div>

            <div class="form-group mt-4 d-grid gap-2 col-6 mx-auto text-center">
                <button type="submit" class="btn btn-outline-secondary" name="new_contact">
                    <i class="bi bi-send-plus"></i> Mesajı Gönder
                </button>
            </div>

        </form>

    </div>

<script>
    function generateOperation() {
        const num1 = Math.floor(Math.random() * 10) + 1;
        const num2 = Math.floor(Math.random() * 10) + 1;
        const operators = ['+', '-', '*', '/'];
        const operator = operators[Math.floor(Math.random() * operators.length)];

        let operation = `${num1} ${operator} ${num2}`;
        document.getElementById('operation').innerText = operation;

        // İşlemin doğru sonucunu hesaplayın ve global bir değişkene atayın
        window.correctAnswer = eval(operation).toFixed(2); // virgülden sonra 2 basamakla sınırlandırma
    }

    function validateCaptcha() {
        const userAnswer = parseFloat(document.getElementById('captcha').value);

        if (userAnswer === parseFloat(window.correctAnswer)) {
            return true; // Form gönderilir
        } else {
            alert('Yanlış cevap. Lütfen tekrar deneyin.');
            generateOperation(); // Yeni bir işlem oluştur
            return false; // Form gönderilmez
        }
    }

    // Sayfa yüklendiğinde işlem oluştur
    window.onload = generateOperation;
</script>
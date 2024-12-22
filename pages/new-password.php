<?php
if (!isset($_GET["nick"]) or !isset($_GET["key"])) {
    header('Location:/?alert=access-denied');
    exit();
}
?>

<div class="m-4 p-4">
    <h2 class="text-center">YENİ ŞİFRE</h2>
    <form action="./functions/new-password.php" method="POST">
        <div class="mb-3 mt-4">
            <p>
                Merhaba <?php echo "<b>" . $_GET["nick"] . "</b>" ?>,
                <br>
                Şifreni sıfırlamak üzersin.
            </p>
        </div>
        <div class="mb-3 mt-4">
            <input type="text" class="form-control" name="user_nick" value="<?php echo $_GET["nick"] ?>" hidden>
        </div>
        <div class="mb-3 mt-4">
            <input type="text" class="form-control" name="user_password_reset_key" value="<?php echo $_GET["key"] ?>" hidden>
        </div>
        <div class="mb-3 mt-4">
            <label class="form-label">
                <i class="bi bi-key"></i> Yeni Şifre
            </label>
            <input type="text" class="form-control" name="user_password" required>
        </div>
        <div class="form-group mt-4 d-grid gap-2 col-6 mx-auto text-center">
            <button type="submit" class="btn btn-outline-secondary" name="new_password">
                <i class="bi bi-envelope-arrow-up"></i>
                Şifremi Sıfırla
            </button>
        </div>
    </form>
</div>
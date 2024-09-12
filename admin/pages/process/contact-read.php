<?php
$contact_id = $_GET["contact_id"];
$contact = contactinfo("SELECT * FROM contacts WHERE contact_id=" . $contact_id);
?>
<div class="col-12 col-lg-9">
    <div class="card">
        <div class="card-header">
            <i class="bi bi-book-half"></i> Gelen Mesaj
        </div>
        <div class="card-body">
            <form>

                <div class="mb-3">
                    <input type="text" class="form-control" value="<?php echo $contact[0]["contact_name"]; ?>" disabled>
                </div>

                <div class="mb-3">
                    <input type="email" class="form-control" value="<?php echo $contact[0]["contact_mail"]; ?>" disabled>
                </div>

                <div class="mb-3">
                    <input type="text" class="form-control" value="<?php echo $contact[0]["contact_title"]; ?>" disabled>
                </div>

                <div class="mb-3">
                    <textarea class="form-control" disabled><?php echo $contact[0]["contact_content"]; ?></textarea>
                </div>

            </form>
        </div>
        <div class="card-footer mt-5 text-center">
        <a class="btn" href="mailto:<?php echo $contact[0]["contact_mail"]; ?>"><i class="bi bi-envelope-at"></i> Cevapla</a>
        <a class="btn" href="/admin/functions/contact-status.php?status=draft&contact_id=<?php echo $contact_id; ?>"><i class="bi bi-clock-history me-1"></i>Bekliyor Yap</a>
        <a class="btn" href="/admin/functions/contact-status.php?status=publish&contact_id=<?php echo $contact_id; ?>"><i class="bi bi-clock-history me-1"></i>Okunmuş Yap</a>
        <a class="btn" href="/admin/functions/contact-delete.php?contact_id=<?php echo $contact_id; ?>"><i class="bi bi-trash me-1"></i>Sil</a>
        </div>
    </div>
</div>
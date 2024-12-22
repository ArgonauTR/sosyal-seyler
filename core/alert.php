<?php
function alertcore($message, $color)
{
?>
    <div class="alert <?php echo "alert-" . $color; ?> alert-dismissible fade show" role="alert">
        <?php echo $message; ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php
}

function alert($alert_name)
{
    $alert_name = htmlspecialchars(strip_tags($_GET["alert"]));
    switch ($alert_name) {
        case "nick-failed": // Kullanıcı adı hatası.
            $message = 'Bilgileri Kontrol Ediniz.';
            $color = 'success';
            alertcore($message, $color);
            break;

        case "pass-failed": // Şifre hatası.
            $message = 'Bilgileri Kontrol Ediniz.';
            $color = 'warning';
            alertcore($message, $color);
            break;

        case "login-success": // Başarılı giriş.
            $message = 'Başarı ile giriş yaptınız.';
            $color = 'success';
            alertcore($message, $color);
            break;

        case "logout": // Güvenli çıkış.
            $message = 'Çıkış yapılmıştır.';
            $color = 'primary';
            alertcore($message, $color);
            break;

        case "no-login": // Erişim izni yok.
            $message = 'Erişiminiz reddedildi.';
            $color = 'info';
            alertcore($message, $color);
            break;

        case "post-added": // Post eklendi
            $message = 'Postunuz başarıyla eklendi.';
            $color = 'success';
            alertcore($message, $color);
            break;

        case "post-failed": // Post eklenemedi.
            $message = 'Postunuz eklenemedi.';
            $color = 'danger';
            alertcore($message, $color);
            break;

        case "comment-added": // Yorum eklendi.
            $message = 'Yorumunuz başarıyla eklendi.';
            $color = 'success';
            alertcore($message, $color);
            break;

        case "comment-failed": // Yorum eklenemedi.
            $message = 'Yorum eklenirken hata oluştu.';
            $color = 'warning';
            alertcore($message, $color);
            break;

        case "nick-count": // Nick çok kısa ya da uzun.
            $message = 'Bu isim çok kısa ya da uzun.';
            $color = 'warning';
            alertcore($message, $color);
            break;

        case "password-count": // Bu parola çok uzun ya da kısa.
            $message = 'Bu şifre çok uzun ya da kısa.';
            $color = 'warning';
            alertcore($message, $color);
            break;
            
        case "nick-exist": // İsim alınmış
            $message = 'Bu nick daha önce alınmış.';
            $color = 'warning';
            alertcore($message, $color);
            break;

        case "mail-exist": // Mail var.
            $message = 'Zaten kayıtlısın. Şifreni yenile.';
            $color = 'warning';
            alertcore($message, $color);
            break;

        case "registry-success": // Başarılı kayıt.
            $message = 'Aramıza hoşgeldin.';
            $color = 'success';
            alertcore($message, $color);
            break;

        case "registry-danger": // Kayıt Hatası.
            $message = 'Bilinmeyen bir kayıt hatası yaşandı. Lütfen daha sonra tekrar deneyin.';
            $color = 'warning';
            alertcore($message, $color);
            break;

        case "access-denied": // Yekisiz Erişim Hatası
            $message = 'Erişiminiz Reddedildi. Yetkiniz olmayabilir.';
            $color = 'danger';
            alertcore($message, $color);
            break;

        case "update-success": // Güncelleme Başarılı
            $message = 'Güncelleme İşlemi Başarılı.';
            $color = 'success';
            alertcore($message, $color);
            break;

        case "update-failed": // Güncelleme Başarısız
            $message = 'Güncelleme İşlemi Başarısız.';
            $color = 'danger';
            alertcore($message, $color);
            break;

        case "thheme-success": // Tema değiştirildi.
            $message = 'Tema değiştirildi.';
            $color = 'success';
            alertcore($message, $color);
            break;

        case "check-nick": // Böyle bir kullanıcı yok.
            $message = 'Kullanıcı adını Kontrol Edin.';
            $color = 'danger';
            alertcore($message, $color);
            break;

        case "mail-failed": // E-Posta Hatası
            $message = 'Bir sorun yaşıyoruz. Üzgünüz.';
            $color = 'warning';
            alertcore($message, $color);
            break;
            
        case "mail-send": // E-Posta Gönderildi.
            $message = 'E-Postanızı Kontrol Ediniz';
            $color = 'success';
            alertcore($message, $color);
            break;

        case "contact-success": // Mesajınız bize ulaştı
            $message = 'Mesajınız bile ulaştı.';
            $color = 'success';
            alertcore($message, $color);
            break;

        case "contact-failed": // Bir hata aldık.
            $message = 'E-Postanızı Kontrol Ediniz';
            $color = 'warning';
            alertcore($message, $color);
            break;

        case "contact-bot-failed": // Mesaj botu algılama
            $message = 'Robot olduğunu düşünüyoruz.';
            $color = 'danger';
            alertcore($message, $color);
            break;



        default: // Varsayılan bildirim.
            //echo '<div class="alert alert-danger" role="alert">Eyvah! Bildirim sisteminde bir sorun oluştu.</div>';
    }
}

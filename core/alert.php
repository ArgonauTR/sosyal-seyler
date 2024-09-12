<?php
function alert($alert_name)
{
    $alert_name = htmlspecialchars(strip_tags($_GET["alert"]));
    switch ($alert_name) {
        case "nick-failed": // Kullanıcı adı hatası.
            echo '<div class="alert alert-warning" role="alert">Bilgileri Kontrol Ediniz.</div>';
            break;
        case "pass-failed": // Şifre hatası.
            echo '<div class="alert alert-warning" role="alert">Bilgileri Kontrol Ediniz.</div>';
            break;
        case "login-success": // Başarılı giriş.
            echo '<div class="alert alert-success" role="alert">Başarı ile giriş yaptınız.</div>';
            break;
        case "logout": // Güvenli çıkış.
            echo '<div class="alert alert-primary" role="alert">Çıkış yapılmıştır.</div>';
            break;
        case "no-login": // Erişim izni yok.
            echo '<div class="alert alert-info" role="alert">Erişiminiz reddedildi.</div>';
            break;
        case "post-added": // Post eklendi
            echo '<div class="alert alert-success" role="alert">Postunuz başarıyla eklendi.</div>';
            break;
        case "post-failed": // Post eklenemedi.
            echo '<div class="alert alert-danger" role="alert">Postunuz eklenemedi..</div>';
            break;
        case "comment-added": // Yorum eklendi.
            echo '<div class="alert alert-success" role="alert">Yorumunuz başarıyla eklendi.</div>';
            break;
        case "comment-failed": // Yorum eklenemedi.
            echo '<div class="alert alert-warning" role="alert">Yorum eklenirken hata oluştu.</div>';
            break;
        case "nick-count": // Nick çok kısa ya da uzun.
            echo '<div class="alert alert-warning" role="alert">Bu isim çok kısa ya da uzun.</div>';
            break;
        case "password-count": // Bu parola çok uzun ya da kısa.
            echo '<div class="alert alert-warning" role="alert">Bu şifre çok uzun ya da kısa.</div>';
            break;
        case "nick-exist": // İsim alınmış
            echo '<div class="alert alert-warning" role="alert">Bu nick daha önce alınmış.</div>';
            break;
        case "mail-exist": // Mail var.
            echo '<div class="alert alert-warning" role="alert">Zaten kayıtlısın. Şifreni yenile.</div>';
            break;
        case "registry-success": // Başarılı kayıt.
            echo '<div class="alert alert-success" role="alert">Aramıza hoşgeldin.</div>';
            break;
        case "registry-danger": // Kayıt Hatası.
            echo '<div class="alert alert-warning" role="alert">Bilinmeyen bir kayıt hatası yaşandı. Lütfen daha sonra tekrar deneyin.</div>';
            break;
        case "access-denied": // Yekisiz Erişim Hatası
            echo '<div class="alert alert-danger" role="alert">Erişiminiz Reddedildi. Yetkiniz olmayabilir.</div>';
            break;
        case "update-success": // Güncelleme Başarılı
            echo '<div class="alert alert-success" role="alert">Güncelleme İşlemi Başarılı.</div>';
            break;
        case "update-failed": // Güncelleme Başarısız
            echo '<div class="alert alert-danger" role="alert">Güncelleme İşlemi Başarısız.</div>';
            break;


        default: // Varsayılan bildirim.
            //echo '<div class="alert alert-danger" role="alert">Eyvah! Bildirim sisteminde bir sorun oluştu.</div>';
    }
}

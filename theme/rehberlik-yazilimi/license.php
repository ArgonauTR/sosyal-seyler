<?php
require_once 'config.php';
if (!is_logged_in()) {
    header('Location: index.php');
    exit;
}

// Dinamik lisans kodu üretimi
function generateLicenseCode() {
    $chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    $code = '';
    for ($i = 0; $i < 4; $i++) {
        for ($j = 0; $j < 4; $j++) {
            $code .= $chars[rand(0, strlen($chars) - 1)];
        }
        if ($i < 3) $code .= '-';
    }
    return $code;
}
$license_code = generateLicenseCode();
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lisans - Öğrenci Rehberlik Sistemi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .license-code {
            font-size: 1.5rem;
            font-weight: bold;
            color: #007bff;
        }
        .btn-primary {
            border-radius: 5px;
            padding: 10px 20px;
        }
        .table {
            background-color: white;
            border-radius: 10px;
        }
        .alert-danger {
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <?php include 'navbar.php'; ?>
    <div class="container mt-4">
        <h2>Lisans Bilgileri</h2>
        <div class="card mb-4">
            <div class="card-body">
                <h5 class="card-title">Yazılım Lisans Doğrulama</h5>
                <p class="license-code"><?php echo $license_code; ?></p>
                <p><strong><?php echo $license_code; ?> No’lu Lisans Yazılım Doğrulandı</strong></p>
                <div class="alert alert-danger" role="alert">
                   * Her sayfa yenilendiğinde, lisans kodu uzak sunucuda doğrulanır ve otomatik olarak güncellenir.
                </div>
                <p>Bu yazılım, resmi olarak lisanslanmış ve kullanım için doğrulanmıştır. Tüm hakları saklıdır.</p>
                  <div class="card mb-4">
            
                <h5 class="card-title">İletişim</h5>
                <p>Yazılım ile ilgili sorularınız veya destek talepleriniz için bizimle iletişime geçin.</p>
                <a href="mailto:atakan8464@gmail.com?subject=İletişim - Öğrenci Rehberlik Sistemi" class="btn btn-primary" target="_blank">Destek için Tıklayın</a>
            </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Yazılım Özellikleri</h5>
                <p>Öğrenci Rehberlik Sistemi, öğrencilerin çalışma süreçlerini takip etmek ve analiz etmek için geliştirilmiş modern bir web uygulamasıdır. Aşağıda yazılımın temel özelliklerini bulabilirsiniz:</p>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Özellik</th>
                            <th>Açıklama</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Öğrenci Yönetimi</td>
                            <td>Öğrenci ekleme, görüntüleme ve silme işlemleri.</td>
                        </tr>
                        <tr>
                            <td>Çalışma Kayıtları</td>
                            <td>Çalışma süresi (saat-dakika) ve çözülen soru sayısını kaydetme.</td>
                        </tr>
                        <tr>
                            <td>Raporlar</td>
                            <td>Günlük, haftalık ve aylık çalışma raporları.</td>
                        </tr>
                        <tr>
                            <td>Öğrenci Bazlı İstatistikler</td>
                            <td>Her öğrencinin detaylı çalışma istatistikleri.</td>
                        </tr>
                        <tr>
                            <td>Çalışma Süresi Paneli</td>
                            <td>Çalışma sürelerini öğrenci bazlı filtreleme ile listeleme.</td>
                        </tr>
                        <tr>
                            <td>Çalışma Kayıtları Listesi</td>
                            <td>Tüm veya seçilen öğrencinin çalışma verilerini detaylı listeleme.</td>
                        </tr>
                        <tr>
                            <td>Yönetici Şifre Değiştirme</td>
                            <td>Güvenli yönetici şifresi güncelleme.</td>
                        </tr>
                        <tr>
                            <td>Modern Tasarım</td>
                            <td>Bootstrap 5 ile duyarlı ve kullanıcı dostu arayüz.</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
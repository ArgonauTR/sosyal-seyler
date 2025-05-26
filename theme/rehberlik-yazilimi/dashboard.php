<?php
require_once 'config.php';
if (!is_logged_in()) {
    header('Location: index.php');
    exit;
}

// Kullanıcı IP adresi
$user_ip = $_SERVER['REMOTE_ADDR'];

// Toplam öğrenci sayısı
$student_count_query = "SELECT COUNT(*) as total FROM students";
$student_count_result = mysqli_query($conn, $student_count_query);
$student_count = mysqli_fetch_assoc($student_count_result)['total'];
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Öğrenci Rehberlik Sistemi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.15);
            transition: transform 0.3s ease;
            height: 250px; /* Kare için sabit yükseklik */
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .card:hover {
            transform: scale(1.05);
        }
        .welcome-message {
            font-size: 1.5rem;
            font-weight: bold;
        }
        .ip-badge, .student-badge {
            font-size: 0.9rem;
            vertical-align: middle;
            margin-right: 10px;
        }
        .action-card {
            text-align: center;
            padding: 20px;
        }
        .card-title {
            font-size: 1.25rem;
            font-weight: 600;
            margin-bottom: 15px;
        }
        .card-text {
            font-size: 0.9rem;
            margin-bottom: 20px;
        }
        .btn-primary {
            border-radius: 5px;
            padding: 8px 20px;
            transition: background-color 0.3s ease;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
        @media (max-width: 767px) {
            .card {
                height: 200px; /* Mobilde daha küçük */
            }
        }
    </style>
</head>
<body>
    <?php include 'navbar.php'; ?>
    <div class="container mt-4">
        <!-- Hoş Geldiniz, IP ve Öğrenci Sayısı -->
        <div class="card mb-4">
            <div class="card-body">
                <h5 class="welcome-message">Hoş Geldiniz, Admin!</h5>
                <div class="mt-2">
                    <span class="badge bg-secondary ip-badge">IP: <?php echo $user_ip; ?></span>
                    <span class="badge bg-info student-badge">Toplam Öğrenci: <?php echo $student_count; ?></span>
                </div>
                <p class="mt-2">Öğrenci Rehberlik Sistemi'ne hoş geldiniz. Aşağıda hızlı erişim bağlantılarını görebilirsiniz.</p>
            </div>
        </div>

        <!-- Hızlı Erişim Kartları -->
        <div class="row">
            <div class="col-12 col-md-4 mb-4">
                <div class="card action-card">
                    <div class="card-body">
                        <h5 class="card-title">Öğrenciler</h5>
                        <p class="card-text">Öğrenci ekle, düzenle veya sil.</p>
                        <a href="students.php" class="btn btn-primary">Git</a>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-4 mb-4">
                <div class="card action-card">
                    <div class="card-body">
                        <h5 class="card-title">Çalışma Kayıtları</h5>
                        <p class="card-text">Çalışma saatleri ve soru sayılarını ekle.</p>
                        <a href="add_record.php" class="btn btn-primary">Git</a>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-4 mb-4">
                <div class="card action-card">
                    <div class="card-body">
                        <h5 class="card-title">Raporlar</h5>
                        <p class="card-text">Günlük, haftalık, aylık raporları görüntüle.</p>
                        <a href="reports.php" class="btn btn-primary">Git</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
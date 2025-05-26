<?php
require_once 'config.php';
if (!is_logged_in()) {
    header('Location: index.php');
    exit;
}

// Rapor türü ve öğrenci seçimi
$report_type = isset($_GET['type']) ? $_GET['type'] : 'daily';
$student_id = isset($_GET['student_id']) ? $_GET['student_id'] : 'all';

// Öğrencileri listele
$students_query = "SELECT * FROM students";
$students_result = mysqli_query($conn, $students_query);

// Rapor sorguları
$where = $student_id == 'all' ? '' : "AND study_records.student_id = $student_id";
if ($report_type == 'daily') {
    $query = "SELECT students.name, students.surname, study_records.study_time, study_records.solved_questions, study_records.date
              FROM study_records
              JOIN students ON study_records.student_id = students.id
              WHERE DATE(study_records.date) = CURDATE() $where";
} elseif ($report_type == 'weekly') {
    $query = "SELECT students.name, students.surname, 
                     SEC_TO_TIME(SUM(TIME_TO_SEC(study_records.study_time))) as study_time, 
                     SUM(study_records.solved_questions) as solved_questions
              FROM study_records
              JOIN students ON study_records.student_id = students.id
              WHERE YEARWEEK(study_records.date) = YEARWEEK(CURDATE()) $where
              GROUP BY students.id";
} elseif ($report_type == 'monthly') {
    $query = "SELECT students.name, students.surname, 
                     SEC_TO_TIME(SUM(TIME_TO_SEC(study_records.study_time))) as study_time, 
                     SUM(study_records.solved_questions) as solved_questions
              FROM study_records
              JOIN students ON study_records.student_id = students.id
              WHERE MONTH(study_records.date) = MONTH(CURDATE()) AND YEAR(study_records.date) = YEAR(CURDATE()) $where
              GROUP BY students.id";
}

$result = mysqli_query($conn, $query);
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Raporlar</title>
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
        .table {
            background-color: white;
            border-radius: 10px;
        }
    </style>
</head>
<body>
    <?php include 'navbar.php'; ?>
    <div class="container mt-4">
        <h2>Raporlar</h2>
        <div class="card mb-4">
            <div class="card-body">
                <form method="GET" class="row g-3">
                    <div class="col-md-6">
                        <label for="type" class="form-label">Rapor Türü</label>
                        <select class="form-select" id="type" name="type">
                            <option value="daily" <?php if ($report_type == 'daily') echo 'selected'; ?>>Günlük</option>
                            <option value="weekly" <?php if ($report_type == 'weekly') echo 'selected'; ?>>Haftalık</option>
                            <option value="monthly" <?php if ($report_type == 'monthly') echo 'selected'; ?>>Aylık</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="student_id" class="form-label">Öğrenci</label>
                        <select class="form-select" id="student_id" name="student_id">
                            <option value="all">Tüm Öğrenciler</option>
                            <?php while ($row = mysqli_fetch_assoc($students_result)): ?>
                                <option value="<?php echo $row['id']; ?>" <?php if ($student_id == $row['id']) echo 'selected'; ?>>
                                    <?php echo $row['name'] . ' ' . $row['surname']; ?>
                                </option>
                            <?php endwhile; ?>
                        </select>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary">Raporu Görüntüle</button>
                    </div>
                </form>
            </div>
        </div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Ad</th>
                    <th>Soyad</th>
                    <?php if ($report_type == 'daily'): ?>
                        <th>Tarih</th>
                    <?php endif; ?>
                    <th>Çalışma Süresi</th>
                    <th>Çözülen Soru</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($result)): ?>
                    <tr>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['surname']; ?></td>
                        <?php if ($report_type == 'daily'): ?>
                            <td><?php echo $row['date']; ?></td>
                        <?php endif; ?>
                        <td><?php echo substr($row['study_time'], 0, 5); // Sadece saat:dakika göster ?></td>
                        <td><?php echo $row['solved_questions']; ?></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
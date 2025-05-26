<?php
require_once 'config.php';
if (!is_logged_in()) {
    header('Location: index.php');
    exit;
}

// Öğrencileri listele
$students_query = "SELECT * FROM students";
$students_result = mysqli_query($conn, $students_query);

// Kayıt ekleme
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $student_id = $_POST['student_id'];
    $study_hours = (int)$_POST['study_hours'];
    $study_minutes = (int)$_POST['study_minutes'];
    $solved_questions = $_POST['solved_questions'];
    $date = $_POST['date'];
    
    // Saat ve dakikayı TIME formatına çevir
    $study_time = sprintf("%02d:%02d:00", $study_hours, $study_minutes);
    
    $query = "INSERT INTO study_records (student_id, study_time, solved_questions, date) 
              VALUES ($student_id, '$study_time', $solved_questions, '$date')";
    mysqli_query($conn, $query);
}
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Çalışma Kaydı Ekle</title>
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
    </style>
</head>
<body>
    <?php include 'navbar.php'; ?>
    <div class="container mt-4">
        <h2>Çalışma Kaydı Ekle</h2>
        <div class="card">
            <div class="card-body">
                <form method="POST">
                    <div class="mb-3">
                        <label for="student_id" class="form-label">Öğrenci</label>
                        <select class="form-select" id="student_id" name="student_id" required>
                            <?php while ($row = mysqli_fetch_assoc($students_result)): ?>
                                <option value="<?php echo $row['id']; ?>"><?php echo $row['name'] . ' ' . $row['surname']; ?></option>
                            <?php endwhile; ?>
                        </select>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="study_hours" class="form-label">Çalışma Saati</label>
                            <input type="number" class="form-control" id="study_hours" name="study_hours" min="0" max="23" required>
                        </div>
                        <div class="col-md-6">
                            <label for="study_minutes" class="form-label">Dakika</label>
                            <input type="number" class="form-control" id="study_minutes" name="study_minutes" min="0" max="59" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="solved_questions" class="form-label">Çözülen Soru Sayısı</label>
                        <input type="number" class="form-control" id="solved_questions" name="solved_questions" required>
                    </div>
                    <div class="mb-3">
                        <label for="date" class="form-label">Tarih</label>
                        <input type="date" class="form-control" id="date" name="date" required>
                    </div>
                    <button type="submit" class="btn btn-success">Kaydet</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
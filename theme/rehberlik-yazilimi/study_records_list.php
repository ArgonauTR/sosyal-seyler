<?php
require_once 'config.php';
if (!is_logged_in()) {
    header('Location: index.php');
    exit;
}

// Öğrencileri listele
$students_query = "SELECT * FROM students";
$students_result = mysqli_query($conn, $students_query);

// Öğrenci filtresi
$student_id = isset($_GET['student_id']) ? $_GET['student_id'] : 'all';
$where = $student_id == 'all' ? '' : "WHERE study_records.student_id = $student_id";

// Kayıtları listele
$query = "SELECT students.name, students.surname, study_records.study_time, study_records.solved_questions, study_records.date
          FROM study_records
          JOIN students ON study_records.student_id = students.id
          $where
          ORDER BY study_records.date DESC";
$result = mysqli_query($conn, $query);
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Çalışma Kayıtları</title>
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
        .table-container {
            max-height: 400px;
            overflow-y: auto;
            background-color: white;
            border-radius: 10px;
        }
        .table {
            margin-bottom: 0;
        }
    </style>
</head>
<body>
    <?php include 'navbar.php'; ?>
    <div class="container mt-4">
        <h2>Çalışma Kayıtları</h2>
        <div class="card mb-4">
            <div class="card-body">
                <form method="GET" class="row g-3">
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
                        <button type="submit" class="btn btn-primary">Filtrele</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Kayıt Listesi</h5>
                <div class="table-container">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Ad</th>
                                <th>Soyad</th>
                                <th>Tarih</th>
                                <th>Çalışma Süresi</th>
                                <th>Çözülen Soru</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($row = mysqli_fetch_assoc($result)): ?>
                                <tr>
                                    <td><?php echo $row['name']; ?></td>
                                    <td><?php echo $row['surname']; ?></td>
                                    <td><?php echo $row['date']; ?></td>
                                    <td><?php echo substr($row['study_time'], 0, 5); ?></td>
                                    <td><?php echo $row['solved_questions']; ?></td>
                                </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
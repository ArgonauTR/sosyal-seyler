<?php
require_once 'config.php';
if (!is_logged_in()) {
    header('Location: index.php');
    exit;
}

$student_id = $_GET['id'];

// Güncelleme işlemi
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_record'])) {
    $update_id = (int)$_POST['record_id'];
    $new_time = $_POST['study_time'];
    $new_questions = (int)$_POST['solved_questions'];

    $update_query = "UPDATE study_records 
                     SET study_time = '$new_time', solved_questions = $new_questions 
                     WHERE id = $update_id AND student_id = $student_id";
    mysqli_query($conn, $update_query);
    exit; // AJAX için sayfa çıktısı yok
}

// Silme işlemi
if (isset($_GET['delete'])) {
$delete_id = (int)$_GET['delete'];
$delete_query = "DELETE FROM study_records WHERE id = $delete_id AND student_id = $student_id";
mysqli_query($conn, $delete_query);
header("Location: view_student.php?id=$student_id");
exit;
} 

// Öğrenci bilgileri
$student_query = "SELECT * FROM students WHERE id = $student_id";
$student_result = mysqli_query($conn, $student_query);
$student = mysqli_fetch_assoc($student_result);

// İstatistikler
$stats_query = "SELECT 
    SEC_TO_TIME(SUM(TIME_TO_SEC(study_time))) as total_time,
    SUM(solved_questions) as total_questions,
    (SELECT study_time FROM study_records WHERE student_id = $student_id AND DATE(date) = CURDATE() LIMIT 1) as daily_time,
    (SELECT SUM(solved_questions) FROM study_records WHERE student_id = $student_id AND DATE(date) = CURDATE()) as daily_questions,
    (SELECT SEC_TO_TIME(SUM(TIME_TO_SEC(study_time))) FROM study_records WHERE student_id = $student_id AND YEARWEEK(date) = YEARWEEK(CURDATE())) as weekly_time,
    (SELECT SUM(solved_questions) FROM study_records WHERE student_id = $student_id AND YEARWEEK(date) = YEARWEEK(CURDATE())) as weekly_questions,
    (SELECT SEC_TO_TIME(SUM(TIME_TO_SEC(study_time))) FROM study_records WHERE student_id = $student_id AND MONTH(date) = MONTH(CURDATE()) AND YEAR(date) = YEAR(CURDATE())) as monthly_time,
    (SELECT SUM(solved_questions) FROM study_records WHERE student_id = $student_id AND MONTH(date) = MONTH(CURDATE()) AND YEAR(date) = YEAR(CURDATE())) as monthly_questions
    FROM study_records WHERE student_id = $student_id";
$stats_result = mysqli_query($conn, $stats_query);
$stats = mysqli_fetch_assoc($stats_result);

// Çalışma kayıtları
$records_query = "SELECT id, study_time, solved_questions, date 
                 FROM study_records 
                 WHERE student_id = $student_id 
                 ORDER BY date DESC";
$records_result = mysqli_query($conn, $records_query);
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Öğrenci Detayları</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .card { border: none; border-radius: 10px; box-shadow: 0 4px 8px rgba(0,0,0,0.1); }
        .table-container { max-height: 300px; overflow-y: auto; background: #fff; border-radius: 10px; }
        .table { margin-bottom: 0; }
    </style>
</head>
<body>
<?php include 'navbar.php'; ?>
<div class="container mt-4">
    <h2><?php echo $student['name'] . ' ' . $student['surname']; ?> - İstatistikler</h2>
    <div class="row">
        <!-- Günlük, Haftalık, Aylık ve Toplam Kartlar -->
        <?php
        $periods = [
            'Günlük' => ['daily_time', 'daily_questions'],
            'Haftalık' => ['weekly_time', 'weekly_questions'],
            'Aylık' => ['monthly_time', 'monthly_questions'],
            'Toplam' => ['total_time', 'total_questions']
        ];
        $col_classes = ['col-md-4', 'col-md-4', 'col-md-4', 'col-md-12'];
        $i = 0;
        foreach ($periods as $label => [$timeKey, $questionKey]) {
            echo '<div class="' . $col_classes[$i++] . '"><div class="card mb-4"><div class="card-body">';
            echo "<h5 class='card-title'>$label</h5>";
            echo "<p>Çalışma Süresi: " . ($stats[$timeKey] ? substr($stats[$timeKey], 0, 5) : '00:00') . "</p>";
            echo "<p>Çözülen Soru: " . ($stats[$questionKey] ?: 0) . "</p>";
            echo '</div></div></div>';
        }
        ?>
    </div>
    <!-- Kayıt Tablosu -->
    <div class="card mt-4">
        <div class="card-body">
            <h5 class="card-title">Çalışma Kayıtları</h5>
            <div class="table-container">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Tarih</th>
                            <th>Çalışma Süresi</th>
                            <th>Çözülen Soru</th>
                            <th>İşlemler</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php while ($row = mysqli_fetch_assoc($records_result)): ?>
                        <tr>
                            <td><?php echo $row['date']; ?></td>
                            <td><?php echo substr($row['study_time'], 0, 5); ?></td>
                            <td><?php echo $row['solved_questions']; ?></td>
                            <td>
                                <button class="btn btn-sm btn-primary" onclick="openUpdateModal(<?php echo $row['id']; ?>, '<?php echo $row['study_time']; ?>', <?php echo $row['solved_questions']; ?>)">Güncelle</button>
                                <a href="?id=<?php echo $student_id; ?>&delete=<?php echo $row['id']; ?>" class="btn btn-sm btn-danger">Sil</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Güncelleme Modal -->
<div class="modal fade" id="updateModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog"><div class="modal-content">
    <div class="modal-header"><h5 class="modal-title">Kaydı Güncelle</h5>
      <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
    </div>
    <a href="https://atakan.net.tr" class="btn btn-warning btn-sm">
                     :ss kısmı (saniye) 00 olarak kalsın.
                </a>
    <div class="modal-body">
      <form id="updateForm">
        <input type="hidden" name="record_id" id="record_id">
        <div class="mb-3">
            <label>Çalışma Süresi (hh:mm:ss)</label>
            <input type="text" name="study_time" id="study_time" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Çözülen Soru</label>
            <input type="number" name="solved_questions" id="solved_questions" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Kaydet</button>
      </form>
    </div>
  </div></div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
function openUpdateModal(id, time, questions) {
    document.getElementById('record_id').value = id;
    document.getElementById('study_time').value = time;
    document.getElementById('solved_questions').value = questions;
    var modal = new bootstrap.Modal(document.getElementById('updateModal'));
    modal.show();
}

document.getElementById('updateForm').addEventListener('submit', function(e) {
    e.preventDefault();
    const formData = new FormData(this);
    formData.append('update_record', '1');
    fetch('', {
        method: 'POST',
        body: formData
    }).then(() => location.reload());
});
</script>
</body>
</html>
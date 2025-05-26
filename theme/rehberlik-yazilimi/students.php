<?php
require_once 'config.php';
if (!is_logged_in()) {
    header('Location: index.php');
    exit;
}

// Öğrenci ekleme
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_student'])) {
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $query = "INSERT INTO students (name, surname) VALUES ('$name', '$surname')";
    mysqli_query($conn, $query);
}

// Öğrenci silme
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $query = "DELETE FROM students WHERE id = $id";
    mysqli_query($conn, $query);
}

// Öğrencileri listele
$query = "SELECT * FROM students";
$result = mysqli_query($conn, $query);
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Öğrenciler</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php include 'navbar.php'; ?>
    <div class="container mt-4">
        <h2>Öğrenci Yönetimi</h2>
        <!-- Öğrenci Ekleme Formu -->
        <div class="card mb-4">
            <div class="card-body">
                <h5 class="card-title">Yeni Öğrenci Ekle</h5>
                <form method="POST">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="name" class="form-label">Ad</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="surname" class="form-label">Soyad</label>
                            <input type="text" class="form-control" id="surname" name="surname" required>
                        </div>
                    </div>
                    <button type="submit" name="add_student" class="btn btn-success">Ekle</button>
                </form>
            </div>
        </div>
        <!-- Öğrenci Listesi -->
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Ad</th>
                    <th>Soyad</th>
                    <th>İşlemler</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($result)): ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['surname']; ?></td>
                        <td>
                            <a href="view_student.php?id=<?php echo $row['id']; ?>" class="btn btn-info btn-sm">Görüntüle</a>
                            <a href="students.php?delete=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Silmek istediğinizden emin misiniz?');">Sil</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
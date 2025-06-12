<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php
    session_start();
    if (!isset($_SESSION['login'])) {
        header("location:login.php");
        exit;
    }

    include("koneksi.php");
    $id_users = $_SESSION['id_users'];
?>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
    <div class="container-fluid">
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="read.php">Mahasiswa</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php" onclick="return confirm('Yakin ingin logout?')">Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container">
    <div class="d-flex justify-content-between mb-3">
        <h4>Data Mahasiswa</h4>
        <a href="add.php" class="btn btn-success">+ Tambah Mahasiswa</a>
    </div>

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>NIM</th>
                <th>Nama</th>
                <th>Jenis Kelamin</th>
                <th>Email</th>
                <th>No HP</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
        <?php
            $sql = "SELECT * FROM mahasiswa WHERE id_users = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("s", $id_users);
            $stmt->execute();
            $result = $stmt->get_result();

            while ($data = $result->fetch_assoc()) {
        ?>
            <tr>
                <td><?= $data['nim'] ?></td>
                <td><?= $data['nama'] ?></td>
                <td><?= $data['jenkel'] ?></td>
                <td><?= $data['email'] ?></td>
                <td><?= $data['nohp'] ?></td>
                <td>
                    <a href="edit.php?nim=<?= $data['nim'] ?>" class="btn btn-warning btn-sm">Edit</a>
                    <a href="hapus.php?nim=<?= $data['nim'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>

<!-- Bootstrap JS Bundle (Popper + JS) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>

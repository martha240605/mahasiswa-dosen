<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Edit Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>
<div class="container mt-5">
    <h2 class="mb-4">Form Edit Mahasiswa</h2>
    <?php
    include ("koneksi.php");
    $x = $_GET['nim'];
    $sql ="SELECT * FROM mahasiswa WHERE nim = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $x);
    $stmt->execute();
    $result = $stmt->get_result();
    $data = $result->fetch_assoc();
    ?>
    <form action="update.php" method="POST">
        <div class="mb-3">
            <label for="nim" class="form-label">NIM</label>
            <input type="text" class="form-control" name="nim" id="nim" value="<?= htmlspecialchars($data['nim']); ?>" readonly>
            <!-- readonly supaya nim tidak bisa diedit, tapi kalau mau bisa hapus readonly -->
        </div>

        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control" name="nama" id="nama" value="<?= htmlspecialchars($data['nama']); ?>" required>
        </div>

        <div class="mb-3">
            <label for="jenkel" class="form-label">Jenis Kelamin</label>
            <select class="form-select" name="jenkel" id="jenkel" required>
                <option value="Laki-laki" <?= $data['jenkel'] == 'Laki-laki' ? 'selected' : '' ?>>Laki-laki</option>
                <option value="Perempuan" <?= $data['jenkel'] == 'Perempuan' ? 'selected' : '' ?>>Perempuan</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" name="email" id="email" value="<?= htmlspecialchars($data['email']); ?>" required>
        </div>

        <div class="mb-3">
            <label for="nohp" class="form-label">No HP</label>
            <input type="text" class="form-control" name="nohp" id="nohp" value="<?= htmlspecialchars($data['nohp']); ?>" required>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="index.php" class="btn btn-secondary ms-2">Batal</a>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
require_once __DIR__ . "/../../app/controllers/MahasiswaController.php";

$controller = new MahasiswaController();
$mahasiswa = $controller->edit($_GET["id"]);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Mahasiswa</title>
</head>
<body>
    <h2>Edit Mahasiswa</h2>
    <form action="../app/controllers/MahasiswaController.php" method="POST">
        <input type="hidden" name="id_mhs" value="<?= $mahasiswa['id_mhs']; ?>">
        <label for="nama_mhs">Nama Mahasiswa:</label>
        <input type="text" name="nama_mhs" value="<?= $mahasiswa['nama_mhs']; ?>" required>
        <button type="submit">Update</button>
    </form>
    <br>
    <a href="index.php">Kembali ke Daftar Mahasiswa</a>
</body>
</html>

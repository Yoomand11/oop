<?php
require_once __DIR__ . "/../../app/controllers/MahasiswaController.php";

$controller = new MahasiswaController();
$dataMahasiswa = $controller->index();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
</head>
<body>
    <h2>Daftar Mahasiswa</h2>
    <table border="1" cellpadding="8" cellspacing="0">
        <thead>
            <tr>
                <th>ID Mahasiswa</th>
                <th>Nama Mahasiswa</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($dataMahasiswa as $mahasiswa) : ?>
                <tr>
                    <td><?= $mahasiswa["id_mhs"]; ?></td>
                    <td><?= $mahasiswa["nama_mhs"]; ?></td>
                    <td>
                        <a href="edit.php?id=<?= $mahasiswa['id_mhs']; ?>">Edit</a> |
                        <a href="index.php?action=delete&id=<?= $mahasiswa['id_mhs']; ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus?')">Hapus</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <br>
    <a href="form.php">Tambah Mahasiswa</a>
</body>
</html>

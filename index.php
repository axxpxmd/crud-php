<?php
include_once 'koneksi.php';
?>
<!DOCTYPE html>
<html>

<head>
    <title>Home</title>
</head>
<body>
    <h3>Data Mahasiswa</h3>
    <a href="tambah.php">
        Tambah Mahasiswa
    </a>
    <br>
    <br>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Mahasiswa</th>
                <th>NIM</th>
                <th>Kelamin</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $q = "SELECT * FROM mahasiswa";
            $result = mysqli_query($koneksi, $q);
            while ($row = mysqli_fetch_assoc($result)) {
                ?>
                <tr>
                    <td><?= $row['id'] ?></td>
                    <td><?= $row['nama'] ?></td>
                    <td><?= $row['nim'] ?></td>
                    <td><?= $row['kelamin'] ?></td>
                    <td>
                        <a href="edit.php?id=<?= $row['id'] ?>">edit</a>
                        <a href="hapus.php?id=<?= $row['id'] ?>">hapus</a>
                    </td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</body>
</html>
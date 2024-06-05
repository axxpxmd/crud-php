<?php
include_once 'koneksi.php';
?>
<!DOCTYPE html>
<html>

<head>
    <title>Edit</title>
</head>

<body>
    <h3>Edit Data Mahasiswa</h3>
    <br>
    <?php
        $id = $_GET['id'];
        $data = "SELECT * FROM mahasiswa WHERE id = $id";
        $result = mysqli_query($koneksi, $data);
        $row = mysqli_fetch_assoc($result);
    ?>
    <form action="edit.php?id=<?= $row['id'] ?>" method="POST">
        <label>Nama Mahasiswa</label>
        <input type="text" name="nama" value="<?= $row['nama'] ?>">
        <br>
        <br>
        <label>NIM</label>
        <input type="text" name="nim" value="<?= $row['nim'] ?>">
        <br>
        <br>
        <label>Kelamin</label>
        <select name="kelamin">
            <option value="Laki - Laki" <?php if($row['kelamin'] == "Laki - Laki") echo 'selected = "selected"'; ?>>Laki - Laki</option>
            <option value="Perempuan" <?php if($row['kelamin'] == "Perempuan") echo 'selected = "selected"'; ?>>Perempuan</option>
        </select>
        <br>
        <br>
        <button name="update" value="update">Simpan</button>
    </form>
    <?php
    if (isset($_POST['update'])) {
        $nama_mahasiswa = $_POST['nama'];
        $nim = $_POST['nim'];
        $kelamin = $_POST['kelamin'];
        $q = "UPDATE mahasiswa SET nama = '$nama_mahasiswa', nim = '$nim', kelamin = '$kelamin' WHERE id = '$id'";
        $result = mysqli_query($koneksi, $q);
        if ($result) {
            header('location: index.php');
        }
    }
    ?>
</body>

</html>
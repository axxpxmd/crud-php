<?php
include_once 'koneksi.php';
?>
<!DOCTYPE html>
<html>

<head>
    <title>Tambah</title>
</head>

<body>
    <h3>Tambah Data Mahasiswa</h3>
    <br>
    <form action="tambah.php" method="POST">
        <label>Nama Mahasiswa</label>
        <input type="text" name="nama">
        <br>
        <br>
        <label>NIM</label>
        <input type="text" name="nim">
        <br>
        <br>
        <label>Kelamin</label>
        <select name="kelamin">
            <option value="Laki - Laki">Laki - Laki</option>
            <option value="Perempuan">Perempuan</option>
        </select>
        <br>
        <br>
        <button name="tambah" value="tambah">Simpan</button>
    </form>
    <?php
    if (isset($_POST['tambah'])) {
        $nama_mahasiswa = $_POST['nama'];
        $nim = $_POST['nim'];
        $kelamin = $_POST['kelamin'];
        $data = "INSERT INTO mahasiswa (nama, nim, kelamin) VALUES ('$nama_mahasiswa', '$nim', '$kelamin')";
        $result = mysqli_query($koneksi, $data);
        if ($result) {
            header('location: index.php');
        }
    }
    ?>
</body>

</html>
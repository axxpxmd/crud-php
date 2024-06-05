<?php
include_once 'koneksi.php';
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Home</title>

        <!-- Style -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    </head>
    <body>
        <div class="container col-md-6 mt-5">
            <div class="card">  
                <div class="card-header text-black fw-bold">DATA SISWA</div>
                <div class="card-body">
                    <form action="index.php" method="get">
                        <div class="row mb-2">
                            <div class="col-md-6">
                                <input type="text" class="form-control" placeholder="ketikan nama" name="cari">
                            </div>
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-success" value="Cari">Cari</button>
                            </div>
                        </div>
                    </form>
                    <a href="tambah.php" class="btn btn-sm btn-success mb-2"><i class="bi bi-plus me-2"></i>TAMBAH</a>
                    <table class="table table-bordered table-striped">
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
                            if(isset($_GET['cari'])){
                                $cari = $_GET['cari'];
                                $q = "SELECT * FROM mahasiswa WHERE nama LIKE '%".$cari."%'";			
                            }else{
                                $q = "SELECT * FROM mahasiswa";		
                            }

                            $result = mysqli_query($koneksi, $q);
                            while ($row = mysqli_fetch_assoc($result)) {
                                ?>
                                <tr>
                                    <td><?= $row['id'] ?></td>
                                    <td><?= $row['nama'] ?></td>
                                    <td><?= $row['nim'] ?></td>
                                    <td><?= $row['kelamin'] ?></td>
                                    <td class="text-center">
                                        <a href="edit.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-primary"><i class="bi bi-pencil me-2"></i>EDIT</a>
                                        <a href="hapus.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-danger"><i class="bi bi-trash me-2"></i>HAPUS</a>
                                    </td>
                                </tr>
                            <?php
                            }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </body>
</html>
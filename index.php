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
        <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.css" />
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

                    <form action="index.php" method="get">
                        <div class="row mb-2">
                            <div class="col-md-6">
                                <select name="sort" class="form-control">
                                    <option value="asc">asc</option>
                                    <option value="desc">desc</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-success" value="sort">Cari</button>
                            </div>
                        </div>
                    </form>
                    <a href="tambah.php" class="btn btn-sm btn-success mb-2"><i class="bi bi-plus me-2"></i>TAMBAH</a>
                    <table id="myTable" class="table table-bordered table-striped">
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
                            }else if(isset($_GET['sort'])){
                                $sort = $_GET['sort'];

                                if ($sort == 'asc') {
                                    $q = "SELECT * FROM mahasiswa ORDER BY nama ASC";
                                }else{
                                    $q = "SELECT * FROM mahasiswa ORDER BY nama DESC";
                                }
                            }
                            else{
                                $q = "SELECT * FROM mahasiswa";		
                            }

                            $result = mysqli_query($koneksi, $q);
                            while ($row = mysqli_fetch_assoc($result)) {
                                ?>
                                <tr>
                                    <td class="text-center"><?= $row['id'] ?></td>
                                    <td><?= $row['nama'] ?></td>
                                    <td class="text-start"><?= $row['nim'] ?></td>
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
        <!-- Script -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </body>
    <script>
        $(document).ready( function () {
            $('#myTable').DataTable();
        } );
    </script>
</html>
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
            <form action="tambah.php" class="needs-validation" novalidate method="POST">
                <div class="mb-3 row">
                    <label for="nama" class="col-sm-2 col-form-label">Nama Mahasiswa</label>
                    <div class="col-sm-10 has-validation">
                        <input type="text" class="form-control" name="nama" required>
                        <div class="invalid-feedback">
                            Nama Mahasiswa Wajib Disii.
                        </div>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="nim" class="col-sm-2 col-form-label">NIM</label>
                    <div class="col-sm-10">
                        <input type="text" name="nim" class="form-control" id="inputPassword" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="nim" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                    <div class="col-sm-10">
                        <select name="kelamin" class="form-select" required>
                            <option value="">Pilih</option>
                            <option value="Laki - Laki">Laki - Laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-10">
                        <button name="tambah" class="btn btn-sm btn-primary" value="tambah">Simpan</button>
                    </div>
                </div>
            </form>
            </div>
        </div>
    </div>
                    
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
<!-- Script -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script>
    (() => {
    'use strict'

    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    const forms = document.querySelectorAll('.needs-validation')

    // Loop over them and prevent submission
    Array.from(forms).forEach(form => {
        form.addEventListener('submit', event => {
        if (!form.checkValidity()) {
            event.preventDefault()
            event.stopPropagation()
        }

        form.classList.add('was-validated')
        }, false)
    })
    })()
</script>

</html>
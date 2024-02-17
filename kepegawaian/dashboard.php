<?php
include "inc/koneksi.php"; //include koneksi database

// Query untuk mengambil semua data pegawai
$query_pegawai = "SELECT * FROM pegawai";
$result_pegawai = mysqli_query($conn, $query_pegawai);
$total_pegawai = mysqli_num_rows($result_pegawai);

// Query untuk mengambil semua data jabatan
$query_jabatan = "SELECT * FROM jabatan";
$result_jabatan = mysqli_query($conn, $query_jabatan);
$total_jabatan = mysqli_num_rows($result_jabatan);

// Query untuk mengambil semua data kontrak
$query_kontrak = "SELECT * FROM kontrak";
$result_kontrak = mysqli_query($conn, $query_kontrak);
$total_kontrak = mysqli_num_rows($result_kontrak);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="inc/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>

<body>
    <!-- Include Navbar  -->
    <?php include "inc/navbar.php"; ?>
    <!-- Akhir Include Navbar  -->
    <div class="container mt-5">
        <h2 class="text-center mb-4">Dashboard</h2>
        <div class="row">
            <div class="col-md-4">
                <div class="card text-white bg-primary mb-3">
                    <div class="card-header">Total Pegawai</div>
                    <div class="card-body">
                        <h5 class="card-title">
                            <?php echo $total_pegawai; ?>
                        </h5>
                        <p class="card-text">Jumlah total pegawai yang terdaftar.</p>
                        <a href="index.php" class="btn btn-light">Kelola Pegawai</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-white bg-success mb-3">
                    <div class="card-header">Total Jabatan</div>
                    <div class="card-body">
                        <h5 class="card-title">
                            <?php echo $total_jabatan; ?>
                        </h5>
                        <p class="card-text">Jumlah total jabatan yang tersedia.</p>
                        <a href="jabatan.php" class="btn btn-light">Kelola Jabatan</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-white bg-danger mb-3">
                    <div class="card-header">Total Kontrak</div>
                    <div class="card-body">
                        <h5 class="card-title">
                            <?php echo $total_kontrak; ?>
                        </h5>
                        <p class="card-text">Jumlah total kontrak yang aktif.</p>
                        <a href="kontrak.php" class="btn btn-light">Kelola Kontrak</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>
</body>

</html>
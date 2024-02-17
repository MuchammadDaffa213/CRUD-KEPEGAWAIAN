<!-- profile.php -->

<?php
// Sertakan file koneksi database
include "inc/koneksi.php";

// Periksa apakah tombol simpan diklik
if (isset($_POST['btn_simpan'])) {
    // Ambil data dari formulir
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Update data pengguna
    $update = mysqli_query($conn, "UPDATE user SET username = '$username', password = '$password' WHERE id_user = 1");

    if ($update) {
        echo "<script>
            alert('Perubahan disimpan!');
            document.location='profile.php';
        </script>";
    } else {
        echo "<script>
            alert('Gagal menyimpan perubahan!');
            document.location='profile.php';
        </script>";
    }
}

// Ambil data pengguna dari database
$query = mysqli_query($conn, "SELECT * FROM user WHERE id_user  = 1");
$user = mysqli_fetch_assoc($query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="inc/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>

<body class="overflow-x-hidden">
    <section class="min-vh-100" style="background-color: #f3f4f5;">

        <!-- Include Navbar  -->
        <?php include "inc/navbar.php"; ?>
        <!-- Akhir Include Navbar  -->

        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">Profile</div>
                        <div class="card-body">
                            <form action="" method="post">
                                <div class="mb-3">
                                    <label for="username" class="form-label">Username</label>
                                    <input type="text" class="form-control" id="username" name="username"
                                        value="<?= $user['username'] ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" class="form-control" id="password" name="password"
                                        value="<?= $user['password'] ?>" required>
                                </div>
                                <button type="submit" class="btn btn-primary" name="btn_simpan">Simpan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>
</body>

</html>
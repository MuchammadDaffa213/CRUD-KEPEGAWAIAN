<?php
// Mulai sesi
session_start();

// Hapus semua variabel sesi
session_unset();

// Hancurkan sesi
session_destroy();

// Redirect ke halaman login jika pengguna yakin untuk logout
if (isset($_GET['logout']) && $_GET['logout'] == 'true') {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout</title>
    <script>
        // Fungsi untuk menampilkan konfirmasi sebelum logout
        function confirmLogout() {
            var logout = confirm("Anda yakin akan keluar?");
            if (logout) {
                window.location.href = "logout.php?logout=true";
            }
        }
    </script>
</head>

<body onload="confirmLogout()">
    <p>Sedang melakukan logout...</p>
</body>

</html>
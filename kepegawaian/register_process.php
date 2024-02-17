<?php
// Include the database connection file
include "inc/koneksi.php";

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get data from the form
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Insert data into the database
    $query = "INSERT INTO user (username, password) VALUES (?, ?)";
    $statement = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($statement, "ss", $username, $password);

    if (mysqli_stmt_execute($statement)) {
        // Registration successful
        echo "<script>alert('Registrasi berhasil, Silahkan Login'); window.location.href = 'login.php';</script>";
        exit(); // Ensure script stops here to prevent further execution
    } else {
        // Registration failed
        echo "Error: " . mysqli_error($conn);
    }


    mysqli_stmt_close($statement);
    mysqli_close($conn);
}
?>
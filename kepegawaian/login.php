<?php
// Include the database connection file
include_once "inc/koneksi.php";

// Check if form is submitted for login
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["login"])) {
    // Get username and password from the form
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Query to check if the username and password match
    $query = "SELECT * FROM user WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $query);

    // Check if the query returned any rows
    if (mysqli_num_rows($result) == 1) {
        // Redirect to the homepage or any other page after successful login
        header("Location: index.php");
        exit();
    } else {
        // Display error message if login fails
        $error_message = "Username atau Password Salah";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Kepegawaian</title>
    <link rel="stylesheet" href="inc/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>

<body class="overflow-x-hidden">
    <section class="min-vh-100" style="background-color: #f3f4f5;">

        <div class="mx-auto row justify-content-center">
            <div class="col-md-6 mt-5">
                <div class="card">
                    <div class="card-header">
                        Login
                    </div>
                    <div class="card-body">
                        <form id="loginForm" action="login.php" method="post">
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" class="form-control" id="username" name="username">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password">
                            </div>
                            <button type="submit" class="btn btn-primary" name="login">Login</button>
                            <?php if (isset($error_message))
                                echo "<p class='text-danger'>$error_message</p>"; ?>
                        </form>
                    </div>
                    <div class="card-footer text-center">
                        <form action="register.php" method="get">
                            <button type="submit" class="btn btn-link">Register</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </section>
</body>

</html>
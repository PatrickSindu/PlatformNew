<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query tambah user
    $sql = "INSERT INTO user (username, password) VALUES ('$username', '$password')";

    if (mysqli_query($conn, $sql)) {
        echo "Registrasi berhasil!";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        body {
            background-image: url('https://png.pngtree.com/thumb_back/fh260/background/20230818/pngtree-sunrise-mountain-scenery-wallpaper-desktop-for-pc-and-mobile-image_13040555.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="card mx-auto" style="max-width: 400px;">
            <div class="card-header bg-primary text-white">
                <h2 class="text-center">Register</h2>
            </div>
            <div class="card-body">
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                    <div class="form-group">
                        <label for="username">Username:</label>
                        <input type="text" class="form-control" id="username" name="username">
                    </div>
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Register</button>
                </form>
                <a href="login.php" class="btn btn-link mt-3">Login</a>
            </div>
        </div>
    </div>
</body>
</html>




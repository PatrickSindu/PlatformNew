<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $todolist = $_POST['todolist'];
    $username = $_SESSION['username'];

    // Mengambil user_id dari username
    $sql_user_id = "SELECT id FROM user WHERE username='$username'";
    $result_user_id = mysqli_query($conn, $sql_user_id);
    $row_user_id = mysqli_fetch_assoc($result_user_id);
    $user_id = $row_user_id['id'];

    // Query tambah todo
    $sql = "INSERT INTO todo (todolist, user_id, status) VALUES ('$todolist', '$user_id', 'Belum Selesai')";

    if (mysqli_query($conn, $sql)) {
        header("Location: todoList.php");
        exit();
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
    <title>Tambah Todo</title>
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
                <h2 class="text-center">Tambah Todo</h2>
            </div>
            <div class="card-body">
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                    <div class="form-group">
                        <label for="todolist">Todo:</label>
                        <input type="text" class="form-control" id="todolist" name="todolist">
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Tambah</button>
                </form>
                <a href="todoList.php" class="btn btn-link mt-3 d-block">Kembali ke Todo List</a>
                <a href="logout.php" class="btn btn-link mt-1 d-block">Logout</a>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies (not necessary for this layout) -->
    <!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> -->
</body>
</html>



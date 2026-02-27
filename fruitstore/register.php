<?php
include 'koneksi.php';

if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    mysqli_query($conn, "INSERT INTO users(username,password) VALUES('$username','$password')");
    header("Location: login.php");
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Register - FreshFruit Store</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <div class="auth-container">
        <div class="auth-box">
            <h2>🍎 Daftar Akun</h2>
            <p>Buat akun untuk mulai belanja buah segar</p>

            <form method="POST">
                <input type="text" name="username" placeholder="Username" required>
                <input type="password" name="password" placeholder="Password" required>
                <button name="register">Daftar Sekarang</button>
            </form>

            <div class="auth-footer">
                Sudah punya akun?
                <a href="login.php">Login di sini</a>
            </div>
        </div>
    </div>

</body>

</html>
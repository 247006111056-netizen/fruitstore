<?php
include 'koneksi.php';

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $data = mysqli_query($conn, "SELECT * FROM users WHERE username='$username'");
    $user = mysqli_fetch_assoc($data);

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['username'] = $user['username'];
        $_SESSION['role'] = $user['role'];
        header("Location:index.php");
    } else {
        $error = "Username atau Password salah!";
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Login - FreshFruit Store</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <div class="auth-container">
        <div class="auth-box">
            <h2>🍊 Login Akun</h2>
            <p>Masuk untuk mulai belanja buah segar</p>

            <?php if (isset($error)) { ?>
                <p style="color:#f87171;"><?php echo $error; ?></p>
            <?php } ?>

            <form method="POST">
                <input type="text" name="username" placeholder="Username" required>
                <input type="password" name="password" placeholder="Password" required>
                <button name="login">Login Sekarang</button>
            </form>

            <div class="auth-footer">
                Belum punya akun?
                <a href="register.php">Daftar di sini</a>
            </div>
        </div>
    </div>

</body>

</html>
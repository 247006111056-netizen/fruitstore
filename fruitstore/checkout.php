<?php
session_start();
unset($_SESSION['cart']);
?>

<!DOCTYPE html>
<html>

<head>
    <title>Checkout Berhasil</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <div class="success-box">
        <h1>🎉 Checkout Berhasil!</h1>
        <p>Terima kasih sudah berbelanja di FreshFruit Store 🍎</p>
        <a href="index.php" class="btn-back">Kembali ke Toko</a>
    </div>

</body>

</html>
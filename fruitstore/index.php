<?php
include 'koneksi.php';
$data = mysqli_query($conn, "SELECT * FROM produk");
?>

<!DOCTYPE html>
<html>

<head>
    <title>FreshFruit Store</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <header>
        <h2>🍎 FreshFruit Store</h2>
        <div>
            <a href="index.php">Home</a>
            <a href="cart.php">Keranjang</a>
            <?php if (isset($_SESSION['username'])) { ?>
                <a href="logout.php">Logout</a>
            <?php } else { ?>
                <a href="login.php">Login</a>
            <?php } ?>
        </div>
    </header>

    <div class="container">
        <div class="grid">
            <?php while ($row = mysqli_fetch_assoc($data)) { ?>
                <div class="card">
                    <img src="gambar/<?php echo $row['gambar']; ?>">
                    <div class="card-body">
                        <h3><?php echo $row['nama']; ?></h3>
                        <div class="price">Rp <?php echo number_format($row['harga']); ?></div>
                        <a href="detail.php?id=<?php echo $row['id']; ?>">
                            <button>Beli Sekarang</button>
                        </a>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>

</body>

</html>
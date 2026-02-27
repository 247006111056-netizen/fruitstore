<?php
session_start();
include 'koneksi.php';

$total = 0;
?>

<!DOCTYPE html>
<html>

<head>
    <title>Keranjang - FreshFruit Store</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <div class="container">
        <h2 class="page-title">🛒 Keranjang Belanja</h2>

        <div class="cart-box">
            <?php
            if (isset($_SESSION['cart'])) {
                foreach ($_SESSION['cart'] as $id => $qty) {
                    $data = mysqli_query($conn, "SELECT * FROM produk WHERE id='$id'");
                    $d = mysqli_fetch_assoc($data);

                    $subtotal = $d['harga'] * $qty;
                    $total += $subtotal;
            ?>
                    <div class="cart-item">
                        <img src="gambar/<?php echo $d['gambar']; ?>">
                        <div>
                            <h3><?php echo $d['nama']; ?></h3>
                            <p>Rp <?php echo number_format($d['harga']); ?> x <?php echo $qty; ?></p>
                            <strong>Subtotal: Rp <?php echo number_format($subtotal); ?></strong>
                        </div>
                    </div>
            <?php }
            } ?>

            <div class="cart-total">
                Total Belanja: Rp <?php echo number_format($total); ?>
            </div>

            <a href="checkout.php" class="btn-checkout">Checkout Sekarang</a>
        </div>
    </div>

</body>

</html>
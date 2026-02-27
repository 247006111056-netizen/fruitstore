<?php
include 'koneksi.php';

$id = $_GET['id'];
$data = mysqli_query($conn, "SELECT * FROM produk WHERE id=$id");
$row = mysqli_fetch_assoc($data);

if (!$row) {
    echo "Produk tidak ditemukan!";
    exit;
}
?>

<!DOCTYPE html>
<html>

<head>
    <title><?php echo $row['nama']; ?></title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <header>
        <h2>🍎 Detail Buah</h2>
        <a href="index.php">Kembali</a>
    </header>

    <div class="container">
        <div class="card">
            <img src="gambar/<?php echo $row['gambar']; ?>">
            <div class="card-body">
                <h2><?php echo $row['nama']; ?></h2>
                <p><?php echo $row['deskripsi']; ?></p>
                <h3 class="price">Rp <?php echo number_format($row['harga']); ?></h3>

                <a href="cart.php?id=<?php echo $row['id']; ?>">
                    <button>Tambah ke Keranjang</button>
                </a>
            </div>
        </div>
    </div>

</body>

</html>
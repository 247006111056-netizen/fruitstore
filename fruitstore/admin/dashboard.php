<?php
include '../koneksi.php';

if ($_SESSION['role'] != 'admin') {
    header("Location:../index.php");
}

$data = mysqli_query($conn, "SELECT * FROM produk");
?>

<h2>Dashboard Admin</h2>
<a href="tambah.php">Tambah Produk</a>
<hr>

<?php while ($row = mysqli_fetch_assoc($data)) { ?>
    <?php echo $row['nama']; ?> - Rp <?php echo $row['harga']; ?>
    <a href="edit.php?id=<?php echo $row['id']; ?>">Edit</a>
    <a href="hapus.php?id=<?php echo $row['id']; ?>">Hapus</a>
    <br>
<?php } ?>
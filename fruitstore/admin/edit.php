<?php
include '../koneksi.php';

if ($_SESSION['role'] != 'admin') {
    header("Location: ../index.php");
    exit;
}

$id = $_GET['id'];
$data = mysqli_query($conn, "SELECT * FROM produk WHERE id=$id");
$row = mysqli_fetch_assoc($data);

if (isset($_POST['update'])) {
    $nama = $_POST['nama'];
    $deskripsi = $_POST['deskripsi'];
    $harga = $_POST['harga'];

    if ($_FILES['gambar']['name'] != "") {
        $gambar = $_FILES['gambar']['name'];
        move_uploaded_file($_FILES['gambar']['tmp_name'], "../gambar/" . $gambar);

        mysqli_query($conn, "UPDATE produk SET 
            nama='$nama',
            deskripsi='$deskripsi',
            harga='$harga',
            gambar='$gambar'
            WHERE id=$id");
    } else {
        mysqli_query($conn, "UPDATE produk SET 
            nama='$nama',
            deskripsi='$deskripsi',
            harga='$harga'
            WHERE id=$id");
    }

    header("Location: dashboard.php");
}
?>

<h2>Edit Produk</h2>

<form method="POST" enctype="multipart/form-data">
    <input type="text" name="nama" value="<?php echo $row['nama']; ?>"><br><br>
    <textarea name="deskripsi"><?php echo $row['deskripsi']; ?></textarea><br><br>
    <input type="number" name="harga" value="<?php echo $row['harga']; ?>"><br><br>
    Ganti Gambar: <input type="file" name="gambar"><br><br>
    <button name="update">Update</button>
</form>
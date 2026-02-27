<?php
include '../koneksi.php';

if (isset($_POST['simpan'])) {
    $nama = $_POST['nama'];
    $deskripsi = $_POST['deskripsi'];
    $harga = $_POST['harga'];
    $gambar = $_FILES['gambar']['name'];

    move_uploaded_file($_FILES['gambar']['tmp_name'], "../gambar/" . $gambar);

    mysqli_query($conn, "INSERT INTO produk VALUES(NULL,'$nama','$deskripsi','$harga','$gambar')");
    header("Location:dashboard.php");
}
?>

<form method="POST" enctype="multipart/form-data">
    <input type="text" name="nama" placeholder="Nama Buah"><br>
    <textarea name="deskripsi" placeholder="Deskripsi"></textarea><br>
    <input type="number" name="harga" placeholder="Harga"><br>
    <input type="file" name="gambar"><br>
    <button name="simpan">Simpan</button>
</form>
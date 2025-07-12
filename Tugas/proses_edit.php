<?php
include 'inc/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $nama = $_POST['nama_produk'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];

    $stmt = $conn->prepare("UPDATE produk SET nama_produk=?, harga=?, stok=? WHERE id_produk=?");
    $stmt->execute([$nama, $harga, $stok, $id]);

    header("Location: index.php");
    exit;
} else {
    echo "Akses tidak diizinkan.";
}
?>
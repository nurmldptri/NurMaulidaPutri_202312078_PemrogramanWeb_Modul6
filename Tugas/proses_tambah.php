<?php
include 'inc/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama_produk'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];

    $stmt = $conn->prepare("INSERT INTO produk (nama_produk, harga, stok) VALUES (?, ?, ?)");
    $stmt->execute([$nama, $harga, $stok]);

    header("Location: index.php");
    exit;
} else {
    echo "Akses tidak diizinkan.";
}
?>
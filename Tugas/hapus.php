<?php
include 'inc/koneksi.php';

$id = $_GET['id'];
$stmt = $conn->prepare("DELETE FROM produk WHERE id_produk = ?");
$stmt->execute([$id]);

header("Location: index.php");
exit;
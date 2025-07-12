<?php
include 'inc/koneksi.php';
$id = $_GET['id'];
$stmt = $conn->prepare("SELECT * FROM produk WHERE id_produk = ?");
$stmt->execute([$id]);
$data = $stmt->fetch();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $nama = $_POST['nama_produk'];
  $harga = $_POST['harga'];
  $stok = $_POST['stok'];

  $stmt = $conn->prepare("UPDATE produk SET nama_produk=?, harga=?, stok=? WHERE id_produk=?");
  $stmt->execute([$nama, $harga, $stok, $id]);

  header("Location: index.php");
  exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Edit Produk - Toko Maulideas</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body { background-color: #fff0f5; }
    h2 { color: #e91e63; }
    .btn-primary { background-color: #f06292; border: none; }
  </style>
</head>
<body class="container py-4">
  <h2 class="mb-4">✏️ Edit Produk</h2>

  <form method="post">
    <div class="mb-3">
      <label>Nama Produk</label>
      <input type="text" name="nama_produk" class="form-control" value="<?= htmlspecialchars($data['nama_produk']) ?>" required>
    </div>
    <div class="mb-3">
      <label>Harga</label>
      <input type="number" name="harga" class="form-control" value="<?= $data['harga'] ?>" required>
    </div>
    <div class="mb-3">
      <label>Stok</label>
      <input type="number" name="stok" class="form-control" value="<?= $data['stok'] ?>" required>
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
    <a href="index.php" class="btn btn-secondary">Batal</a>
  </form>
</body>
</html>
<?php
include('../koneksi.php');
session_start();

if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit;
}

// Validasi ID
if (!isset($_GET['id_artikel']) || !is_numeric($_GET['id_artikel'])) {
    echo "<script>alert('ID artikel tidak valid.'); history.back();</script>";
    exit;
}

$id = intval($_GET['id_artikel']);

// Cek apakah data artikel memang ada
$cek = mysqli_query($db, "SELECT * FROM tbl_artikel WHERE id_artikel = $id");
if (mysqli_num_rows($cek) == 0) {
    echo "<script>alert('Artikel tidak ditemukan.'); history.back();</script>";
    exit;
}

$sql = "DELETE FROM tbl_artikel WHERE id_artikel = $id LIMIT 1"; // Tambahkan LIMIT 1 sebagai proteksi ekstra
$query = mysqli_query($db, $sql);

if ($query) {
    echo "<script>alert('Artikel berhasil dihapus.');
    window.location='data_artikel.php';</script>";
} else {
    echo "<script>alert('Gagal menghapus artikel.');
    history.back();</script>";
}
?>

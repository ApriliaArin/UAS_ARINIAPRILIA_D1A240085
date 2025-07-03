<?php
include('../koneksi.php');
session_start();

if (!isset($_SESSION['username'])) {
    header('location:login.php');
    exit;
}

$id = $_POST['id_gallery'];
$judul = mysqli_real_escape_string($db, $_POST['judul']);

// Cek apakah user upload gambar baru
if (isset($_FILES['foto']) && $_FILES['foto']['error'] === 0) {
    // Ambil nama lama
    $get = mysqli_query($db, "SELECT foto FROM tbl_gallery WHERE id_gallery = '$id'");
    $old = mysqli_fetch_assoc($get);
    $oldFile = $old['foto'];

    // Upload file baru
    $namaBaru = time() . '_' . $_FILES['foto']['name'];
    $tmp = $_FILES['foto']['tmp_name'];
    $folder = '../images/';
    move_uploaded_file($tmp, $folder . $namaBaru);

    // Hapus file lama (jika ada)
    if (file_exists($folder . $oldFile)) {
        unlink($folder . $oldFile);
    }

    // Update judul dan gambar baru
    $sql = "UPDATE tbl_gallery SET judul = '$judul', foto = '$namaBaru' WHERE id_gallery = '$id'";
} else {
    // Tanpa ganti gambar
    $sql = "UPDATE tbl_gallery SET judul = '$judul' WHERE id_gallery = '$id'";
}

$query = mysqli_query($db, $sql);

if ($query) {
    echo "<script>alert('Gallery berhasil diperbarui.'); window.location='data_gallery.php';</script>";
} else {
    echo "<script>alert('Gagal memperbarui.'); history.back();</script>";
}
?>

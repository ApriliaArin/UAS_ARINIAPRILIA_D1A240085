<?php
include('../koneksi.php');
session_start();

// Cek login
if (!isset($_SESSION['username'])) {
    header('location:login.php');
    exit;
}

// Jika form disubmit (klik tombol update)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = intval($_POST['id_artikel']);
    $judul = mysqli_real_escape_string($db, $_POST['nama_artikel']);
    $isi = mysqli_real_escape_string($db, $_POST['isi_artikel']);

    $sql = "UPDATE tbl_artikel SET nama_artikel = '$judul', isi_artikel = '$isi' WHERE id_artikel = $id";
    $query = mysqli_query($db, $sql);

    if ($query) {
        echo "<script>alert('Artikel berhasil diperbarui.'); window.location='data_artikel.php';</script>";
        exit;
    } else {
        echo "<script>alert('Gagal memperbarui artikel.'); history.back();</script>";
        exit;
    }
}

// Kalau belum submit, ambil data artikel
if (!isset($_GET['id_artikel']) || !is_numeric($_GET['id_artikel'])) {
    echo "<script>alert('ID artikel tidak valid.'); history.back();</script>";
    exit;
}

$id = $_GET['id_artikel'];
$sql = "SELECT * FROM tbl_artikel WHERE id_artikel = '$id'";
$query = mysqli_query($db, $sql);
$data = mysqli_fetch_array($query);

if (!$data) {
    echo "<script>alert('Artikel tidak ditemukan.'); history.back();</script>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en" class="">
<head>
<meta charset="UTF-8">
<title>Edit Artikel</title>
<script src="https://cdn.tailwindcss.com"></script>
<script>
  tailwind.config = {
    darkMode: 'class'
  };
</script>
</head>
<body class="bg-blue-100 dark:bg-gray-900 text-gray-800 dark:text-gray-100 min-h-screen transition-all duration-500">

<!-- Tombol Dark Mode -->
<button id="toggleDark" class="fixed top-5 right-5 z-50 text-2xl" title="Toggle Dark Mode">🌛</button>

<!-- Header -->
<header class="bg-blue-300 dark:bg-gray-800 text-white text-center py-6 shadow">
<h1 class="text-3xl font-bold">Edit Artikel</h1>
</header>

<div class="flex max-w-7xl mx-auto mt-8 px-4">
<aside class="w-1/4 bg-white dark:bg-gray-800 rounded shadow p-4">
<h2 class="text-xl font-semibold text-blue-700 dark:text-blue-300 mb-4">MENU</h2>
<ul class="space-y-2 text-gray-700 dark:text-gray-200">
<li><a href="beranda_admin.php" class="block hover:text-blue-600 dark:hover:text-blue-400">Beranda</a></li>
<li><a href="data_artikel.php" class="block font-semibold text-blue-800 dark:text-blue-300">Kelola Artikel</a></li>
<li><a href="data_gallery.php" class="block hover:text-blue-600 dark:hover:text-blue-400">Kelola Gallery</a></li>
<li><a href="about.php" class="block hover:text-blue-600 dark:hover:text-blue-400">About</a></li>
<li><a href="logout.php" onclick="return confirm('Apakah anda yakin ingin keluar?');" class="block text-red-600 hover:underline font-medium">Logout</a></li>
</ul>
</aside>

<main class="w-3/4 bg-white dark:bg-gray-800 rounded shadow p-6 ml-6">
<form action="" method="post" class="space-y-6">
<input type="hidden" name="id_artikel" value="<?php echo $data['id_artikel']; ?>">

<div>
<label for="nama_artikel" class="block text-sm font-medium text-gray-700 dark:text-gray-200 mb-1">Judul Artikel</label>
<input type="text" id="nama_artikel" name="nama_artikel" required
value="<?php echo htmlspecialchars($data['nama_artikel']); ?>"
class="w-full p-2 border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-white rounded focus:outline-none focus:ring focus:border-blue-500 dark:focus:border-blue-400">
</div>

<div>
<label for="isi_artikel" class="block text-sm font-medium text-gray-700 dark:text-gray-200 mb-1">Isi Artikel</label>
<textarea id="isi_artikel" name="isi_artikel" rows="5" required
class="w-full p-2 border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-white rounded focus:outline-none focus:ring focus:border-blue-500 dark:focus:border-blue-400"><?php echo htmlspecialchars($data['isi_artikel']); ?></textarea>
</div>

<div class="flex justify-end space-x-4">
<button type="submit" class="bg-blue-700 hover:bg-blue-800 text-white px-4 py-2 rounded transition">Update</button>
<a href="data_artikel.php" class="bg-gray-300 dark:bg-gray-600 text-gray-700 dark:text-white px-4 py-2 rounded hover:bg-gray-400 dark:hover:bg-gray-500 transition">Batal</a>
</div>
</form>
</main>
</div>

<footer class="bg-blue-300 dark:bg-gray-800 text-white text-center py-4 mt-10">
&copy; <?php echo date('Y'); ?> | Created by ARINI APRILIA
</footer>

<!-- Script Toggle Dark Mode -->
<script>
  const toggleBtn = document.getElementById('toggleDark');
  const htmlEl = document.documentElement;

  if (localStorage.getItem('theme') === 'dark') {
    htmlEl.classList.add('dark');
    toggleBtn.textContent = '🌞';
  }

  toggleBtn.addEventListener('click', () => {
    htmlEl.classList.toggle('dark');
    if (htmlEl.classList.contains('dark')) {
      toggleBtn.textContent = '🌞';
      localStorage.setItem('theme', 'dark');
    } else {
      toggleBtn.textContent = '🌛';
      localStorage.setItem('theme', 'light');
    }
  });
</script>

</body>
</html>

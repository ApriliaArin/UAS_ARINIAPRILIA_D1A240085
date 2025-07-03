<?php
session_start();
if (!isset($_SESSION['username'])) {
  header('location:login.php');
  exit;
}
require_once("../koneksi.php");
$username = $_SESSION['username'];
$sql = "SELECT * FROM tbl_user WHERE username = '$username'";
$query = mysqli_query($db, $sql);
$hasil = mysqli_fetch_array($query);
?>
<!DOCTYPE html>
<html lang="en" class="">
<head>
  <meta charset="UTF-8">
  <title>Dashboard Admin</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      darkMode: 'class',
    };
  </script>
</head>
<body class="bg-blue-100 dark:bg-gray-900 text-gray-800 dark:text-gray-100 min-h-screen transition-all duration-500">
<!-- Tombol Dark Mode -->
<button id="toggleDark" class="fixed top-5 right-5 z-50 text-2xl" title="Toggle Dark Mode">🌛</button>

<!-- Header -->
<header class="bg-blue-300 dark:bg-gray-800 text-white text-center py-6 shadow">
  <h1 class="text-3xl font-bold">Halaman Administrator</h1>
</header>

<!-- Container -->
<div class="flex max-w-7xl mx-auto mt-8 px-4">
  <!-- Sidebar -->
  <aside class="w-1/4 bg-white dark:bg-gray-800 rounded shadow p-4">
    <h2 class="text-xl font-semibold text-blue-700 dark:text-blue-300 mb-4 text-center">MENU</h2>
    <ul class="space-y-2 text-gray-700 dark:text-gray-200">
      <li><a href="beranda_admin.php" class="block hover:text-blue-600 dark:hover:text-blue-400">Beranda</a></li>
      <li><a href="data_artikel.php" class="block hover:text-blue-600 dark:hover:text-blue-400">Kelola Artikel</a></li>
      <li><a href="data_gallery.php" class="block hover:text-blue-600 dark:hover:text-blue-400">Kelola Gallery</a></li>
      <li><a href="about.php" class="block hover:text-blue-600 dark:hover:text-blue-400">About</a></li>
      <li>
        <a href="logout.php" onclick="return confirm('Apakah anda yakin ingin keluar?');"
           class="block text-red-600 hover:underline font-medium">Logout</a>
      </li>
    </ul>
  </aside>

  <?php
  // Hitung total artikel
  $jumlah_artikel = mysqli_num_rows(mysqli_query($db, "SELECT id_artikel FROM tbl_artikel"));
  // Hitung total gallery
  $jumlah_gallery = mysqli_num_rows(mysqli_query($db, "SELECT id_gallery FROM tbl_gallery"));
  ?>

  <!-- Main Content -->
  <main class="w-3/4 bg-white dark:bg-gray-800 rounded shadow p-6 ml-6">
    <div class="text-lg mb-4">
      Halo, <strong class="text-blue-700 dark:text-blue-300"><?php echo $_SESSION['username']; ?></strong>! Apa kabar? 😊
    </div>
    <p class="text-sm text-gray-500 dark:text-gray-400">Silakan gunakan menu di samping untuk mengelola data.</p>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mt-6">
      <div class="bg-white dark:bg-gray-700 shadow rounded p-4 text-center border-t-4 border-blue-600 dark:border-blue-400">
        <h3 class="text-xl font-semibold text-blue-700 dark:text-blue-300">Artikel</h3>
        <p class="text-3xl font-bold"><?php echo $jumlah_artikel; ?></p>
      </div>
      <div class="bg-white dark:bg-gray-700 shadow rounded p-4 text-center border-t-4 border-green-600 dark:border-green-400">
        <h3 class="text-xl font-semibold text-green-700 dark:text-green-300">Gallery</h3>
        <p class="text-3xl font-bold"><?php echo $jumlah_gallery; ?></p>
      </div>
    </div>
  </main>
</div>

<!-- Footer -->
<footer class="bg-blue-300 dark:bg-gray-800 text-white text-center py-4 mt-10">
  &copy; <?php echo date('Y'); ?> | Created by ARINI APRILIA
</footer>

<!-- Script Toggle Dark Mode -->
<script>
  const toggleBtn = document.getElementById('toggleDark');
  const htmlEl = document.documentElement;

  // Inisialisasi mode dari localStorage
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

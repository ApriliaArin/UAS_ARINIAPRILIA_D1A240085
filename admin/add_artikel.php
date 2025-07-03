<?php
include('../koneksi.php');
session_start();
if (!isset($_SESSION['username'])) {
  header('location:login.php');
  exit;
}
?>
<!DOCTYPE html>
<html lang="en" class="">
<head>
  <meta charset="UTF-8">
  <title>Tambah Artikel</title>
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
  <h1 class="text-3xl font-bold">Tambah Artikel Baru</h1>
</header>

<div class="flex max-w-7xl mx-auto mt-8 px-4">
  <!-- Sidebar -->
  <aside class="w-1/4 bg-white dark:bg-gray-800 rounded shadow p-4">
    <h2 class="text-xl font-semibold text-blue-700 dark:text-blue-300 mb-4 text-center">MENU</h2>
    <ul class="space-y-2 text-gray-700 dark:text-gray-200">
      <li><a href="beranda_admin.php" class="block hover:text-blue-600 dark:hover:text-blue-400">Beranda</a></li>
      <li><a href="data_artikel.php" class="block font-semibold text-blue-800 dark:text-blue-300">Kelola Artikel</a></li>
      <li><a href="data_gallery.php" class="block hover:text-blue-600 dark:hover:text-blue-400">Kelola Gallery</a></li>
      <li><a href="about.php" class="block hover:text-blue-600 dark:hover:text-blue-400">About</a></li>
      <li>
        <a href="logout.php" onclick="return confirm('Apakah anda yakin ingin keluar?');"
           class="block text-red-600 hover:underline font-medium">Logout</a>
      </li>
    </ul>
  </aside>

  <!-- Main Content -->
  <main class="w-3/4 bg-white dark:bg-gray-800 rounded shadow p-6 ml-6">
    <form action="proses_add_artikel.php" method="post" class="space-y-6">
      <div>
        <label for="nama_artikel" class="block text-sm font-medium text-gray-700 dark:text-gray-200 mb-1">Judul Artikel</label>
        <input type="text" id="nama_artikel" name="nama_artikel" required
               class="w-full p-2 border border-gray-300 dark:border-gray-600 rounded bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:outline-none focus:ring focus:border-blue-500 dark:focus:border-blue-400">
      </div>
      <div>
        <label for="isi_artikel" class="block text-sm font-medium text-gray-700 dark:text-gray-200 mb-1">Isi Artikel</label>
        <textarea id="isi_artikel" name="isi_artikel" rows="5" required
                  class="w-full p-2 border border-gray-300 dark:border-gray-600 rounded bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:outline-none focus:ring focus:border-blue-500 dark:focus:border-blue-400"></textarea>
      </div>
      <div class="flex justify-end space-x-4">
        <button type="submit"
                class="bg-blue-700 hover:bg-blue-800 text-white px-4 py-2 rounded transition">Simpan</button>
        <a href="data_artikel.php"
           class="bg-gray-300 dark:bg-gray-600 hover:bg-gray-400 dark:hover:bg-gray-500 text-gray-700 dark:text-white px-4 py-2 rounded transition">Batal</a>
      </div>
    </form>
  </main>
</div>

<!-- Footer -->
<footer class="bg-blue-300 dark:bg-gray-800 text-white text-center py-4 mt-10">
  &copy; <?php echo date('Y'); ?> | Created by ARINI APRILIA
</footer>

<!-- Script Dark Mode -->
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

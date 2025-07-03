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
  <title>Kelola Artikel</title>
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
  <h1 class="text-3xl font-bold">Kelola Artikel</h1>
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
    <div class="flex justify-between items-center mb-4">
      <h2 class="text-xl font-bold">Daftar Artikel</h2>
      <a href="add_artikel.php"
         class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded transition">+ Tambah Artikel</a>
    </div>
    <table class="min-w-full table-auto border border-gray-300 dark:border-gray-600 text-sm">
      <thead class="bg-blue-600 dark:bg-gray-700 text-white">
        <tr>
          <th class="p-3 border">No</th>
          <th class="p-3 border">Nama Artikel</th>
          <th class="p-3 border">Isi Artikel</th>
          <th class="p-3 border">Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $sql = "SELECT * FROM tbl_artikel";
        $query = mysqli_query($db, $sql);
        $no = 1;
        while ($data = mysqli_fetch_array($query)) {
          echo "<tr class='even:bg-gray-50 dark:even:bg-gray-700'>";
          echo "<td class='border p-2 text-center'>" . $no++ . "</td>";
          echo "<td class='border p-2'>" . htmlspecialchars($data['nama_artikel']) . "</td>";
          echo "<td class='border p-2'>" . htmlspecialchars($data['isi_artikel']) . "</td>";
          echo "<td class='border p-2 text-center space-x-2'>
                  <a href='edit_artikel.php?id_artikel={$data['id_artikel']}' class='text-blue-600 dark:text-blue-400 hover:underline'>Edit</a>
                  <a href='delete_artikel.php?id_artikel={$data['id_artikel']}'
                     onclick='return confirm(\"Yakin ingin menghapus?\")'
                     class='text-red-600 hover:underline'>Hapus</a>
                </td>";
          echo "</tr>";
        }
        ?>
      </tbody>
    </table>
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

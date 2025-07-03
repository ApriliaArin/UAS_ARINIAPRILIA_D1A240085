<?php include "koneksi.php"; ?> 
<!DOCTYPE html>
<html lang="en" class="">
<head>
  <meta charset="UTF-8">
  <title>Gallery | Personal Web</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    // Dark mode configuration via Tailwind
    tailwind.config = {
      darkMode: 'class',
    };
  </script>
</head>
<body class="bg-blue-100 text-gray-800 font-sans dark:bg-gray-900 dark:text-gray-100">

<!-- Header -->
<header class="bg-blue-500 dark:bg-gray-800 text-white text-center p-6 text-2xl font-bold relative">
  Gallery | ARINI APRILIA
  <!-- Tombol Toggle Dark Mode -->
  <button id="toggleDark" class="absolute top-4 right-4 text-2xl" title="Toggle Dark Mode">🌛</button>
</header>

<!-- Navigation -->
<nav class="bg-blue-300 dark:bg-gray-700 text-white py-3">
  <ul class="flex justify-center space-x-10 font-medium text-lg">
    <li><a href="index.php" class="hover:underline">Artikel</a></li>
    <li><a href="gallery.php" class="hover:underline">Gallery</a></li>
    <li><a href="about.php" class="hover:underline">About</a></li>
    <li><a href="admin/login.php" class="hover:underline">Login</a></li>
  </ul>
</nav>

<!-- Gallery Grid -->
<main class="max-w-6xl mx-auto p-6">
  <h2 class="text-xl font-bold mb-6 text-center">Galeri Foto</h2>
  <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
    <?php
    $sql = "SELECT * FROM tbl_gallery ORDER BY id_gallery DESC";
    $query = mysqli_query($db, $sql);
    while ($data = mysqli_fetch_array($query)) {
      echo "<div class='bg-white dark:bg-gray-800 border rounded shadow overflow-hidden'>";
      echo "<div class='border-4 border-blue-500 p-1 rounded-none'>";
      echo "<img src='images/{$data['foto']}' alt='Gambar' class='w-full h-64 object-cover'>";
      echo "</div>";
      echo "<div class='px-4 pb-4 pt-2'>";
      echo "<h3 class='text-lg font-semibold text-blue-700 dark:text-blue-300'>" . htmlspecialchars($data['judul']) . "</h3>";
      echo "</div></div>";
    }
    ?>
  </div>
</main>

<!-- Footer -->
<footer class="bg-blue-300 dark:bg-gray-700 text-white text-center py-4 mt-10">
  &copy; <?php echo date('Y'); ?> | Created by ARINI APRILIA
</footer>

<!-- Script Toggle Dark Mode -->
<script>
  const toggleBtn = document.getElementById('toggleDark');
  const htmlEl = document.documentElement;

  // Cek preferensi dari localStorage
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

<?php include "koneksi.php"; ?>
<!DOCTYPE html>
<html lang="en" class="transition duration-500">
<head>
    <meta charset="UTF-8">
    <title>Personal Web | Home</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class'
        }
    </script>
</head>
<body class="bg-blue-100 dark:bg-gray-900 text-gray-800 dark:text-gray-100 font-sans transition duration-500">

<!-- Toggle Dark Mode Button -->
<div class="absolute top-4 right-4 z-50">
    <button id="toggleDarkMode" class="text-2xl">
        🌛
    </button>
</div>

<!-- Header -->
<header class="bg-blue-500 dark:bg-gray-800 text-white text-center p-6 text-2xl font-bold">
    Personal Web | ARINI APRILIA
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

<!-- Main Content -->
<main class="max-w-6xl mx-auto p-6 grid grid-cols-1 md:grid-cols-3 gap-6 mt-6">

    <!-- Artikel Utama -->
    <section class="md:col-span-2 bg-white dark:bg-gray-800 p-6 rounded shadow">
        <h2 class="text-xl font-bold mb-4">Artikel Terbaru</h2>
        <div class="space-y-4">
        <?php
        $sql = "SELECT * FROM tbl_artikel ORDER BY id_artikel DESC";
        $query = mysqli_query($db, $sql);
        while ($data = mysqli_fetch_array($query)) {
            echo "<div class='border-b border-gray-300 dark:border-gray-600 pb-4'>";
            echo "<h3 class='text-lg font-semibold text-blue-700 dark:text-blue-300'>" .
            htmlspecialchars($data['nama_artikel']) . "</h3>";
            echo "<p>" . htmlspecialchars($data['isi_artikel']) . "</p>";
            echo "</div>";
        }
        ?>
        </div>
    </section>

    <!-- Sidebar -->
    <aside class="bg-white dark:bg-gray-800 p-6 rounded shadow">
        <h2 class="text-lg font-bold mb-4">Daftar Artikel</h2>
        <ul class="space-y-2 list-disc list-inside text-gray-700 dark:text-gray-300">
        <?php
        $sql = "SELECT * FROM tbl_artikel ORDER BY id_artikel DESC";
        $query = mysqli_query($db, $sql);
        while ($data = mysqli_fetch_array($query)) {
            echo "<li>" . htmlspecialchars($data['nama_artikel']) . "</li>";
        }
        ?>
        </ul>
    </aside>
</main>

<!-- Footer -->
<footer class="bg-blue-500 dark:bg-gray-800 text-white text-center py-4 mt-10">
    &copy; <?php echo date('Y'); ?> | Created by ARINI APRILIA
</footer>

<script>
    const toggleButton = document.getElementById('toggleDarkMode');
    const htmlEl = document.documentElement;

    // Load saved theme
    if (localStorage.getItem('theme') === 'dark') {
        htmlEl.classList.add('dark');
        toggleButton.textContent = '🌞';
    }

    toggleButton.addEventListener('click', () => {
        htmlEl.classList.toggle('dark');
        const isDark = htmlEl.classList.contains('dark');
        toggleButton.textContent = isDark ? '🌞' : '🌛';
        localStorage.setItem('theme', isDark ? 'dark' : 'light');
    });
</script>

</body>
</html>
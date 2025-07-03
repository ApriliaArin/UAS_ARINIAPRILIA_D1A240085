<?php
include('../koneksi.php');
session_start();
if (!isset($_SESSION['username'])) {
    header('location:login.php');
    exit;
}
$id = $_GET['id_about'];
$sql = "SELECT * FROM tbl_about WHERE id_about = '$id'";
$query = mysqli_query($db, $sql);
$data = mysqli_fetch_array($query);
?>
<!DOCTYPE html>
<html lang="en" class="">
<head>
    <meta charset="UTF-8">
    <title>Edit About</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class'
        };
    </script>
</head>
<body class="bg-blue-100 dark:bg-gray-900 text-gray-800 dark:text-gray-100 min-h-screen transition-all duration-300">

<!-- Tombol Toggle Dark Mode -->
<button id="toggleDark" class="fixed top-5 right-5 text-2xl z-50" title="Ganti Mode 🌛/🌞">🌛</button>

<!-- Header -->
<header class="bg-blue-500 dark:bg-gray-800 text-white text-center py-6 shadow">
    <h1 class="text-3xl font-bold">Edit Data About</h1>
</header>

<div class="flex max-w-7xl mx-auto mt-8 px-4">
    <!-- Sidebar -->
    <aside class="w-1/4 bg-white dark:bg-gray-800 rounded shadow p-4">
        <h2 class="text-xl font-semibold text-blue-700 dark:text-blue-300 mb-4 text-center">MENU</h2>
        <ul class="space-y-2 text-gray-700 dark:text-gray-200">
            <li><a href="beranda_admin.php" class="block hover:text-blue-600 dark:hover:text-blue-400">Beranda</a></li>
            <li><a href="data_artikel.php" class="block hover:text-blue-600 dark:hover:text-blue-400">Kelola Artikel</a></li>
            <li><a href="data_gallery.php" class="block hover:text-blue-600 dark:hover:text-blue-400">Kelola Gallery</a></li>
            <li><a href="about.php" class="block font-semibold text-blue-800 dark:text-blue-400">About</a></li>
            <li>
                <a href="logout.php" onclick="return confirm('Apakah anda yakin ingin keluar?');" class="block text-red-600 hover:underline font-medium">Logout</a>
            </li>
        </ul>
    </aside>

    <!-- Main Content -->
    <main class="w-3/4 bg-white dark:bg-gray-800 rounded shadow p-6 ml-6">
        <form action="proses_edit_about.php" method="post" class="space-y-6">
            <input type="hidden" name="id_about" value="<?php echo $data['id_about']; ?>">
            <div>
                <label for="about" class="block text-sm font-medium text-gray-700 dark:text-gray-200 mb-1">About</label>
                <textarea id="about" name="about" rows="5" required
                    class="w-full p-2 border rounded focus:outline-none focus:ring focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100"><?php echo htmlspecialchars($data['about']); ?></textarea>
            </div>
            <div class="flex justify-end space-x-4">
                <button type="submit" class="bg-blue-700 text-white px-4 py-2 rounded hover:bg-blue-800 transition">Update</button>
                <a href="about.php" class="bg-gray-300 text-gray-700 px-4 py-2 rounded hover:bg-gray-400 dark:bg-gray-600 dark:text-white dark:hover:bg-gray-500 transition">Batal</a>
            </div>
        </form>
    </main>
</div>

<!-- Footer -->
<footer class="bg-blue-300 dark:bg-gray-800 text-white text-center py-4 mt-10">
    &copy; <?php echo date('Y'); ?> | Created by NamaSendiri
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

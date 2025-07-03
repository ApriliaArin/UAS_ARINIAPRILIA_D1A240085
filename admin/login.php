<?php 
session_start();
if (isset($_SESSION['username'])) {
    header('location:beranda_admin.php');
}
require_once("../koneksi.php");
?>
<!DOCTYPE html>
<html lang="en" class="transition duration-300">
<head>
    <meta charset="UTF-8">
    <title>Login Administrator</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        if (localStorage.getItem('theme') === 'dark') {
            document.documentElement.classList.add('dark');
        }

        function toggleDarkMode() {
            const html = document.documentElement;
            const icon = document.getElementById('theme-icon');
            if (html.classList.contains('dark')) {
                html.classList.remove('dark');
                localStorage.setItem('theme', 'light');
                icon.textContent = '🌛';
            } else {
                html.classList.add('dark');
                localStorage.setItem('theme', 'dark');
                icon.textContent = '🌞';
            }
        }

        window.onload = function () {
            const icon = document.getElementById('theme-icon');
            icon.textContent = document.documentElement.classList.contains('dark') ? '🌞' : '🌛';
        };
    </script>
    <style>
        .circle {
            position: absolute;
            width: 120px;
            height: 120px;
            background-color: rgba(255, 255, 255, 0.3);
            border-radius: 50%;
            animation: float 6s ease-in-out infinite;
            z-index: 0;
        }
        .circle:nth-child(1) { top: 15%; left: 20%; animation-delay: 0s; }
        .circle:nth-child(2) { top: 40%; left: 75%; animation-delay: 1s; }
        .circle:nth-child(3) { top: 70%; left: 35%; animation-delay: 2s; }

        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-20px); }
        }
    </style>
</head>
<body class="bg-gradient-to-br from-blue-100 to-blue-300 dark:from-gray-900 dark:to-gray-800 min-h-screen flex items-center justify-center overflow-hidden transition-colors duration-300">

<!-- Animasi Lingkaran -->
<div class="circle"></div>
<div class="circle"></div>
<div class="circle"></div>

<!-- Tombol Dark Mode -->
<button onclick="toggleDarkMode()" class="absolute top-4 right-4 text-2xl focus:outline-none z-10">
    <span id="theme-icon">🌛</span>
</button>

<div class="bg-white dark:bg-gray-900 shadow-lg rounded-lg p-8 w-full max-w-md relative z-10 transition duration-300">
    <h2 class="text-2xl font-bold text-center text-blue-700 dark:text-white mb-6">Login Administrator</h2>
    <form action="cek_login.php" method="post" class="space-y-5">
        <div>
            <label for="username" class="block text-sm font-medium text-gray-700 dark:text-gray-300">👩‍💼 Username</label>
            <input type="text" name="username" id="username" required
                class="mt-1 block w-full border border-gray-300 dark:border-gray-600 dark:bg-gray-800 dark:text-white rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
        </div>
        <div>
            <label for="password" class="block text-sm font-medium text-gray-700 dark:text-gray-300">🔑 Password</label>
            <input type="password" name="password" id="password" required
                class="mt-1 block w-full border border-gray-300 dark:border-gray-600 dark:bg-gray-800 dark:text-white rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
        </div>
        <div class="flex justify-between items-center">
            <input type="submit" name="login" value="Login"
                class="bg-blue-700 text-white px-4 py-2 rounded hover:bg-blue-800 cursor-pointer">
            <input type="reset" name="cancel" value="Cancel"
                class="bg-gray-300 dark:bg-gray-700 text-gray-700 dark:text-white px-4 py-2 rounded hover:bg-gray-400 dark:hover:bg-gray-600 cursor-pointer">
        </div>
    </form>
    <div class="text-center text-sm text-gray-600 dark:text-gray-400 mt-6">
        &copy; <?php echo date('Y'); ?> - ARINI APRILIA
    </div>
</div>
</body>
</html>

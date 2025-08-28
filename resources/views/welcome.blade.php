<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel Auth & Role</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <!-- Main container for the card -->
    <div class="bg-white p-8 md:p-12 rounded-2xl shadow-xl w-full max-w-lg mx-4 text-center">
        <!-- Title -->
        <h1 class="text-3xl md:text-4xl font-extrabold text-gray-800 mb-6">
            Selamat datang di <span class="text-blue-600">Website uji coba</span>
        </h1>
        
        <!-- Description or sub-title -->
        <p class="text-lg text-gray-600 mb-8">
            Silakan masuk atau daftar untuk melanjutkan.
        </p>

        <!-- Container for the buttons -->
        <div class="flex flex-col md:flex-row space-y-4 md:space-y-0 md:space-x-4 items-center justify-center">
            <!-- Login Button -->
            <a href="/login" class="w-full md:w-auto px-8 py-3 bg-blue-600 text-white font-bold rounded-xl shadow-md hover:bg-blue-700 transition duration-300 transform hover:scale-105">
                Login
            </a>
            
            <!-- Register Button -->
            <a href="/register" class="w-full md:w-auto px-8 py-3 bg-gray-200 text-gray-800 font-bold rounded-xl shadow-md hover:bg-gray-300 transition duration-300 transform hover:scale-105">
                Register
            </a>
        </div>

        <!-- Optional: Small footer text -->
        <p class="mt-8 text-sm text-gray-500">
            Aplikasi manajemen hak akses & peran.
        </p>
    </div>
</body>
</html>
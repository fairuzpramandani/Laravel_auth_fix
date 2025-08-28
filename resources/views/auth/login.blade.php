<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login & Register</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Awesome untuk ikon, jika diperlukan -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #1a202c; /* Warna latar belakang gelap */
            color: #e2e8f0;
        }
    </style>
</head>
<body class="flex items-center justify-center min-h-screen p-4">
    <div class="bg-gray-800 p-8 rounded-lg shadow-xl w-full max-w-md">
        <!-- Tab Switcher -->
        <div class="flex mb-8 border-b-2 border-gray-700">
            <button id="login-tab" class="py-2 px-4 font-semibold text-lg border-b-2 border-blue-500 text-blue-500 transition-colors duration-300">
                Login
            </button>
            <button id="register-tab" class="py-2 px-4 font-semibold text-lg text-gray-400 hover:text-white transition-colors duration-300">
                Register
            </button>
        </div>

        <!-- Login Form Container -->
        <div id="login-form-container">
            <h2 class="text-2xl font-bold mb-6 text-center">Login</h2>
            <form action="{{ url('/login') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-300">Email</label>
                    <input type="email" id="email" name="email" class="mt-1 block w-full px-3 py-2 bg-gray-700 border border-gray-600 rounded-md shadow-sm placeholder-gray-500 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" placeholder="yourname@example.com" required>
                </div>
                <div class="mb-6">
                    <label for="password" class="block text-sm font-medium text-gray-300">Password</label>
                    <input type="password" id="password" name="password" class="mt-1 block w-full px-3 py-2 bg-gray-700 border border-gray-600 rounded-md shadow-sm placeholder-gray-500 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" placeholder="••••••••" required>
                </div>
                <div class="flex items-center justify-between mb-6">
                    <div class="flex items-center">
                        <input id="remember_me" name="remember" type="checkbox" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-600 rounded">
                        <label for="remember_me" class="ml-2 block text-sm text-gray-300">Ingat saya</label>
                    </div>
                    <a href="#" class="text-sm text-blue-400 hover:text-blue-300">Lupa password?</a>
                </div>
                <div>
                    <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        Login
                    </button>
                </div>
            </form>
        </div>

        <!-- Register Form Container (Hidden by default) -->
        <div id="register-form-container" class="hidden">
            <h2 class="text-2xl font-bold mb-6 text-center">Register</h2>
            <form action="{{ url('/register') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-300">Nama</label>
                    <input type="text" id="name" name="name" class="mt-1 block w-full px-3 py-2 bg-gray-700 border border-gray-600 rounded-md shadow-sm placeholder-gray-500 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" placeholder="Nama Lengkap" required>
                </div>
                <div class="mb-4">
                    <label for="register_email" class="block text-sm font-medium text-gray-300">Email</label>
                    <input type="email" id="register_email" name="email" class="mt-1 block w-full px-3 py-2 bg-gray-700 border border-gray-600 rounded-md shadow-sm placeholder-gray-500 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" placeholder="yourname@example.com" required>
                </div>
                <div class="mb-4">
                    <label for="register_password" class="block text-sm font-medium text-gray-300">Password</label>
                    <input type="password" id="register_password" name="password" class="mt-1 block w-full px-3 py-2 bg-gray-700 border border-gray-600 rounded-md shadow-sm placeholder-gray-500 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" placeholder="••••••••" required>
                </div>
                <div class="mb-6">
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-300">Konfirmasi Password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" class="mt-1 block w-full px-3 py-2 bg-gray-700 border border-gray-600 rounded-md shadow-sm placeholder-gray-500 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" placeholder="••••••••" required>
                </div>
                <div>
                    <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                        Register
                    </button>
                </div>
            </form>
        </div>
    </div>
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const loginTab = document.getElementById('login-tab');
            const registerTab = document.getElementById('register-tab');
            const loginForm = document.getElementById('login-form-container');
            const registerForm = document.getElementById('register-form-container');

            function showLoginForm() {
                loginTab.classList.add('border-blue-500', 'text-blue-500');
                loginTab.classList.remove('text-gray-400', 'border-transparent');
                registerTab.classList.remove('border-blue-500', 'text-blue-500');
                registerTab.classList.add('text-gray-400', 'border-transparent');
                loginForm.classList.remove('hidden');
                registerForm.classList.add('hidden');
            }

            function showRegisterForm() {
                registerTab.classList.add('border-blue-500', 'text-blue-500');
                registerTab.classList.remove('text-gray-400', 'border-transparent');
                loginTab.classList.remove('border-blue-500', 'text-blue-500');
                loginTab.classList.add('text-gray-400', 'border-transparent');
                registerForm.classList.remove('hidden');
                loginForm.classList.add('hidden');
            }

            loginTab.addEventListener('click', showLoginForm);
            registerTab.addEventListener('click', showRegisterForm);
            
            // Tampilkan form login secara default
            showLoginForm();
        });
    </script>
</body>
</html>
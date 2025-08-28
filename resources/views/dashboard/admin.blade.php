<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Admin Panel</a>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="btn btn-outline-light" type="submit">Logout</button>
        </form>
    </div>
</nav>

<div class="container py-4">
    <div class="alert alert-primary">
        Halo, <strong>{{ Auth::user()->name }}</strong> (Admin) 👋
    </div>

    <div class="row">
        <!-- Kelola User -->
        <div class="col-md-6">
            <div class="card shadow-sm mb-3">
                <div class="card-body">
                    <h5 class="card-title">Kelola User</h5>
                    <p class="card-text">Lihat, edit, atau hapus akun user.</p>
                    <a href="#" class="btn btn-primary">Masuk</a>
                </div>
            </div>
        </div>

        <!-- Kelola Role -->
        <div class="col-md-6">
            <div class="card shadow-sm mb-3">
                <div class="card-body">
                    <h5 class="card-title">Kelola Role</h5>
                    <p class="card-text">Tambahkan atau ubah role & permission.</p>
                    <a href="#" class="btn btn-warning">Masuk</a>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>

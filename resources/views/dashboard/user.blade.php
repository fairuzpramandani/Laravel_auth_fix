<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>User Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">User Area</a>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="btn btn-outline-light" type="submit">Logout</button>
        </form>
    </div>
</nav>

<div class="container py-4">
    <div class="alert alert-success">
        Halo, <strong>{{ Auth::user()->name }}</strong> (User) 👋
    </div>

    <div class="row">
        <!-- Profile -->
        <div class="col-md-6">
            <div class="card shadow-sm mb-3">
                <div class="card-body">
                    <h5 class="card-title">Profile Saya</h5>
                    <p class="card-text">Lihat & ubah informasi akun Anda.</p>
                    <a href="#" class="btn btn-primary">Masuk</a>
                </div>
            </div>
        </div>

        <!-- Riwayat Aktivitas -->
        <div class="col-md-6">
            <div class="card shadow-sm mb-3">
                <div class="card-body">
                    <h5 class="card-title">Riwayat Aktivitas</h5>
                    <p class="card-text">Pantau aktivitas yang sudah Anda lakukan.</p>
                    <a href="#" class="btn btn-success">Lihat</a>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>

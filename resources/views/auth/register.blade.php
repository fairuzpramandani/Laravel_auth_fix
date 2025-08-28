@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="card shadow-lg p-4" style="width: 450px; border-radius: 12px;">
        <h3 class="text-center mb-4">Daftar Akun</h3>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            {{-- Nama --}}
            <div class="mb-3">
                <label for="name" class="form-label">Nama</label>
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                    name="name" value="{{ old('name') }}" required autofocus>
                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            {{-- Email --}}
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                    name="email" value="{{ old('email') }}" required>
                @error('email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            {{-- Password --}}
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                    name="password" required>
                @error('password')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            {{-- Konfirmasi Password --}}
            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" required>
            </div>

            {{-- Tombol Daftar --}}
            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Daftar</button>
            </div>

            <div class="text-center mt-3">
                <small>Sudah punya akun? <a href="{{ route('login') }}">Login disini</a></small>
            </div>
        </form>
    </div>
</div>
@endsection

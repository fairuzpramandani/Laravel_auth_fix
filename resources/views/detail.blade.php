@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="card shadow-lg border-0 rounded-3">
        <div class="card-body">
            <h3 class="fw-bold mb-3">Detail Informasi</h3>
            <p><strong>Nama:</strong> {{ auth()->user()->name }}</p>
            <p><strong>Email:</strong> {{ auth()->user()->email }}</p>
            <p><strong>Role:</strong> {{ auth()->user()->role }}</p>

            <a href="{{ route('dashboard') }}" class="btn btn-secondary mt-3">Kembali</a>
        </div>
    </div>
</div>
@endsection

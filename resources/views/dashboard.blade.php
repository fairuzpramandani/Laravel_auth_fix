@extends('layouts.app')

@section('content')
<div class="container">

    {{-- Profile Section --}}
    <div class="row mb-4">
        <div class="col-md-4 text-center">
            <img src="{{ asset('images/profile.jpg') }}" 
                 class="rounded-circle shadow mb-3" width="150" height="150" alt="Profile Picture">
            <h4 class="fw-bold">{{ Auth::user()->name }}</h4>
            <p class="text-muted">Mahasiswa | Web Developer</p>
        </div>
        <div class="col-md-8">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <h5 class="fw-bold mb-3">Tentang Saya</h5>
                    <p>
                        Halo, saya <b>{{ Auth::user()->name }}</b>, seorang mahasiswa yang memiliki
                        minat besar dalam <b>pengembangan web</b> dan teknologi informasi.  
                        Saya berpengalaman menggunakan <b>Laravel, React,</b> serta mengelola database.
                    </p>
                    <p>
                        Tujuan saya adalah mengembangkan aplikasi modern yang bermanfaat 
                        serta terus belajar mengikuti perkembangan teknologi.
                    </p>
                </div>
            </div>
        </div>
    </div>

    {{-- Skills Section --}}
    <div class="card shadow-sm border-0 mb-4">
        <div class="card-body">
            <h5 class="fw-bold mb-3">🛠️ Keahlian</h5>
            <div class="d-flex flex-wrap gap-2">
                <span class="badge bg-primary p-2">Laravel</span>
                <span class="badge bg-success p-2">React.js</span>
                <span class="badge bg-warning text-dark p-2">JavaScript</span>
                <span class="badge bg-info text-dark p-2">MySQL</span>
            </div>
        </div>
    </div>

    {{-- Dokumen Saya Section --}}
    <div class="card shadow-sm border-0">
        <div class="card-header d-flex justify-content-between align-items-center bg-primary text-white">
            <h5 class="mb-0">📂 Dokumen Saya</h5>
            <form action="{{ route('files.store') }}" method="POST" enctype="multipart/form-data" class="d-flex">
                @csrf
                <input type="file" name="file" class="form-control me-2" required>
                <button type="submit" class="btn btn-light">Upload</button>
            </form>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Nama File</th>
                        <th>Upload Date</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($files as $file)
                    <tr>
                        <td>{{ $file->original_name }}</td>
                        <td>{{ $file->created_at->format('d M Y H:i') }}</td>
                        <td class="text-center">
                            <a href="{{ route('files.download', $file->id) }}" class="btn btn-success btn-sm">Download</a>
                            <a href="{{ route('files.showPdf', $file->id) }}" target="_blank" class="btn btn-warning btn-sm">Show PDF</a>
                            <form action="{{ route('files.destroy', $file->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="3" class="text-center">Belum ada file diupload.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection

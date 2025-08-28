@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Manajemen File</h2>

    {{-- Upload form --}}
    <form action="{{ route('files.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="file" required>
        <button type="submit" class="btn btn-primary">Upload</button>
    </form>

    <hr>

    {{-- List files --}}
    <table class="table">
        <tr>
            <th>Nama File</th>
            <th>Aksi</th>
        </tr>
        @foreach($files as $file)
        <tr>
            <td>{{ $file->name }}</td>
            <td>
                <a href="{{ route('files.download', $file->id) }}" class="btn btn-success">Download</a>
                <a href="{{ route('files.pdf', $file->id) }}" class="btn btn-info">Lihat PDF</a>
                <form action="{{ route('files.destroy', $file->id) }}" method="POST" style="display:inline">
                    @csrf @method('DELETE')
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</div>
@endsection

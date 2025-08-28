<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\File;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    // Tampilkan dashboard + daftar file user
    public function index()
    {
        $files = File::where('user_id', auth()->id())->latest()->get();
        return view('dashboard', compact('files'));
    }

    // Upload file
    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:pdf,doc,docx,xls,xlsx,png,jpg,jpeg|max:2048'
        ]);

        // simpan ke disk public biar gampang diakses
        $path = $request->file('file')->store('uploads', 'public');

        File::create([
            'user_id'       => auth()->id(),
            'original_name' => $request->file('file')->getClientOriginalName(),
            'path'          => $path, // contoh: uploads/abcd1234.pdf
            'mime_type'     => $request->file('file')->getMimeType(),
        ]);

        return back()->with('success', 'File berhasil diupload.');
    }

    // Download file
    public function download($id)
    {
        $file = File::where('id', $id)
            ->where('user_id', auth()->id())
            ->firstOrFail();

        return Storage::disk('public')->download($file->path, $file->original_name);
    }

    // Show PDF di browser
    public function showPdf($id)
    {
        $file = File::where('id', $id)
            ->where('user_id', auth()->id())
            ->firstOrFail();

        $path = Storage::disk('public')->path($file->path);

        return response()->file($path);
    }

    // Hapus file
    public function destroy($id)
    {
        $file = File::where('id', $id)
            ->where('user_id', auth()->id())
            ->firstOrFail();

        Storage::disk('public')->delete($file->path);
        $file->delete();

        return back()->with('success', 'File berhasil dihapus.');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\File;

class DashboardController extends Controller
{
    public function index()
    {
        $files = File::all();
        return view('dashboard', compact('files'));
    }
}

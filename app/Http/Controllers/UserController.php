<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function destroy($id)
{
    $user = User::findOrFail($id);
    $user->delete();

    return redirect('/')->with('success', 'Akun berhasil dihapus');
}

}

<<<<<<< HEAD
<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    // Hapus ini, biar tidak override method authenticated()
    // protected $redirectTo = '/dashboard';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function authenticated($request, $user)
    {
        if ($user->hasRole('admin')) {
            return redirect()->route('admin.dashboard');
        } elseif ($user->hasRole('user')) {
            return redirect()->route('user.dashboard');
        }

         return redirect()->route('admin.dashboard');
    }
}
=======
<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    // Hapus ini, biar tidak override method authenticated()
    // protected $redirectTo = '/dashboard';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function authenticated($request, $user)
    {
        if ($user->hasRole('admin')) {
            return redirect()->route('admin.dashboard');
        } elseif ($user->hasRole('user')) {
            return redirect()->route('user.dashboard');
        }

         return redirect()->route('admin.dashboard');
    }
}
>>>>>>> c1c8f1d967f9ce9e889be4f460fef957dbb1ebb3

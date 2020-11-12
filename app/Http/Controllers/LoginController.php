<?php
namespace App\Http\Controllers;

use App\Http\Livewire\PlanesPersonales;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function Ramsey\Uuid\v1;

class LoginController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed...
            return redirect()->intended('/');
        }

        return back()->with('mensaje', 'Usuario o contraseña incorrecta');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->intended('/');
    }
}

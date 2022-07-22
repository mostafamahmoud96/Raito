<?php


namespace Modules\AdminModule\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class AdminAuthController extends Controller
{
    function index()
    {
        if (Auth::guard('admin')->check()) {
            // dd(redirect('/admin/dashboard'));
            return redirect('/admin/products');
        } else {
            return view('adminmodule::login');
        }
    }

    function login(Request $request)
    {
        $rememberme = request()->has('rememberme') ? 1 : 0;
        if (auth()->guard('admin')->attempt(
            [
                'email' => $request->email,
                'password' => $request->password
            ],
            $rememberme
        )) {

            return redirect()->intended('admin');
        }
        return redirect()->back()->withErrors(['error' => 'Wrong Email or Password']);
    }

    function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->flush();
        $request->session()->regenerate();
        return redirect()->to('admin');
    }
}

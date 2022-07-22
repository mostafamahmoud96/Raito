<?php


namespace Modules\CustomerModule\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class CustomerAuthController extends Controller
{
    function index()
    {
        if (Auth::guard('customer')->check()) {
            // dd(redirect('/admin/dashboard'));
            return redirect('/customer/orders/create');
        } else {
            return view('customermodule::login');
        }
    }

    function login(Request $request)
    {
        $rememberme = request()->has('rememberme') ? 1 : 0;
        if (auth()->guard('customer')->attempt(
            [
                'email' => $request->username,
                'password' => $request->password
            ],
            $rememberme
        )) {

            return redirect()->intended('customer');
        }
        // dd($request);
        return redirect()->back()->withErrors(['error' => 'Wrong Email or Password']);
    }

    function logout(Request $request)
    {
        Auth::guard('customer')->logout();
        $request->session()->flush();
        $request->session()->regenerate();
        return redirect()->to('customer');
    }
}

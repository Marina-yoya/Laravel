<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        session(['test' => 'value']);
       
        if (Auth::attempt($request->only('email', 'password'))) {
        
            return redirect()->intended('/profile'); 
        }

        
        return back()->withErrors(['login_error' => 'Invalid email or password']);

    }
}

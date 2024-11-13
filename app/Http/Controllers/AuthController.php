<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Hiển thị form đăng ký
    public function showRegisterForm() {
        return view('auth.register');
    }

    // Xử lý đăng ký người dùng
    public function register(Request $request) {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'customer'
        ]);

        return redirect()->route('login')->with('success', 'Đăng ký thành công!');
    }

    // Hiển thị form đăng nhập
    public function showLoginForm() {
        return view('auth.login');
    }

    // Xử lý đăng nhập người dùng
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);
        if (Auth::attempt($request->only('email',  'password'))) {
            $request->session()->regenerate();

            if (Auth::user()->role === 'admin') {
                return redirect()->intended(route('admin.dashboard'));
            }

            return redirect()->intended(route('products.index'));
        }
        return redirect()->back()->with('error', 'The provided credentials are incorrect.');
    }
    
    // Xử lý đăng xuất người dùng
    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        return redirect('/login');
    }
}

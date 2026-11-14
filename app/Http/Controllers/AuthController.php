<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\AuthService;

class AuthController extends Controller
{
    protected $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    // Đăng ký tài khoản
    public function register(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
        ]);

        // Tài khoản đăng ký công khai mặc định là học viên
        $data['role'] = 'student';

        $this->authService->register($data);

        return redirect('/')
            ->with('success', 'Đăng ký thành công!');
    }

    // Đăng nhập
    public function login(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        $user = $this->authService->login($data);

        if (!$user) {
            return back()
                ->withErrors(['email' => 'Email hoặc mật khẩu không chính xác.'])
                ->onlyInput('email');
        }

        $request->session()->regenerate();

        return redirect()->route('courses.index')
            ->with('success', 'Đăng nhập thành công!');
    }

    // Đăng xuất
    public function logout(Request $request)
    {
        $this->authService->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
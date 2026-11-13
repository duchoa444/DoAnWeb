<?php

namespace App\Http\Controllers;

use App\Enums\UserRole;
use App\Services\AuthService;
use Illuminate\Http\Request;
use InvalidArgumentException;

class AuthController extends Controller
{
    protected AuthService $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ], [
            'name.required' => 'Vui lòng nhập họ và tên.',
            'email.required' => 'Vui lòng nhập email.',
            'email.email' => 'Định dạng email không hợp lệ.',
            'email.unique' => 'Email này đã tồn tại trong hệ thống.',
            'password.required' => 'Vui lòng nhập mật khẩu.',
            'password.min' => 'Mật khẩu phải có ít nhất 6 ký tự.',
            'password.confirmed' => 'Xác nhận mật khẩu không khớp.',
        ]);

        try {
            $user = $this->authService->register($validated);
            return response()->json([
                'message' => 'Đăng ký tài khoản thành công!',
                'user' => $user
            ], 201);
        } catch (InvalidArgumentException $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ], [
            'email.required' => 'Vui lòng nhập email.',
            'email.email' => 'Định dạng email không hợp lệ.',
            'password.required' => 'Vui lòng nhập mật khẩu.',
        ]);

        try {
            $user = $this->authService->login($credentials);
            $request->session()->regenerate();

            $role = $user->role instanceof \BackedEnum ? $user->role->value : $user->role;

            $redirectUrl = match ($role) {
                UserRole::ADMIN->value => '/admin/dashboard',
                UserRole::TEACHER->value => '/teacher/dashboard',
                default => '/student/dashboard',
            };

            if ($request->expectsJson()) {
                return response()->json([
                    'message' => 'Đăng nhập thành công!',
                    'role' => $role,
                    'redirect_url' => $redirectUrl
                ], 200);
            }

            return redirect()->intended($redirectUrl);
        } catch (InvalidArgumentException $e) {
            if ($request->expectsJson()) {
                return response()->json(['error' => $e->getMessage()], 401);
            }
            return back()->withErrors(['email' => $e->getMessage()])->withInput();
        }
    }

    public function logout(Request $request)
    {
        $this->authService->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        if ($request->expectsJson()) {
            return response()->json(['message' => 'Đăng xuất thành công!'], 200);
        }

        return redirect()->route('login');
    }
}
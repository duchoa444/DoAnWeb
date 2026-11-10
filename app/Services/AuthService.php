<?php

namespace App\Services;

use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthService
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    // Đăng ký tài khoản
    public function register(array $data)
    {
        $data['password'] = Hash::make($data['password']);

        return $this->userRepository->create($data);
    }

    // Đăng nhập
    public function login(array $data)
    {
        $user = $this->userRepository->findByEmail($data['email']);

        if (!$user) {
            return false;
        }

        if (!Hash::check($data['password'], $user->password)) {
            return false;
        }

        Auth::login($user);

        return $user;
    }

    // Đăng xuất
    public function logout()
    {
        Auth::logout();
    }
}

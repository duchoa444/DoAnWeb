<?php

namespace App\Services;

use App\Enums\UserRole;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use InvalidArgumentException;

class AuthService extends BaseService
{
    protected UserRepository $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function register(array $data)
    {
        if ($this->userRepository->findByEmail($data['email'])) {
            throw new InvalidArgumentException('Email này đã được sử dụng.');
        }

        $data['password'] = Hash::make($data['password']);
        $data['role'] = UserRole::STUDENT->value;

        return $this->userRepository->create($data);
    }

    public function login(array $credentials)
    {
        $user = $this->userRepository->findByEmail($credentials['email']);

        if (!$user || !Hash::check($credentials['password'], $user->password)) {
            throw new InvalidArgumentException('Email hoặc mật khẩu không chính xác.');
        }

        // Chặn tài khoản bị khóa
        if ((isset($user->is_active) && !$user->is_active) || (isset($user->status) && $user->status === 'locked')) {
            throw new InvalidArgumentException('Tài khoản của bạn đã bị khóa. Vui lòng liên hệ Quản trị viên.');
        }

        Auth::login($user);

        return $user;
    }

    public function logout(): void
    {
        Auth::logout();
    }
}
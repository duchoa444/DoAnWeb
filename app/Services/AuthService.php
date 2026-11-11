<?php

namespace App\Services;

use App\Enums\UserRole;
use App\Repositories\UserRepository;
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

        // Băm mật khẩu và gán cố định quyền student
        $data['password'] = Hash::make($data['password']);
        $data['role'] = UserRole::STUDENT->value;

        return $this->userRepository->create($data);
    }
}
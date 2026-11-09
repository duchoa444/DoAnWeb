<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository
{
    // Tìm người dùng theo email
    public function findByEmail($email)
    {
        return User::where('email', $email)->first();
    }

    // Tạo tài khoản mới
    public function create(array $data)
    {
        return User::create($data);
    }
}
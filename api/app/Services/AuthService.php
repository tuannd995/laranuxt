<?php

namespace App\Services;

use App\Http\Requests\Admin\LoginRequest;

class AuthService
{
    public function __construct()
    {
    }

    public function login(LoginRequest $request)
    {
        $data = $request->only(['email', 'password']);
        return auth()->attempt($data);
    }
}

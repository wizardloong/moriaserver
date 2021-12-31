<?php

namespace App\Services\User;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserService
{
    public static function getCurrent(): ?User
    {
        return session('user', null)
            ?? (Auth::check()
                ? User::find(Auth::id())
                : null);
    }
}

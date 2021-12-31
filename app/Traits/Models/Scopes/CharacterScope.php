<?php

namespace App\Traits\Models\Scopes;

use App\Models\User;

trait CharacterScope
{
    public function scopeForUser($query, User $user)
    {
        return $query->where('user_id', $user->id);
    }
}

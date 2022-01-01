<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;

    protected $dates = [
        'created_at',
        'updated_at,'
    ];

    protected $fillable = [
        'name',
        'description',
        'code'
    ];

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_permission');
    }
}

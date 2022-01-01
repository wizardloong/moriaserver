<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    const ADMINISTRATOR = 'administrator';
    const PLAYER = 'player';

    protected $dates = [
        'created_at',
        'updated_at,'
    ];

    protected $fillable = [
        'name',
        'description',
        'code'
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'role_user');
    }

    public function permissions()
    {
        return $this->belongsToMany(Permission::class, 'role_permission');
    }
}

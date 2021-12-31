<?php

namespace App\Services\Minecraft;

use Illuminate\Support\Facades\Artisan;

class WhitelistService
{
    public static function add(string $player)
    {
        Artisan::call('whitelist:add', [
            'player' => $player
        ]);
    }

    public static function rm(string $player)
    {
        Artisan::call('whitelist:rm', [
            'player' => $player
        ]);
    }
}

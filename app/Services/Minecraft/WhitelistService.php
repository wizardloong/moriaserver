<?php

namespace App\Services\Minecraft;

class WhitelistService
{
    public static function add(string $player)
    {
        exec('screen -S minecraft -p 0 -X stuff "`printf "/whitelist add ' . $player . '\r"`"');
    }

    public static function rm(string $player)
    {
        exec('screen -S minecraft -p 0 -X stuff "`printf "/whitelist remove ' . $player . '\r"`"');
    }
}

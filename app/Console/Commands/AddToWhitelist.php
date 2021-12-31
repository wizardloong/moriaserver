<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class AddToWhitelist extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'whitelist:add {player}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        exec('screen -S minecraft -p 0 -X stuff "`printf "/whitelist add ' . $this->argument('player') . '\r"`"');
    }
}

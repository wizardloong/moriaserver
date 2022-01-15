<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class RmFromWhitelist extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'whitelist:rm {player}';

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
        exec("/home/wizard/screepts/minecraft/RmFromWhitelist.sh " . $this->argument('player'));
    }
}

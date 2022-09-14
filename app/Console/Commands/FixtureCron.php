<?php

namespace App\Console\Commands;

use App\Http\Controllers\ToolsController;
use Illuminate\Console\Command;

class FixtureCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fixture:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fixture update from FPL API';

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
        $tool  = new ToolsController();
        $tool->fixtures();
    }
}

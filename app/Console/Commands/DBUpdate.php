<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;


class DBUpdate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'this command define for recreate function or procedure or ... in database';

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

        $this->call('migrate:reset', [
            '--path' => 'database/migrations/special'
        ]);
        $this->call('migrate');
    }
}

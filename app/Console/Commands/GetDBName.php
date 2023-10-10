<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class GetDBName extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:get-db-name';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get current database name';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $dbName = DB::connection()->getDatabaseName();
        $this->info('The current db name is ' . $dbName);

        $firstName = $this->ask('What is your first name: ');
        $lastName = $this->ask('What is your last name: ');

        $this->info('Hello '. $firstName . ' ' . $lastName);
    }
}

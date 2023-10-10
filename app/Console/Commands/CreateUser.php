<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class CreateUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:user';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new user';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $name = $this->ask('What is your Name: ');
        $email = $this->ask('What is your Email: ');
        $name = $this->choice(
            'What is your gender?',
            ['Male', 'Female'], 0
        );
        $password = $this->secret('Enter Password: ');
        if ($this->confirm('Do you wish to continue?')) {
            try {
                User::create([
                    'name' => $name,
                    'email' => $email,
                    'role_id' => 2,
                    'password' => Hash::make($password),
                ]);
            } catch (\Throwable $th) {
                $this->error(json_encode($th->getMessage(), true));
                exit;
            }
            
            $this->info('Hello ' . $name . ', Welcome to the shopping!!');
        } else {
            $this->error('Hello ' . $name . ', Oops, You terminate the process!!');
        }
    }
}

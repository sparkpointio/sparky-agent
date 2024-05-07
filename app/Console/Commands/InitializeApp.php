<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

class InitializeApp extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:init';

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
        // Drop tables
        $tables = DB::connection()->getDoctrineSchemaManager()->listTableNames();

        foreach ($tables as $table) {
            if ($table === 'email_subscriptions') {
                $this->line("Skipping table: $table");
                continue;
            }

            $this->line("Dropping table: $table");
            Schema::drop($table);
        }

        $this->line('');

        // Migrate tables
        $this->call('migrate');

        $this->line('');

        // Create Users
        $this->line('Creating Users:');
        $this->line('');

        $users = [
            [
                'name' => 'Bernard Historillo',
                'email' => 'bernardhistorillo1@gmail.com',
                'password' => Hash::make('Password1'),
                'role' => 1,
            ]
        ];

        foreach($users as $i => $userItem) {
            $user = new User();
            $user->name = $userItem['name'];
            $user->email = $userItem['email'];
            $user->password = $userItem['password'];
            $user->role = $userItem['role'];
            $user->save();

            $this->line(($i + 1) . '. ' . $user['name'] . ' <' . $user['email'] . '>');
        }

        $this->line('');

        return 0;
    }
}

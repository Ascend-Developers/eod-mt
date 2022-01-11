<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Hash;
class MakeAdmin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:admin';

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
        $data = [
            'name' => 'Hassan Aamir',
            'email' => 'hassan.aamir@ascend.com.sa',
            'password' => Hash::make('eod777'),
            'type' => 'admin',
            'phone' => '923054769045'
        ];

        User::create($data);
        return "Done";
    }
}

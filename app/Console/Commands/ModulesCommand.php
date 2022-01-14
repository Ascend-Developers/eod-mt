<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Module;

class ModulesCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:module';

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
            ['name' => 'EOD Submission'],
            ['name' => 'Waiting Time'],
            ['name' => 'Rapid Antigen Testing Site Audit'],
            ['name' => 'Lab Shipment'],
            ['name' => 'Lab Classification'],
        ];

        foreach($data as $d){
            $module = Module::create($d);
        }
    }
}

<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Region;

class RegionCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'add:region';

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
        $data = array(
            array("Region"=>"الإحساء"),
            array("Region"=>"الباحة"),
            array("Region"=>"التجمع الأول بالرياض"),
            array("Region"=>"التجمع الثالث بالرياض "),
            array("Region"=>"التجمع الثاني بالرياض"),
            array("Region"=>"الجوف "),
            array("Region"=>"الحدود الشمالية"),
            array("Region"=>"الشرقية"),
            array("Region"=>"جدة"),
            array("Region"=>"الطائف"),
            array("Region"=>"حائل"),
            array("Region"=>"القصيم "),
            array("Region"=>" المدينة المنورة "),
            array("Region"=>"تبوك"),
            array("Region"=>"جازان"),
            array("Region"=>"بيشة"),
            array("Region"=>"القنفذة"),
            array("Region"=>"حفر الباطن"),
            array("Region"=>"القريات"),
            array("Region"=>"عسير"),
            array("Region"=>"مكة المكرمة"),
            array("Region"=>"نجران")
        );

        $this->getOutput()->progressStart(count($data));

        foreach ($data as $d) {
            $da = [
                'name' => $d['Region']
            ];
            Region::create($da);
            $this->output->progressAdvance();
        }

        dd("Region Done");
    }
}

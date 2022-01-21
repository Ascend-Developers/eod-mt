<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Region;
use App\Models\Site;

class SiteCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'add:site';

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
            array("region"=>"الإحساء","site"=>"مركز صحي المركز"),
            array("region"=>"الإحساء","site"=>"عيادة تطمن مبنى التدريب بمسنشفى النساء والولادة"),
            array("region"=>"الإحساء","site"=>"عيادة تطمن بمجع الصحة النفسية "),
            array("region"=>"الإحساء","site"=>"مركز صحي شعبة المبرز "),
            array("region"=>"الإحساء","site"=>"مركز صحي المنصورة "),
            array("region"=>"الباحة","site"=>"مركز صحي بني عاصم "),
            array("region"=>"الباحة","site"=>"مركز صحي الباحة 1  "),
            array("region"=>"الباحة","site"=>"مركز صحي الاطاولة"),
            array("region"=>"الباحة","site"=>"مركز صحي عبدان"),
            array("region"=>"الباحة","site"=>"مستشفى قلوة العام"),
            array("region"=>"الباحة","site"=>"مستشفى العقيق العام"),
            array("region"=>"الباحة","site"=>"مركز صحي النصبان "),
            array("region"=>"التجمع الأول بالرياض","site"=>"مركز صحي عسير "),
            array("region"=>"التجمع الأول بالرياض","site"=>"مركز صحي عريجاء القديم "),
            array("region"=>"التجمع الأول بالرياض","site"=>"مركز صحي الخالدية"),
            array("region"=>"التجمع الأول بالرياض","site"=>"مركز صحي الزهرة"),
            array("region"=>"التجمع الأول بالرياض","site"=>"مستشفى الحريق العام "),
            array("region"=>"التجمع الأول بالرياض","site"=>"مركز صحي السيح "),
            array("region"=>"التجمع الأول بالرياض","site"=>"مركز صحي الدلم "),
            array("region"=>"التجمع الأول بالرياض","site"=>"مركز صحي الرين الأعلى"),
            array("region"=>"التجمع الأول بالرياض","site"=>"مستشفى السليل العام"),
            array("region"=>"التجمع الأول بالرياض","site"=>"عيادة تطمن بالأفلاج"),
            array("region"=>"التجمع الأول بالرياض","site"=>"مركز صحي الخماسين"),
            array("region"=>"التجمع الأول بالرياض","site"=>"مستشفى الخاصرة العام"),
            array("region"=>"التجمع الأول بالرياض","site"=>"مركز صحي القويعية "),
            array("region"=>"التجمع الأول بالرياض","site"=>"مركز صحي الغطغط"),
            array("region"=>"التجمع الأول بالرياض","site"=>"مركز صحي السلامية"),
            array("region"=>"التجمع الثاني بالرياض","site"=>"مركز صحي الخزامى"),
            array("region"=>"التجمع الثاني بالرياض","site"=>"مركز صحي لبن الغربي  "),
            array("region"=>"التجمع الثاني بالرياض","site"=>"مركز صحي  ساجر الثاني"),
            array("region"=>"التجمع الثاني بالرياض","site"=>"مركز صحي شرق الدوادمي "),
            array("region"=>"التجمع الثاني بالرياض","site"=>"مركز صحي ثادق"),
            array("region"=>"التجمع الثاني بالرياض","site"=>"مركز صحي القرينة"),
            array("region"=>"التجمع الثاني بالرياض","site"=>"مركز صحي غسلة"),
            array("region"=>"التجمع الثاني بالرياض","site"=>"مركز صحي جو بالبطين"),
            array("region"=>"التجمع الثاني بالرياض","site"=>"مركز صحي أم المناشير"),
            array("region"=>"التجمع الثاني بالرياض","site"=>"مركز صحي الرفائع "),
            array("region"=>"التجمع الثاني بالرياض","site"=>"مركز صحي البجادية   "),
            array("region"=>"التجمع الثاني بالرياض","site"=>"مركز صحي شمال عفيف"),
            array("region"=>"التجمع الثاني بالرياض","site"=>" مركز صحي ثرمداء"),
            array("region"=>"التجمع الثاني بالرياض","site"=>"مستشفى وثيلان العام "),
            array("region"=>"التجمع الثاني بالرياض","site"=>"مركز صحي النزهة"),
            array("region"=>"التجمع الثاني بالرياض","site"=>"مركز صحي المنار"),
            array("region"=>"التجمع الثاني بالرياض","site"=>"مركز صحي المروج"),
            array("region"=>"التجمع الثاني بالرياض","site"=>"مركز صحي الجنادرية الغربي"),
            array("region"=>"التجمع الثاني بالرياض","site"=>"مستشفى الارطاوية "),
            array("region"=>"التجمع الثاني بالرياض","site"=>"مستشفى الزلفي"),
            array("region"=>"التجمع الثاني بالرياض","site"=>"م.ص الفيصلية بالمجمعة "),
            array("region"=>"التجمع الثاني بالرياض","site"=>"  مركز صحي الشفاء حوطة سدير"),
            array("region"=>"التجمع الثاني بالرياض","site"=>"مستشفى تمير العــام"),
            array("region"=>"التجمع الثاني بالرياض","site"=>"مستشفى رماح العام"),
            array("region"=>"التجمع الثاني بالرياض","site"=>" م.الأمير ناصر بن سعد السديري "),
            array("region"=>"الجوف ","site"=>"مستشفى الملك عبدالعزيز التخصصي "),
            array("region"=>"الجوف ","site"=>"مركز صحي الصفاة"),
            array("region"=>"الجوف ","site"=>"مركز صحي حدرج والدعيجاء"),
            array("region"=>"الحدود الشمالية","site"=>"مركز صحي رفحاء الغربي  "),
            array("region"=>"الحدود الشمالية","site"=>"مركز صحي جنوب الفيصلية"),
            array("region"=>"الحدود الشمالية","site"=>"مركز صحي  طريف الشرقي"),
            array("region"=>"الشرقية","site"=>" مركز صحي الروضة"),
            array("region"=>"الشرقية","site"=>" مركز صحي الشفاء بالدمام (جنوب الدمام) "),
            array("region"=>"الشرقية","site"=>"   مركز صحي العوامية"),
            array("region"=>"الشرقية","site"=>" مركز صحي وسط الجبيل (الرازي)"),
            array("region"=>"الشرقية","site"=>"  مركز صحي الجسر "),
            array("region"=>"الشرقية","site"=>" مركز صحي بقيق "),
            array("region"=>"الشرقية","site"=>"مستشفى عنك العام"),
            array("region"=>"الشرقية","site"=>"مستشفى رأس تنورة "),
            array("region"=>"الشرقية","site"=>"مستشفى صفوى العام "),
            array("region"=>"الشرقية","site"=>"مستشفى الخفجي العام"),
            array("region"=>"الشرقية","site"=>"مستشفى النعيرية العام"),
            array("region"=>"الشرقية","site"=>"مستشفى الأمير سلطان بمليجه"),
            array("region"=>"الشرقية","site"=>"مستشفى الأمير سلطان بعريعره"),
            array("region"=>"الشرقية","site"=>"مستشفى القريه العليا العام"),
            array("region"=>"الشرقية","site"=>"مستشفى الرفيعه العام"),
            array("region"=>"الشرقية","site"=>"مستشفى سلوى العام"),
            array("region"=>"الشرقية","site"=>"مستشفى البطحاء العام"),
            array("region"=>"الطائف","site"=>"مركز صحي السلامة"),
            array("region"=>"الطائف","site"=>"مركز صحي الخرمة"),
            array("region"=>"الطائف","site"=>"مركز صحي الوشحاء"),
            array("region"=>"الطائف","site"=>"مركز صحي تربة "),
            array("region"=>"الطائف","site"=>"مركز صحي الملحة"),
            array("region"=>"الطائف","site"=>"مستشفى  ظلم"),
            array("region"=>"الطائف","site"=>"مستشفى ام الدوم"),
            array("region"=>"الطائف","site"=>"مستشفى  المحاني"),
            array("region"=>"الطائف","site"=>"مستشفى  القريع "),
            array("region"=>"الطائف","site"=>"مستشفى  قيا"),
            array("region"=>"القريات","site"=>"مركز صحي  الرفاع"),
            array("region"=>"القريات","site"=>"مستشفى الحديثة العام"),
            array("region"=>"القصيم ","site"=>"مستشفى قبة العام"),
            array("region"=>"القصيم ","site"=>"مستشفى عقلة الصقور العام"),
            array("region"=>"القصيم ","site"=>"مركز صحي شرق الفايزية"),
            array("region"=>"القصيم ","site"=>"مستشفى قصيباء العام"),
            array("region"=>"القصيم ","site"=>"مركز صحي شرق المذنب"),
            array("region"=>"القصيم ","site"=>"مستشفى رياض الخبراء العام"),
            array("region"=>"القصيم ","site"=>"مـسـتـشـفـى الــقـوارة الـعـام"),
            array("region"=>"القصيم ","site"=>"مركز صحي الخـبـيـب"),
            array("region"=>"القصيم ","site"=>"مركز صحي الصالحية "),
            array("region"=>"القصيم ","site"=>"مستشفى الاسياح العام"),
            array("region"=>"القصيم ","site"=>"مستشفى النبهانية العام"),
            array("region"=>"القصيم ","site"=>"مستشفى عيون الجواء"),
            array("region"=>"القصيم ","site"=>"مركز صحي حي الملك خالد بالرس"),
            array("region"=>"القصيم ","site"=>"مستشفى ضرية العام"),
            array("region"=>"القصيم ","site"=>"مركز صحي القادسية بالبكيرية "),
            array("region"=>"القصيم ","site"=>"مركز صحي البدائع العليا"),
            array("region"=>"القنفذة","site"=>"مركز صحي الحي الغربي "),
            array("region"=>"القنفذة","site"=>"مستشفى المظيلف "),
            array("region"=>"القنفذة","site"=>"مستشفى ثريبان "),
            array("region"=>"القنفذة","site"=>"مستشفى نمره "),
            array("region"=>"القنفذة","site"=>"مركز صحي الحبيل"),
            array("region"=>" المدينة المنورة ","site"=>"مركز صحي الديرة"),
            array("region"=>" المدينة المنورة ","site"=>"مركز صحي الخالدية"),
            array("region"=>" المدينة المنورة ","site"=>"عيادة تطمن بمحافظة ينبع "),
            array("region"=>" المدينة المنورة ","site"=>"مستشفى المهد العام"),
            array("region"=>" المدينة المنورة ","site"=>"مستشفى خيبر العام"),
            array("region"=>" المدينة المنورة ","site"=>"مستشفى وادي الفرع العام"),
            array("region"=>" المدينة المنورة ","site"=>"مستشفى الحناكية العام"),
            array("region"=>" المدينة المنورة ","site"=>"مركز صحي العيص "),
            array("region"=>" المدينة المنورة ","site"=>"مستشفى بدر العام"),
            array("region"=>"بيشة","site"=>"مركز صحي مخطط1"),
            array("region"=>"بيشة","site"=>"مستشفى سبت العلايا"),
            array("region"=>"بيشة","site"=>"مستشفى تباله"),
            array("region"=>"بيشة","site"=>"مستشفى وادي ترج"),
            array("region"=>"بيشة","site"=>"مستشفى تثليث العام"),
            array("region"=>"تبوك","site"=>"مركز صحي العزيزية"),
            array("region"=>"تبوك","site"=>"مركز صحي المثلث"),
            array("region"=>"تبوك","site"=>"مركز صحي النهضة بالوجه"),
            array("region"=>"تبوك","site"=>"مركز صحي الشاطئ "),
            array("region"=>"تبوك","site"=>"مستشفى تيماء"),
            array("region"=>"تبوك","site"=>"مستشفى البدع"),
            array("region"=>"تبوك","site"=>"مستشفى ضباء"),
            array("region"=>"تبوك","site"=>"مستشفى أملج"),
            array("region"=>"تبوك","site"=>"مستشفى أشواق"),
            array("region"=>"تبوك","site"=>"مستشفى أبو راكه"),
            array("region"=>"جازان","site"=>"مركز صحي الصفا"),
            array("region"=>"جازان","site"=>" مركز صحي خبت الخارش"),
            array("region"=>"جازان","site"=>" مركز صحي البطحان"),
            array("region"=>"جازان","site"=>"مركز صحي الخشابية "),
            array("region"=>"جازان","site"=>"مركز صحي العريش"),
            array("region"=>"جازان","site"=>"مستشفى بني مالك العام"),
            array("region"=>"جازان","site"=>"مستشفى فيفا العام"),
            array("region"=>"جازان","site"=>"مستشفى الدرب العام"),
            array("region"=>"جازان","site"=>"مركز صحي قرية بيش"),
            array("region"=>"جازان","site"=>"مركز صحي الشاطئ"),
            array("region"=>"جدة","site"=>"مجمع الملك عبدالله  "),
            array("region"=>"جدة","site"=>"مركز صحي الحمراء"),
            array("region"=>"جدة","site"=>"مستشفى رابغ العام "),
            array("region"=>"جدة","site"=>"مستشفى الليث العام "),
            array("region"=>"جدة","site"=>"مستشفى اضم العام "),
            array("region"=>"جدة","site"=>"مركز صحي الرحاب"),
            array("region"=>"جدة","site"=>"مركز صحي مدائن الفهد"),
            array("region"=>"جدة","site"=>"مركز صحي كيلو 13"),
            array("region"=>"جدة","site"=>"   مركز صحي أبحر الشمالية"),
            array("region"=>"جدة","site"=>"   مركز صحي الصفا1"),
            array("region"=>"جدة","site"=>"مركز صحي الشراع"),
            array("region"=>"جدة","site"=>"مركز صحي قويزة"),
            array("region"=>"جدة","site"=>"مركز صحي الفضيلة"),
            array("region"=>"حائل","site"=>"   مركز صحي المنتزه الشرقي"),
            array("region"=>"حائل","site"=>"مركز صحي شراف"),
            array("region"=>"حائل","site"=>"مستشفى بقعاء العام"),
            array("region"=>"حائل","site"=>"مستشفى الشملي العام"),
            array("region"=>"حائل","site"=>"مستشفى موقق العام"),
            array("region"=>"حائل","site"=>"مستشفى الغزالة العام"),
            array("region"=>"حائل","site"=>"مستشفى الحائط العام"),
            array("region"=>"حائل","site"=>"مستشفى السليمي العام"),
            array("region"=>"حائل","site"=>"مستشفى الشنان العام"),
            array("region"=>"حائل","site"=>"مستشفى سميراء العام"),
            array("region"=>"حائل","site"=>"مركز صحي الجامعيين"),
            array("region"=>"حفر الباطن","site"=>"مركز صحي أبو موسى الأشعري"),
            array("region"=>"حفر الباطن","site"=>"مستشفى القيصومة العام"),
            array("region"=>"عسير","site"=>"مركز صحي الرصراص "),
            array("region"=>"عسير","site"=>"مركز صحي المنهل "),
            array("region"=>"عسير","site"=>"مركز صحي عاكسه"),
            array("region"=>"عسير","site"=>"مركز صحي الطلحه "),
            array("region"=>"عسير","site"=>"مركز صحي احد رفيده  (عرق بلحنا)"),
            array("region"=>"عسير","site"=>"مستشفى بللسمر "),
            array("region"=>"عسير","site"=>"مستشفى الحرجه"),
            array("region"=>"عسير","site"=>"مركز صحي الوهابه"),
            array("region"=>"عسير","site"=>"مستشفى القحمة"),
            array("region"=>"عسير","site"=>"مستشفى الفرشة"),
            array("region"=>"عسير","site"=>"مركز صحي الشعبيين "),
            array("region"=>"عسير","site"=>"مستشفى المجاردة"),
            array("region"=>"عسير","site"=>"مركز  محايل للأمراض التنفسية "),
            array("region"=>"مكة المكرمة","site"=>"مركز صحي الهجلة"),
            array("region"=>"مكة المكرمة","site"=>"مركز صحي المنصور "),
            array("region"=>"مكة المكرمة","site"=>"مركز صحي شرايع المجاهدين "),
            array("region"=>"مكة المكرمة","site"=>"مركز صحي أبو عروة "),
            array("region"=>"مكة المكرمة","site"=>"مركز صحي الكامل "),
            array("region"=>"مكة المكرمة","site"=>"مركز صحي غران"),
            array("region"=>"مكة المكرمة","site"=>"مركز صحي المقرح"),
            array("region"=>"مكة المكرمة","site"=>"مركز صحي العزيزية الشرقية"),
            array("region"=>"مكة المكرمة","site"=>"مركز صحي التخصصي"),
            array("region"=>"مكة المكرمة","site"=>"مركز صحي التنعيم"),
            array("region"=>"مكة المكرمة","site"=>"مركز صحي حدا"),
            array("region"=>"مكة المكرمة","site"=>"مركز صحي الحسينية"),
            array("region"=>"مكة المكرمة","site"=>"مركز صحي الزيماء"),
            array("region"=>"مكة المكرمة","site"=>"مركز صحي الكرشداد"),
            array("region"=>"مكة المكرمة","site"=>"مركز صحي هدى الشام"),
            array("region"=>"مكة المكرمة","site"=>"مركز صحي ام الجرم"),
            array("region"=>"نجران","site"=>"مستشفى الملك خالد  "),
            array("region"=>"نجران","site"=>"مستشفى حبونا العام"),
            array("region"=>"نجران","site"=>"مستشفى خباش العام "),
            array("region"=>"نجران","site"=>"مستشفى يدمه العام"),
            array("region"=>"نجران","site"=>"مستشفى بدر الجنوب العام"),
            array("region"=>"نجران","site"=>"مستشفى ثار العام"),
            array("region"=>"نجران","site"=>"مستشفى شروره العام"),
            array("region"=>"نجران","site"=>"مستشفى نجران العام الجديد")
        );

        $this->getOutput()->progressStart(count($data));

        foreach ($data as $d) {
            $region = Region::where('name', $d['region'])->first();

            if(empty($region)){
                dd($d['region']);
            }

            $da = [
                'name' => $d['site'],
                'region_id' => $region->_id
            ];

            Site::create($da);

            $this->output->progressAdvance();
        }

        dd("Site Done");
    }
}

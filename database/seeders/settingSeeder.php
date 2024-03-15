<?php

namespace Database\Seeders;

use App\Models\setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class settingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        setting::factory()->create([
            "title"=>"سدنه",
            "des"=>"سدنه للخدمات الفانونية و الخدمات الحكومية و المؤسسات",
            "keyword"=>"محامات , مؤسسات ,شركات",
            "map"=>"https://www.google.com/maps/search/olds+lad'/@27.5248233,41.1334047,10z?hl=en",
            "billterm"=>"
            1-لا يمكن استرجاع المبلغ بعد اعتماد الطلب
            2-يمكن التعديل على الطلب بعد ثلاث ايام من الاعتماد
            للشكاوي و الاقتراحات : 0536576138
            ",
            "weekwork"=>"dsada",
            "terms"=>"
            1-لا يمكن استرجاع المبلغ بعد اعتماد الطلب
            2-يمكن التعديل على الطلب بعد ثلاث ايام من الاعتماد
            للشكاوي و الاقتراحات : 0536576138
            ",
            'copyright'=>'© 2022 - سدنه للخدمات الفانونية و الخدمات الحكومية و المؤسسات',
            'logo'=>'logo.png',
            "phone"=>"0536576138",
            "email"=>"info@sadana.info",
            "adress"=>"مؤسسة سليمان باسم الدلالي للخدمات الطلابية - حائل-  شارع المطار - بالقرم من فرع الراجحي",
            "footer"=>"footer",
            "footertext"=>"footertext"
        
        ]);


        

    }
}

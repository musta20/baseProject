<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        setting::factory()->create([
            'title' => 'المتحدة',
            'des' => 'مكتب متحدون للمحاماة:
            شركاء في تحقيق العدالة
            نقدم خدمات قانونية متميزة في مختلف المجالات:
            قضايا مدنية وتجارية: عقود، نزاعات مالية، تعويضات، ...
            قضايا جنائية: جرائم، قضايا مخدرات، قضايا سرقة، ...
            قضايا أحوال شخصية: زواج، طلاق، حضانة، ...
            قضايا إدارية: قضايا عمل، قضايا ضريبية، ...
            فريقنا من المحامين ذوي الخبرة والكفاءة على استعداد للدفاع عن حقوقك وتحقيق مصالحك. ',
            'keyword' => 'محامات , مؤسسات ,شركات',
            'map' => "https://www.google.com/maps/search/olds+lad'/@27.5248233,41.1334047,10z?hl=en",
            'billterm' => '
            1-لا يمكن استرجاع المبلغ بعد اعتماد الطلب
            2-يمكن التعديل على الطلب بعد ثلاث ايام من الاعتماد
            للشكاوي و الاقتراحات : 010265426
            ',
            'weekwork' => 'من الاحد الى الخميس 8:30ص - 9:30 م',
            'terms' => '
            1-لا يمكن استرجاع المبلغ بعد اعتماد الطلب
            2-يمكن التعديل على الطلب بعد ثلاث ايام من الاعتماد
            للشكاوي و الاقتراحات : 0536576138
            ',
            'copyright' => 'جميع الحقوق محفوظة المتحدون @2024',
            'logo' => 'logo/logo.png',
            'phone' => '053698738 - 010265426 -+1026510',
            'email' => 'almotahida@almotahida.xyz',
            'adress' => 'مكتب المتحدون للخدمات القانونبة - الرياض-  شارع المطار - بالقرب من فرع الراجحي',
            'footer' => 'footer',
            'footertext' => 'footertext',

        ]);

                    // create the /slide folder if it does not exist
                    if (!Storage::disk('public')->exists('logo')) {
                        Storage::disk('public')->makeDirectory('logo');
                    }
                   // $SlideImagePath = storage_path() . '/app/public/Slide/';
                    $imagePath = storage_path() . '/Images/';

                    // copy the file to the /Slide folder
                    Storage::disk('public')->put('logo/logo.png' , file_get_contents(  $imagePath . 'logo.png'));
                    

    }
}

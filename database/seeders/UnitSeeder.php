<?php

namespace Database\Seeders;

use App\Models\Unit;
use Illuminate\Database\Seeder;

class UnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //unit migrations to be inserted

        $units = [
            ['unit_name' => "وكيل الجامعة لشؤون التعلم", 'building_id' => 1],
            ['unit_name' => "وكيل الجامعة للشؤون العامة", 'building_id' => 1],
            ['unit_name' => "وكيل الجامعة للشؤون الأكاديمية والدراسات العليا", 'building_id' => 1],
            ['unit_name' => "كلية الطب", 'building_id' => 3],
            ['unit_name' => "كلية طب وجراحة الفم والأسنان", 'building_id' => 5],
            ['unit_name' => "كلية الصيدلة", 'building_id' => 3],
            ['unit_name' => "كلية العلوم التطبيقية", 'building_id' => 1],
            ['unit_name' => "كلية تكنولوجيا المعلومات", 'building_id' => 1],
            ['unit_name' => "كلية إدارة الأعمال", 'building_id' => 3],
            ['unit_name' => "مركز طب وجراحة الفم والاسنان", 'building_id' => 4],
            ['unit_name' => "مركز التدريب والتعلم المستمر", 'building_id' => 3],
            ['unit_name' => "مركز البحوث والاستشارات", 'building_id' => 3],
            ['unit_name' => "مركز المهارات السريرية", 'building_id' => 8],
            ['unit_name' => "المركز الإعلامي", 'building_id' => 2],
            ['unit_name' => "إدارة مشروع عمليات الاعمال", 'building_id' => 1],
            ['unit_name' => "إدارة التوثيق والمعلومات", 'building_id' => 3],
            ['unit_name' => "إدارة المسجل العام", 'building_id' => 6],
            ['unit_name' => "إدارة العلاقات الأكاديمية", 'building_id' => 3],
            ['unit_name' => "إدارة التسويق", 'building_id' => 1],
            ['unit_name' => "مكتب ضمان الجودة", 'building_id' => 1],
            ['unit_name' => "مكتب الرقابة الداخلية", 'building_id' => 1],
            ['unit_name' => "مكتب الموارد البشرية", 'building_id' => 6],
            ['unit_name' => "مكتب شؤون أعضاء هيئة التدريس", 'building_id' => 2],
            ['unit_name' => "مكتب شؤون المكتبات", 'building_id' => 2],
            ['unit_name' => "مكتب الشؤون المالية", 'building_id' => 6],
            ['unit_name' => "إدارة تقنية المعلومات", 'building_id' => 1],
            ['unit_name' => "مكتب البيئة والمجتمع", 'building_id' => 3],
            ['unit_name' => "مكتب التعليم الإلكتروني", 'building_id' => 1],
            ['unit_name' => "مكتب الفنية والمشاريع", 'building_id' => 1],
            ['unit_name' => "مكتب النشاط الطلابي", 'building_id' => 3],
            ['unit_name' => "مكتب الخريجين", 'building_id' => 6],
        ];

        foreach($units as $unit){
            Unit::create($unit);
        }


    }
}

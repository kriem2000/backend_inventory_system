<?php

namespace Database\Seeders;

use App\Models\Building;
use Illuminate\Database\Seeder;

class BuildingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $buildings = [
            'المبنى التعليمي الاول',
            'المبنى التعليمي الثاني',
            'المبنى التعليمي الثالث',
            'مبنى مركز الاسنان',
            'إدارة كلية الاسنان',
            'المبنى الإداري',
            'مبنى الحرس الجامعي',
            'مبنى المهارات السريرية'
        ];

        foreach($buildings as $building){
            Building::create([
                'building_name' => $building,
                'building_desc' => ""
            ]);
        }
    }
}

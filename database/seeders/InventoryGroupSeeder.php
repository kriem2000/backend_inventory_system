<?php

namespace Database\Seeders;

use App\Models\InventoryGroup;
use Illuminate\Database\Seeder;

class InventoryGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $inventory_group = [
            [
                'group_name' => 'لجنة جرد 2021',
                'group_desc' => 'لجنة الجرد المسؤولة عن الجرد القائم لهذه السنة',
                'isActive' => 1
            ]
        ];

        foreach($inventory_group as $group){
            InventoryGroup::create($group);
        }
    }
}

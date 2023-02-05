<?php

namespace Database\Seeders;

use App\Models\ItemStatus;
use Illuminate\Database\Seeder;

class ItemStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $item_status = [
            'ممتازة',
            'جيدة',
            'سيئة'
        ];

        foreach($item_status as $status){
            ItemStatus::create([
                'status_name' => $status,
                'status_desc' => ""
            ]);
        }
    }
}

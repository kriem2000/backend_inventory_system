<?php

namespace Database\Seeders;

use App\Models\TaskStatus;
use Illuminate\Database\Seeder;

class TaskStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $status = [
            'منجز', 'قيد الإنجاز'
        ];

        foreach($status as $stat){
            TaskStatus::create([
                'status_name' => $stat,
                'status_desc' => ""
            ]);
        }
    }
}

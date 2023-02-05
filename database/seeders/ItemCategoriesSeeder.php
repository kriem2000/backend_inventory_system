<?php

namespace Database\Seeders;

use App\Models\ItemCategories;
use Illuminate\Database\Seeder;

class ItemCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $item_categories = [
            'الات ومعدات اخرى',
            'اثاث وتركيبات ومفروشات',
            'الاجهزة والمعدات والاجهزة المكتبية',
            'الاجهزة والمعدات والوسائل التعليمية',
            'الانشاءات التعليمية والإدارية',
            'وسائل نقل'
        ];

        foreach($item_categories as $category){
            ItemCategories::create([
                'category_name' => $category,
                'category_desc' => ""
            ]);
        }

    }
}

<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserHeadSeeder extends Seeder
{
    
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name' => "عبدالله المنصوري",
                'nickname' => '',
                'phone_number' => '',
                'email' => "almansori-head@limu.com",
                'password' => Hash::make(12345678),
                'unit_id' => 1,
                'isHead' => true,
                'inventory_group_id' => 1,
                'isActive' => true
            ],
            [
                'name' => "عبدالقادر التائب",
                'nickname' => '',
                'phone_number' => '',
                'email' => "altaib@limu.com",
                'password' => Hash::make(12345678),
                'unit_id' => 2,
                'isHead' => true,
                'inventory_group_id' => 1,
                'isActive' => true 
            ],
            [
                'name' => "السنوسي الطاهر",
                'nickname' => '',
                'phone_number' => '',
                'email' => "alsanousi-academic@limu.com",
                'password' => Hash::make(12345678),
                'unit_id' => 3,
                'isHead' => true,
                'inventory_group_id' => 1,
                'isActive' => true 
            ],
            [
                'name' => "جمال الطلحي",
                'nickname' => '',
                'phone_number' => '',
                'email' => "abdulgader@limu.com",
                'password' => Hash::make(12345678),
                'unit_id' => 4,
                'isHead' => true,
                'inventory_group_id' => 1,
                'isActive' => true 
            ],
            [
                'name' => 'السنوسي الطاهر',
                'nickname' => '',
                'phone_number' => '',
                'email' => "alsanousi-college@limu.com",
                'password' => Hash::make(12345678),
                'unit_id' => 5,
                'isHead' => true,
                'inventory_group_id' => 1,
                'isActive' => true 
            ],
            [
                'name' => "سالمة بوخطوة",
                'nickname' => '',
                'phone_number' => '',
                'email' => "salma@limu.com",
                'password' => Hash::make(12345678),
                'unit_id' => 6,
                'isHead' => true,
                'inventory_group_id' => 1,
                'isActive' => true 
            ],
            [
                'name' => "عبدالله المنصوري",
                'nickname' => '',
                'phone_number' => '',
                'email' => "almansori-college@limu.com",
                'password' => Hash::make(12345678),
                'unit_id' => 7,
                'isHead' => true,
                'inventory_group_id' => 1,
                'isActive' => true 
            ],
            [
                'name' => "توفيق الطويل",
                'nickname' => '',
                'phone_number' => '',
                'email' => "twafig-college@limu.com",
                'password' => Hash::make(12345678),
                'unit_id' => 8,
                'isHead' => true,
                'inventory_group_id' => 1
,                'isActive' => true
            ],
            [
                'name' => "صبري جبران",
                'nickname' => '',
                'phone_number' => '',
                'email' => "sabri@limu.com",
                'password' => Hash::make(12345678),
                'unit_id' => 9,
                'isHead' => true,
                'inventory_group_id' => 1,
                'isActive' => true 
            ],
            [
                'name' => "اسماء المسماري",
                'nickname' => '',
                'phone_number' => '',
                'email' => "asmaa-center@limu.com",
                'password' => Hash::make(12345678),
                'unit_id' => 10,
                'isHead' => true,
                'inventory_group_id' => 1,
                'isActive' => true 
            ],
            [
                'name' => "عبدالرحمن القلال",
                'nickname' => '',
                'phone_number' => '',
                'email' => "algallal@limu.com",
                'password' => Hash::make(12345678),
                'unit_id' => 11,
                'isHead' => true,
                'inventory_group_id' => 1
,                'isActive' => true
            ],
            [
                'name' => "سالمة بوخطوة",
                'nickname' => '',
                'phone_number' => '',
                'email' => "salma-research@limu.com",
                'password' => Hash::make(12345678),
                'unit_id' => 12,
                'isHead' => true,
                'inventory_group_id' => 1
,                'isActive' => true
            ],
            [
                'name' => "ايمان الحاسي",
                'nickname' => '',
                'phone_number' => '',
                'email' => "eman-elhassi@limu.com",
                'password' => Hash::make(12345678),
                'unit_id' => 13,
                'isHead' => true,
                'inventory_group_id' => 1,               
                'isActive' => true
            ],
            [
                'name' => "سالم الفيتوري",
                'nickname' => '',
                'phone_number' => '',
                'email' => "salem-alfaytouri@limu.com",
                'password' => Hash::make(12345678),
                'unit_id' => 14,
                'isHead' => true,
                'inventory_group_id' => 1
,               'isActive' => true
            ],
            [
                'name' => "عبدالقادر التائب",
                'nickname' => '',
                'phone_number' => '',
                'email' => "altaib-skills@limu.com",
                'password' => Hash::make(12345678),
                'unit_id' => 15,
                'isHead' => true,
                'inventory_group_id' => 1
,                'isActive' => true
            ],
            [
                'name' => "صفاء كيشار",
                'nickname' => '',
                'phone_number' => '',
                'email' => "safaa@limu.com",
                'password' => Hash::make(12345678),
                'unit_id' => 16,
                'isHead' => true,
                'inventory_group_id' => 1
,                'isActive' => true
            ],
            [
                'name' => "ابراهيم المغربي",
                'nickname' => '',
                'phone_number' => '',
                'email' => "ibrahim-almoghrby@limu.com",
                'password' => Hash::make(12345678),
                'unit_id' => 17,
                'isHead' => true,
                'inventory_group_id' => 1
,                'isActive' => true
            ],
            [
                'name' => "سالمة بوخطوة",
                'nickname' => '',
                'phone_number' => '',
                'email' => "salma-academic@limu.com",
                'password' => Hash::make(12345678),
                'unit_id' => 18,
                'isHead' => true,
                'inventory_group_id' => 1
,                'isActive' => true
            ],
            [
                'name' => "نورا نصيب",
                'nickname' => '',
                'phone_number' => '',
                'email' => "noura-nasib@limu.com",
                'password' => Hash::make(12345678),
                'unit_id' => 19,
                'isHead' => true,
                'inventory_group_id' => 1
,                'isActive' => true
            ],
            [
                'name' => "اسماء الزغيبي",
                'nickname' => '',
                'phone_number' => '',
                'email' => "asmaa_elzghaiby@limu.com",
                'password' => Hash::make(12345678),
                'unit_id' => 20,
                'isHead' => true,
                'inventory_group_id' => 1
,                'isActive' => true
            ],
            [
                'name' => "فتحي الكرد",
                'nickname' => '',
                'phone_number' => '',
                'email' => "fathi_alkurd@limu.com",
                'password' => Hash::make(12345678),
                'unit_id' => 21,
                'isHead' => true,
                'inventory_group_id' => 1
,                'isActive' => true
            ],
            [
                'name' => "أحمد الفاخري",
                'nickname' => '',
                'phone_number' => '',
                'email' => "ahmed-alfahkri@limu.com",
                'password' => Hash::make(12345678),
                'unit_id' => 22,
                'isHead' => true,
                'inventory_group_id' => 1
,                'isActive' => true
            ],
            [
                'name' => "فايز البيجو",
                'nickname' => '',
                'phone_number' => '',
                'email' => "faiz_elbejou@limu.com",
                'password' => Hash::make(12345678),
                'unit_id' => 23,
                'isHead' => true,
                'inventory_group_id' => 1
,                'isActive' => true
            ],
            [
                'name' => "حنان المحرصي",
                'nickname' => '',
                'phone_number' => '',
                'email' => "hanaan@limu.com",
                'password' => Hash::make(12345678),
                'unit_id' => 24,
                'isHead' => true,
                'inventory_group_id' => 1,
                'isActive' => true
            ],
            [
                'name' => "تهاني البرعصي",
                'nickname' => '',
                'phone_number' => '',
                'email' => "tahany@limu.com",
                'password' => Hash::make(12345678),
                'unit_id' => 25,
                'isHead' => true,
                'inventory_group_id' => 1,
                'isActive' => true
            ],
            [
                'name' => "توفيق الطويل",
                'nickname' => '',
                'phone_number' => '',
                'email' => "tawfig-office@limu.com",
                'password' => Hash::make(12345678),
                'unit_id' => 26,
                'isHead' => true,
                'inventory_group_id' => 1,
                'isActive' => true
            ],
            [
                'name' => "وهيبة الحاسي",
                'nickname' => '',
                'phone_number' => '',
                'email' => "waheeba-env@limu.com",
                'password' => Hash::make(12345678),
                'unit_id' => 27,
                'isHead' => true,
                'inventory_group_id' => 1,
                'isActive' => true
            ],
            [
                'name' => "ايهاب الفلاح",
                'nickname' => '',
                'phone_number' => '',
                'email' => "ehab-alfallah@limu.com",
                'password' => Hash::make(12345678),
                'unit_id' => 28,
                'isHead' => true,
                'inventory_group_id' => 1,
                'isActive' => true
            ],
            [
                'name' => "مبارك سعد مبارك",
                'nickname' => '',
                'phone_number' => '',
                'email' => "mubark-saad@limu.com",
                'password' => Hash::make(12345678),
                'unit_id' => 29,
                'isHead' => true,
                'inventory_group_id' => 1,
                'isActive' => true
            ],
            [
                'name' => "ابوبكر الربع",
                'nickname' => '',
                'phone_number' => '',
                'email' => "mabrouk@limu.com",
                'password' => Hash::make(12345678),
                'unit_id' => 30,
                'isHead' => true,
                'inventory_group_id' => 1,
                'isActive' => true
            ],
            [
                'name' => "وهيبة الحاسي",
                'nickname' => '',
                'phone_number' => '',
                'email' => "waheeba-grad@limu.com",
                'password' => Hash::make(12345678),
                'unit_id' => 31,
                'isHead' => true,
                'inventory_group_id' => 1,
                'isActive' => true
            ]
            
        ];

        foreach($users as $user){
            User::create($user);
        }
    }
}

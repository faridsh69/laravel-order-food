<?php

use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cities =[
        	['id' => 1, 'name' => 'بابل'],
            ['id' => 2, 'name' => 'بابلسر'],
        	['id' => 3, 'name' => 'ساری'],
        	['id' => 4, 'name' => 'آمل'],
        	['id' => 5, 'name' => 'نوشهر'],
        	['id' => 6, 'name' => 'چالوس'],
        	['id' => 7, 'name' => 'قایم شهر'],
        	['id' => 8, 'name' => 'کلاردشت'],
        	['id' => 9, 'name' => 'ماسوله'],
        	['id' => 10, 'name' => 'نکا'],
        	['id' => 11, 'name' => 'نور'],
        	['id' => 12, 'name' => 'محموداباد'],
        	['id' => 13, 'name' => 'سراوان'],
        	['id' => 14, 'name' => 'تنکابن'],
    	];
        foreach($cities as $city)
        {
    	   \App\Models\City::firstOrCreate($city); 
        }
    }
}

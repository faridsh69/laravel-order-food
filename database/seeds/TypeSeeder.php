<?php

use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types =[
        	['id' => 1, 'name' => 'پیتزا'],
        	['id' => 2, 'name' => 'سانویچ'],
        	['id' => 3, 'name' => 'برگر'],
        	['id' => 4, 'name' => 'سوخاری'],
        	['id' => 5, 'name' => 'کباب'],
        	['id' => 6, 'name' => 'جوجه'],
        	['id' => 7, 'name' => 'ماهی'],
        	['id' => 8, 'name' => 'محلی'],
            ['id' => 9, 'name' => 'خورشت'],
        	['id' => 10, 'name' => 'سنتی'],
    	];
        foreach($types as $type)
        {
    	   App\Models\Type::firstOrCreate($type); 
        }
    }
}

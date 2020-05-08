<?php

use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        //$name = $faker->sentence(3);
        //$slug = str_slug($name,"-");

        for($i = 1; $i <= 5; $i++) { 
                DB::table('customer')->insert([
                'name' => $faker->sentence(2),
                'position' => $faker->sentence(2),
                'image' => $faker->image('public/uploads/customer',640,480, null, false),
                'content' => $faker->paragraph,
                //'blogcategory_id' =>  $faker->unique()->randomNumber(4),
                //'blogtag_id' =>  $faker->unique()->randomNumber(4),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ]);   
        }
    }
}

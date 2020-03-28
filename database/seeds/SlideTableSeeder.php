<?php

use Illuminate\Database\Seeder;

class SlideTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        foreach (range(1,10) as $index) { 
                DB::table('slide')->insert([
                'name' => $faker->sentence,
                'description' => $faker->paragraph,
                'image' => $faker->image('public/uploads/slide',640,480, null, false),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ]);   
        }
    }
}

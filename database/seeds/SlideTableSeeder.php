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

        for ($i=1; $i <= 4 ; $i++) { 
                DB::table('slide')->insert([
                'name' => $faker->sentence(2),
                'description' => $faker->paragraph(3),
                'image' => $faker->image('public/uploads/slide',640,480, null, false),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ]);   
        }
    }
}

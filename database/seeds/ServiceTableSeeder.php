<?php

use Illuminate\Database\Seeder;
use App\Models\Service;

class ServiceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        $title = $faker->sentence;
        $slug = str_slug($title,"-");

        foreach (range(1,50) as $index) { 
                DB::table('service')->insert([
                'title' => $title,
                'slug' => $slug,
                'description' => $faker->paragraph,
                'image' => $faker->image('public/uploads',640,480, null, false),
                'detail' => $faker->paragraph,
                'servicecate_id' =>  1,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ]);   
        }
    }
}

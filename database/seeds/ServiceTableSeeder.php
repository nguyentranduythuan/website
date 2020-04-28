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

        for ($i = 1; $i <= 10; $i++) { 
                DB::table('service')->insert([
                'title' => $title,
                'slug' => $slug,
                'description' => $faker->sentence(4),
                'image' => $faker->image('public/uploads',640,480, null, false),
                'detail' => $faker->paragraph,
                'servicecate_id' => $faker->unique()->randomDigit(),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ]);   
        }
    }
}

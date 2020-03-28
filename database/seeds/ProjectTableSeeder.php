<?php

use Illuminate\Database\Seeder;

class ProjectTableSeeder extends Seeder
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

        foreach (range(1,10) as $index) { 
                DB::table('project')->insert([
                'title' => $title,
                'slug' => $slug,
                'description' => $faker->sentence,
                'image' => $faker->image('public/uploads/project',640,480, null, false),
                'content' => $faker->paragraph,
                'project-category_id' => $faker->unique()->randomDigit,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ]);   
        }
    }
}

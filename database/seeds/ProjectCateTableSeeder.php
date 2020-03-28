<?php

use Illuminate\Database\Seeder;

class ProjectCateTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        $name = $faker->sentence;
        $slug = str_slug($name,"-");

        foreach (range(1,10) as $index) { 
                DB::table('project_category')->insert([
                'name' => $name,
                'slug' => $slug,
                'description' => $faker->paragraph,
                // 'image' => $faker->image('public/uploads',640,480, null, false),
                // 'detail' => $faker->paragraph,
                // 'servicecate_id' =>  1,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ]);   
        }
    }
}

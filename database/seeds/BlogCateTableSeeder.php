<?php

use Illuminate\Database\Seeder;

class BlogCateTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        $name = $faker->sentence(1);
        $slug = str_slug($name,"-");

        for ($i=1; $i <= 5 ; $i++) { 
                DB::table('blog_category')->insert([
                'name' => $name,
                'slug' => $slug,
                // 'description' => $faker->paragraph,
                // 'image' => $faker->image('public/uploads',640,480, null, false),
                // 'detail' => $faker->paragraph,
                // 'servicecate_id' =>  1,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ]);   
        }
    }
}

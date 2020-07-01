<?php

use Illuminate\Database\Seeder;

class BlogTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        $name = $faker->sentence(3);
        $slug = str_slug($name,"-");

        foreach (range(1,10) as $index) { 
                DB::table('blog')->insert([
                'name' => $name,
                'slug' => $slug,
                'description' => $faker->sentence(4),
                'image' => $faker->image('public/uploads/blog',640,480, null, false),
                'content' => $faker->paragraph,
                'blogcategory_id' => 1 ,
                'blogtag_id' =>  1,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ]);   
        }
    }
}

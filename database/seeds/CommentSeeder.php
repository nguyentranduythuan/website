<?php

use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
            for($i = 1;$i<=10; $i++){
                DB::table('comment')->insert([
                'name' => $faker->sentence(3),
                'content' => $faker->sentence(4),
                //'blog_id' => 1,
                //'user_id' => 1
                ]);
            }
    }
}

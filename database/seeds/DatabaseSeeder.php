<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //$this->call(AboutTableSeeder::class);
        //$this->call(SlideTableSeeder::class);
        //$this->call(ServiceTableSeeder::class);
        //$this->call(ServiceCateTableSeeder::class);
        //$this->call(ProjectCateTableSeeder::class);
        //$this->call(ProjectTableSeeder::class);
        //$this->call(TagTableSeeder::class);
        //$this->call(BlogCateTableSeeder::class);
        //$this->call(BlogTableSeeder::class);
        //$this->call(UsersTableSeeder::class);
        // $this->call(CommentSeeder::class);
        // $this->call(CustomerSeeder::class);
        $this->call(AdminSeeder::class);
    }
}

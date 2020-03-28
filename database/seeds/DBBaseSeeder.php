<?php

use Illuminate\Database\Seeder;

class DBBaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Eloquent::unguard();
        
		//disable foreign key check for this connection before running seeders
		DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        //
        DB::table('streets')->truncate();
        DB::table('wards')->truncate();
        DB::table('districts')->truncate();
        DB::table('provinces')->truncate();

        // supposed to only apply to a single connection and reset it's self
		// but I like to explicitly undo what I've done for clarity
		DB::statement('SET FOREIGN_KEY_CHECKS=1;');

		
        $path = 'database/data/provinces.sql';
        DB::unprepared(file_get_contents($path));
        $this->command->info('provinces table seeded!');
        
        $path = 'database/data/districts.sql';
        DB::unprepared(file_get_contents($path));
        $this->command->info('districts table seeded!');

        $path = 'database/data/wards.sql';
        DB::unprepared(file_get_contents($path));
        $this->command->info('wards table seeded!');

        $path = 'database/data/streets.sql';
        DB::unprepared(file_get_contents($path));
        $this->command->info('streets table seeded!');
    }
}

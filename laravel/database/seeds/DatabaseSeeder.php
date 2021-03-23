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
        // SEEDER PER POST E TAG 
        $this->call([
            PostSeeder::class,
            TagSeeder::class
            ]);
    }
}

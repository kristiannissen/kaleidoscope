<?php

use Illuminate\Database\Seeder;

class BlogEntriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(App\BlogEntry::class, 50)->create();
    }
}
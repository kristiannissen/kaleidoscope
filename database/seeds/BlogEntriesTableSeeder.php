<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;

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
        factory(App\BlogEntry::class, 50)->create()->each(
            function ($blogEntry) {
                $ids = range(1 ,5);
                shuffle($ids);
                $blogEntry->categories()->attach($ids);
            }
        );
    }
}

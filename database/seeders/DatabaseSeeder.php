<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'title' => 'testCat',
            'status' => 'on'
        ]);

        for ($i = 1; $i < 10; $i++) {
            DB::table('pages')->insert([
                'title' => 'test' . Str::random(10),
                'descriptions' => Str::random(25),
                'cat_id' => 1,
            ]);

            DB::table('seo')->insert([
                'seo_slug' => 'my-page-'.$i,
                'seo_title' => 'seo title',
                'seo_h1' => 'seo h1',
                'page_id' => $i,
            ]);
        }

    }
}

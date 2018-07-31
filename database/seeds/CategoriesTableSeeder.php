<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            [
                'categories' => 'Oziq ovqat',
                'slug' => 'oziq-ovqat'
            ],
            [
                'categories' => 'Orgtexnika',
                'slug' => 'orgtexnika'
            ],
        ]);
    }
}

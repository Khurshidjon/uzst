<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class DegreeOfHazardTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('degree_of_hazards')->insert([
            [
                'degree_of_hazards' => 'Sog\'liq uchun zararli bo\'lishi mumkin',
                'degree_id' => 1,
            ],
            [
                'degree_of_hazards' => 'Xavfli',
                'degree_id' => 2,
            ],
            [
                'degree_of_hazards' => 'Ehtiyot bo\'ling',
                'degree_id' => 3,
            ],
            [
                'degree_of_hazards' => 'Judayam xavfli',
                'degree_id' => 4,
            ],
            [
                'degree_of_hazards' => 'Hayot uchun xavfli',
                'degree_id' => 5,
            ],
        ]);
    }
}

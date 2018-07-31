<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            [
                'roles' => 'super-admin'
            ],
            [
                'roles' => 'admin'
            ],
            [
                'roles' => 'admin-child'
            ],
            [
                'roles' => 'user'
            ]
        ]);
    }
}

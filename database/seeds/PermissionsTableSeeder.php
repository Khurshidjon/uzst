<?php

use Illuminate\Database\Seeder;
use App\Permission;
use Illuminate\Support\Facades\DB;
class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->insert([
            [
               'permissions' => 'create-product'
            ],
            [
                'permissions' => 'edit-product'
            ],
            [
                'permissions' => 'delete-product'
            ],
            [
                'permissions' => 'create-user'
            ],
            [
                'permissions' => 'edit-user'
            ],
            [
                'permissions' => 'delete-user'
            ],
            [
                'permissions' => 'create-comment'
            ],
            [
                'permissions' => 'edit-comment'
            ],
            [
                'permissions' => 'delete-comment'
            ],
        ]);
    }
}

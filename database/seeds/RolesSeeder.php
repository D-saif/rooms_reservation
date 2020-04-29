<?php

use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
                   'id_role' => 1,
                   'name_role' => 'Super admin',
                   
               ]);
        DB::table('roles')->insert([
                   'id_role' => 2,
                   'name_role' => 'Moderator',
                   
               ]);
        DB::table('roles')->insert([
                   'id_role' => 3,
                   'name_role' => 'Club',
                   
               ]);
    }
}

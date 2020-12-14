<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('teams')->insert([
            'id'=>1,
        ]);
        DB::table('users')->insert([
            'id'=>1,
            'team_id'=>1,
            'username' => 'admin',
            'email' => 'admin@admin.com',
            'avatar'=>'1.svg',
            'password' => Hash::make('admin'),
            'is_admin'=>1,
            'avatar_choosen_at'=>date('Y-m-d H:i:s'),
        ]);
        DB::table('teams')->insert([
            'id'=>2,
        ]);
        DB::table('users')->insert([
            'id'=>2,
            'team_id'=>2,
            'username' => 'Sacha',
            'email' => 'sacha@sacha.com',
            'password' => Hash::make('password'),
        ]);
        DB::table('teams')->insert([
            'id'=>3,
        ]);
        DB::table('users')->insert([
            'id'=>3,
            'team_id'=>3,
            'username' => 'Yann',
            'email' => 'yann@yann.com',
            'password' => Hash::make('password'),
        ]);
    }
}

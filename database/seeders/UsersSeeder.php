<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::table('users')->delete();

        \App\Models\User::create([
            'name'=>'admin',
            'email'=>'adminsmk@gmail.com',
            'password'=>bcrypt('admin123'),
            'isAdmin' => 2,
            'role'=>'admin',
        ]);
        \App\Models\User::create([
            'name'=>'guru',
            'email'=>'gurusmk@gmail.com',
            'password'=>bcrypt('guru123'),
            'isAdmin' => 1,
            'role'=>'guru',
        ]);
        \App\Models\User::create([
            'name'=>'murid',
            'email'=>'muridsmk@gmail.com',
            'password'=>bcrypt('murid123'),
            'isAdmin' => 0,
            'role'=>'murid',
        ]);
    }
}
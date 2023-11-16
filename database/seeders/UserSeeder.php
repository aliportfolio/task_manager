<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'id' => 1,
                'name' => 'Ali Al Saleh',
                'email' => 'user@user.com',
                'password' => bcrypt(123123123)
            ],
            [
                'id' => 2,
                'name' => 'Ahmad Ahmad',
                'email' => 'user2@user.com',
                'password' => bcrypt(123123123)
            ]
        ]);
    }
}

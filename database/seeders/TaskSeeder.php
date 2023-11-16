<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tasks')->insert([
            [
                'id' => 1,
                'title' => 'Task 1',
                'description' => 'Task 1 Description',
                'due_date' => '2023-11-16 11:11:00',
                'user_id' => 1
            ],
            [
                'id' => 2,
                'title' => 'Task 2',
                'description' => 'Task 2 Description',
                'due_date' => '2023-11-16 10:10:00',
                'user_id' => 2
            ]
        ]);
    }
}

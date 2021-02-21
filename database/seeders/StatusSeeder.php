<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('status')->insert([
            'name' => 'Waiting answer',
            'created_at' => now(),
        ]);
        DB::table('status')->insert([
            'name' => 'Test task',
            'created_at' => now(),
        ]);
        DB::table('status')->insert([
            'name' => 'Interview',
            'created_at' => now(),
        ]);
        DB::table('status')->insert([
            'name' => 'Offer',
            'created_at' => now(),
        ]);
        DB::table('status')->insert([
            'name' => 'Failure',
            'created_at' => now(),
        ]);
    }
}

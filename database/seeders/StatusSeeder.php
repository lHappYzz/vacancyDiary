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
            'hex_color' => '#0d6efd',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('status')->insert([
            'name' => 'Test task',
            'hex_color' => '#FFC300',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('status')->insert([
            'name' => 'Interview',
            'hex_color' => '#FF5733',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('status')->insert([
            'name' => 'Offer',
            'hex_color' => '#2ECC71',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('status')->insert([
            'name' => 'Failure',
            'hex_color' => '#C0392B',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class MerkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('merks')->insert([
            'name' => 'polygon',
        ]);
        DB::table('merks')->insert([
            'name' => 'Lapierre',
        ]);
        DB::table('merks')->insert([
            'name' => 'Cube',
        ]);
        DB::table('merks')->insert([
            'name' => 'United Bike',
        ]);
    }
}

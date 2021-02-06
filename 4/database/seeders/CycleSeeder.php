<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class CycleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'user1',
            'email' => 'user1@gmail.com',
            'password' => Hash::make('user1234'),
        ]);
        DB::table('users')->insert([
            'name' => 'user2',
            'email' => 'user2@gmail.com',
            'password' => Hash::make('user1234'),
        ]);
        DB::table('cycles')->insert([
            'name' => 'str 1',
            'price' => '2000000',
            'stock' => '10',
            'image' => 'product/DF7BASO4os.jpg',
            'id_merk' => '1',

        ]);
        DB::table('cycles')->insert([
            'name' => 'Stratos 2',
            'price' => '2700000',
            'stock' => '30',
            'image' => 'product/DF7BASO4os.jpg',
            'id_merk' => '1',

        ]);
        DB::table('cycles')->insert([
            'name' => 'Helios lt8',
            'price' => '3500000',
            'stock' => '16',
            'image' => 'product/MY19-HELIOS-LT8-RED2-768x512.jpg',
            'id_merk' => '1',

        ]);
        DB::table('cycles')->insert([
            'name' => 'Bend R5',
            'price' => '4000000',
            'stock' => '16',
            'image' => 'product/MY20-BEND-RV-EDIT-768x512.jpg',
            'id_merk' => '1',

        ]);
        DB::table('cycles')->insert([
            'name' => 'Aircode drs',
            'price' => '3000000',
            'stock' => '10',
            'image' => 'product/Aircode-DRS-8.0-E443-%28vignette%29.jpg',
            'id_merk' => '2',

        ]);
        DB::table('cycles')->insert([
            'name' => 'Sharper',
            'price' => '2900000',
            'stock' => '30',
            'image' => 'product/Shaper-2.0-Disc-E302-%28vignette-artwork%29.jpg',
            'id_merk' => '2',

        ]);
        DB::table('cycles')->insert([
            'name' => 'MTB Cube XC',
            'price' => '2300000',
            'stock' => '11',
            'image' => 'product/GonysOerpl.jpg',
            'id_merk' => '3',

        ]);
        DB::table('cycles')->insert([
            'name' => 'STERLING R2',
            'price' => '23000000',
            'stock' => '12',
            'image' => 'product/united1.jpg',
            'id_merk' => '4',

        ]);
        DB::table('cycles')->insert([
            'name' => 'CLOVIS 8.00 ',
            'price' => '12300000',
            'stock' => '22',
            'image' => 'product/unitedl.jpg',
            'id_merk' => '4',

        ]);
    }
}

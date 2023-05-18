<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClasseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('classes')->insert(
            [
                [
                    'nom' => '1ére année college',
                ],
                [
                    'nom' => '2ére année college',
                ],
                [
                    'nom' => '3ére année college',
                ],
            ]
        );
    }
}

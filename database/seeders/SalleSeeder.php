<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SalleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('salles')->insert(
            [
                [
                    'salle_number' => 1,
                ],
                [
                    'salle_number' => 2,
                ],
                [
                    'salle_number' => 3,
                ],
                [
                    'salle_number' => 4,
                ],
                [
                    'salle_number' => 5,
                ],
            ]
        );
    }
}

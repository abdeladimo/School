<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProfSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('profs')->insert(
            [
                [
                    'user_id' => 2,
                    'matiere_id' => 1,
                ],
                [
                    'user_id' => 3,
                    'matiere_id' => 1,
                ],
                [
                    'user_id' => 4,
                    'matiere_id' => 2,
                ],
                [
                    'user_id' => 5,
                    'matiere_id' => 3,
                ],
            ]
        );
    }
}

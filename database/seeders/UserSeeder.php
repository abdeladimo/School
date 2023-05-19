<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            [
                'nom' => 'syk',
                'prenom' => 'web',
                'email' => 'sykweb@gmail.com',
                'password' => Hash::make('sykweb1234'),
            ],
            [
                'nom' => 'Ziti',
                'prenom' => 'Ilyas',
                'email' => 'ziti.ilyas@gmail.com',
                'password' => Hash::make('demo0000'),
            ],
            [
                'nom' => 'Gamani',
                'prenom' => 'Zakaria',
                'email' => 'gamani.zakaria@gmail.com',
                'password' => Hash::make('demo0000'),
            ],
            [
                'nom' => 'prof x1',
                'prenom' => 'prof x1',
                'email' => 'prof.x1@gmail.com',
                'password' => Hash::make('demo0000'),
            ],
            [
                'nom' => 'prof x2',
                'prenom' => 'prof x2',
                'email' => 'prof.x2@gmail.com',
                'password' => Hash::make('demo0000'),
            ],
        ]);
    }
}

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
                'tel' => '0661619735',
                'password' => Hash::make('sykweb1234'),
            ],
            [
                'nom' => 'Ziti',
                'prenom' => 'Ilyas',
                'email' => 'ziti.ilyas@gmail.com',
                'tel' => '0661619734',
                'password' => Hash::make('demo0000'),
            ],
            [
                'nom' => 'Gamani',
                'prenom' => 'Zakaria',
                'email' => 'gamani.zakaria@gmail.com',
                'tel' => '0661619733',
                'password' => Hash::make('demo0000'),
            ],
            [
                'nom' => 'prof x1',
                'prenom' => 'prof x1',
                'email' => 'prof.x1@gmail.com',
                'tel' => '0661619732',
                'password' => Hash::make('demo0000'),
            ],
            [
                'nom' => 'prof x2',
                'prenom' => 'prof x2',
                'email' => 'prof.x2@gmail.com',
                'tel' => '0661619731',
                'password' => Hash::make('demo0000'),
            ],
            [
                'nom' => 'Test',
                'prenom' => 'Login',
                'email' => 'testlogin@gmail.com',
                'tel' => '0661619730',
                'password' => Hash::make('loginlogin'),
            ],
        ]);
    }
}

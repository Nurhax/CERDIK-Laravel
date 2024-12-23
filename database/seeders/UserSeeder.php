<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Muhammad Iqbal Nurhaq',
            'email' => 'iqbalnur2009@gmail.com',
            'password' => bcrypt('AkuSayangMeniko123#')
        ]);

        
        User::create([
            'name' => 'Faris Azhar Dwiputra',
            'email' => 'farisAzhar12@gmail.com',
            'password' => bcrypt('FarisAzhar212')
        ]);
        
        User::create([
            'name' => 'Farrel Haykal Giffari',
            'email' => 'FarrelHaykal42@gmail.com',
            'password' => bcrypt('FarrelHaykal911')
        ]);
        
        User::create([
            'name' => 'Farah Amalia Putri',
            'email' => 'FarahAmalia123@yahoo.com',
            'password' => bcrypt('Farah123#@!')
        ]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeader extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'type' => 1,
            'name' => 'admin1',
            'prenom' => 'admin1',
            'email' => 'admin1@gmail.com',
            'cin' => 'JB555666',
            'telephone' => '0654678645',
            'nomUtilisateur' => 'admin1@gmail.com',
            'password' => bcrypt('1234567890'),
            'dernierAcces' => now(),
        ]);
    }
}

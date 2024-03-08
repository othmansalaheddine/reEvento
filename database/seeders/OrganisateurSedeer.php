<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class OrganisateurSedeer extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'name' => 'Organisateur',
            'email' => 'Organisateur@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('password'),
           
        ])->assignRole('user', 'Organisateur');
    }
}

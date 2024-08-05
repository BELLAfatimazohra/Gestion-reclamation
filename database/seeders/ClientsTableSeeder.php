<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClientsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('clients')->insert([
            'nom' => 'Doe',
            'prenom' => 'John',
            'email' => 'john@example.com',
            'telephone' => '123456789',
            'password' => 'password123', // Mot de passe en clair pour test
        ]);
    }
}

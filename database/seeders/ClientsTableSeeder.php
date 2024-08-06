<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClientsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('clients')->insert([
            'nom' => 'bella',
            'prenom' => 'fatima zohra',
            'email' => 'fatimazohrabella@gmail.com',
            'telephone' => '123456789',
            'password' => 'password123', // Mot de passe en clair pour test
        ]);
    }
}

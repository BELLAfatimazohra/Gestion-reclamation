<?php 
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PersonnelsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('personnels')->insert([
            'nom' => 'Smith',
            'prenom' => 'Jane',
            'email' => 'jane@example.com',
            'telephone' => '987654321',
            'poste' => 'Manager',
            'password' => 'password123', // Mot de passe en clair pour test
        ]);
    }
}

<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
    /**************
    * UTILISATEURS
    **************/

         User::factory()->create([
             "prenom" => "Wafaa",
             "nom" => "Tama",
            "email" => "wafaa@gmail.com"

        ]);

        // Ajout d'utilisateurs fictifs
        \App\Models\User::factory(9)->create();

    }
}

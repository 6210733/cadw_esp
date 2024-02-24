<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * Définit l'état par défaut du modèle.
     *
     * @return array
     */
    public function definition()
    {
        return [
            // Génère un prénom aléatoire
            'prenom' => $this->faker->firstName(),

            // Génère un nom de famille aléatoire
            'nom' => $this->faker->lastname(),

            // Génère une adresse e-mail unique et sûre (safeEmail)
            'email' => $this->faker->unique()->safeEmail(),

            // Indique que l'e-mail a été vérifié à l'instant actuel
            'email_verified_at' => now(),

            // Définit un mot de passe hashé
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',

            // Génère un jeton de rappel aléatoire (chaîne de 10 caractères)
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indique que l'adresse e-mail du modèle doit être non vérifiée.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}


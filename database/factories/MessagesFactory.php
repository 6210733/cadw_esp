<?php

namespace Database\Factories;

use App\Models\Message;
use Illuminate\Database\Eloquent\Factories\Factory;

class MessagesFactory extends Factory
{
    /**
     * Le nom du modèle correspondant à cette fabrique.
     *
     * @var string
     */
    protected $model = Message::class;

    /**
     * Définit l'état par défaut du modèle.
     *
     * @return array
     */
    public function definition()
    {
        return [
            // Génère une phrase aléatoire pour le champ 'message'
            'message' => $this->faker->sentence,

            // Génère une phrase aléatoire pour le champ 'reponse'
            'reponse' => $this->faker->sentence,

            // Définit l'ID de l'utilisateur comme 1 (à adapter selon vos besoins)
            'user_id' => 1,

            // Définit la date de création comme étant l'instant actuel
            'created_at' => now(),

            // Définit la date de mise à jour comme étant l'instant actuel
            'updated_at' => now(),
        ];
    }
}

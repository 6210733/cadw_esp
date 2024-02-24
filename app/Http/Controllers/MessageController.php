<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Message;

class MessageController extends Controller
{

    /**
     * Cette fonction gère la page d'index des messages de l'utilisateur connecté.
     */
    public function index()
    {
        // Récupère les messages associés à l'utilisateur connecté, triés par ordre chronologique décroissant.
        $messages = Message::where('user_id', auth()->user()->id)->latest()->get();

        // Retourne une vue avec la liste des messages à afficher dans la vue 'messages.index'.
        return view('messages.index', ['messages' => $messages]);
    }


    /**
     * Affiche le formulaire de création d'un nouveau message.
     */
    public function create()
    {
        // Retourne une vue contenant le formulaire de création de message.
        return view('messages.create');
    }

    /**
     * Traite la soumission du formulaire de création de message et sauvegarde le message en base de données.
     *
     * @param  Request  $request  Les données soumises via le formulaire.
     * @return Redirige vers la page d'index des messages avec un message de succès.
     */
    public function store(Request $request)
    {
        /**
         *  Valider la question
         */
        $valides = $request->validate([
            "question" => "required"
        ], [
            "question.required" => "Posez votre question à LaraGPT"
        ]);

        /**
         *  Récupérer la question depuis la requête
         */
        $question = $request->input('question');

        /**
         *  Créer un nouvel objet de type Message
         */
        $message = new Message();
        $message->message = $question;

        /**
         *  Récupérer le chemin complet vers le fichier JSON
         */
        $filePath = storage_path('app/data/phrases.json');

        /**
         *  Vérifier si le fichier JSON existe
         */
        if (file_exists($filePath)) {

            /**
             *  Charger le contenu du fichier JSON
             */
            $phrases = json_decode(file_get_contents($filePath), true);

            /**
             *  Initialiser la réponse par défaut
             */
            $reponseTexte = "Je ne sais pas quoi répondre...";
            $reponseLien = '';

            /**
             *  Chercher la réponse appropriée dans les phrases-clés
             */
            foreach ($phrases as $keyword => $phrase) {
                if (mb_stripos($question, $keyword) !== false) {
                    $reponseTexte = $phrase;
                    break;
                }
            }

            /**
             *  Remplacer les placeholders dans la réponse
             */
            $reponseTexte = str_replace('[nom]', auth()->user()->nom, $reponseTexte);
            $reponseTexte = str_replace('[heure]', now()->format('H:i'), $reponseTexte);

            /**
             *  Si la réponse est la réponse par défaut "Je ne sais pas quoi répondre..."
             *  Créer un lien vers une recherche Google avec la question posée
             */
            if ($reponseTexte === "Je ne sais pas quoi répondre...") {
                $googleSearchLink = "https://www.google.com/search?q=" . urlencode($question);
                $reponseLien = '<a href="' . $googleSearchLink . '" target="_blank">' . $reponseTexte . '</a>';
            }

            /**
             *  Sauvegarder la réponse et l'utilisateur dans l'objet Message
             */
            $message->reponse = $reponseLien ?: $reponseTexte; // Utilise le lien si disponible, sinon utilise le texte
            $message->user_id = auth()->user()->id;

            /**
             *  Sauvegarder l'objet Message dans la base de données
             */
            $message->save();

            /**
             *  Redirection avec message de succès
             */
            return redirect()
                ->route('messages.index')
                ->with('success', 'Message envoyé avec succès !');
        }
    }
}

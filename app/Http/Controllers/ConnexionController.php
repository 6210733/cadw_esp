<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ConnexionController extends Controller
{
    // Affiche le formulaire de connexion
    public function create()
    {
        return view('auth.connexion.create');
    }

    // Authentifie l'utilisateur
    public function authentifier(Request $request)
    {
        // Valider les données du formulaire
        $valides = $request->validate([
            "email" => "required|email",
            "password" => "required"
        ], [
            "email.required" => "Le courriel est obligatoire",
            "email.email" => "Le courriel doit avoir un format valide",
            "password.required" => "Le mot de passe est requis"
        ]);

        // Tentative d'authentification
        if (Auth::attempt($valides)) {
            $request->session()->regenerate();
            // Rediriger vers la page prévue après connexion avec un message de succès
            return redirect()
                ->intended(route('messages.index'))
                ->with('succes', 'Vous êtes connectés!');
        }

        // En cas d'échec d'authentification, rediriger avec des erreurs et le champ email pré-rempli
        return back()
            ->withErrors([
                "email" => "Les informations fournies ne sont pas valides"
            ])
            ->onlyInput('email');
    }

    // Déconnecte l'utilisateur
    public function deconnecter(Request $request) {
        Auth::logout();

        // Invalider la session et régénérer le jeton CSRF
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Rediriger vers la page d'accueil avec un message de succès
        return redirect()
                ->route('accueil')
                ->with('succes', "Vous êtes déconnectés!");

    }
}

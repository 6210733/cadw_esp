<x-layout titre="Connexion">

    <main class="background-main">

        <div class="connexion">

            <h2>
                Connectez vous pour parler avec LaraGPT
            </h2>

            @if (session('email'))
                <p>{{ session('email') }}</p>
            @endif


            <form action="{{ route('connexion.authentifier') }}" method="POST" style="max-width:500px;margin:auto">
                @csrf

                <x-forms.erreur champ="email" />

                <div class="input-container">

                    <label for="email"></label>

                    <i class="fa fa-envelope icon"></i>

                    <input class="input-field" name="email" type="email" placeholder="Courriel" autocomplete="email"
                        value="{{ old('email') }}">

                </div>

                <x-forms.erreur champ="password" />

                <div class="input-container">

                    <label for="password"></label>

                    <i class="fa fa-key icon"></i>

                    <input class="input-field" name="password" type="password" placeholder="Mot de passe"
                        autocomplete="current-password">
                </div>

                <button type="submit" class="btn">
                    Envoyer
                </button>

                <x-alertes.succes cle="succes" />

            </form>

            <a class="membre" href="{{ route('enregistrement.create') }}">
                Pas un membre?
            </a>

        </div>

    </main>

</x-layout>

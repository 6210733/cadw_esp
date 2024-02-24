<x-layout titre="Enregistrement">

    <main class="background-main">

        <div class="connexion connexion-enregistrement">

            <h2>
                Inscrivez-vous
            </h2>

            <div>

                <form action="{{ route('enregistrement.store') }}" method="POST" enctype="multipart/form-data"
                    style="max-width:500px;margin:auto">
                    @csrf

                    <x-forms.erreur champ="prenom" />

                    <div class="input-container">

                        <label for="prenom"></label>
                        <input class="input-field" name="prenom" type="text" placeholder="Prénom"
                            autocomplete="given-name" autofocus value="{{ old('prenom') }}">

                    </div>

                    <x-forms.erreur champ="nom" />

                    <div class="input-container">

                        <label for="nom"></label>
                        <input class="input-field" name="nom" type="text" value="{{ old('nom') }}"
                            placeholder="Nom" autocomplete="family-name">

                    </div>

                    <x-forms.erreur champ="email" />

                    <div class="input-container">

                        <label for="email" placeholder="Courriel"></label>
                        <input class="input-field" name="email" type="email" value="{{ old('email') }}"
                            placeholder="Courriel" autocomplete="email">

                    </div>

                    <x-forms.erreur champ="password" />

                    <div class="input-container">

                        <label for="password"></label>

                        <input class="input-field" name="password" type="password" placeholder="Mot de passe"
                            autocomplete="current-password">

                    </div>

                    <x-forms.erreur champ="confirmation_password" />

                    <div class="input-container">

                        <label for="confirm-password"></label>

                        <input class="input-field" name="confirmation_password" type="password" placeholder="Confirmation de mot de passe" autocomplete="current-password">

                    </div>

                    <x-forms.erreur champ="avatar" />

                    <div class="input-container">

                        <label for="avatar">
                        </label>
                        <input class="input-field"name="avatar" type="file">

                    </div>

                    <button type="submit" class="btn">
                        Créez votre compte!
                    </button>

                </form>

                <p>
                    <a class="membre" href="{{ route('connexion.create') }}">
                        Déjà un membre?
                    </a>
                </p>

            </div>

        </div>

    </main>

</x-layout>

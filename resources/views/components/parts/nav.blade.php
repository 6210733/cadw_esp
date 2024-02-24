<header>
    <nav>
        <ul class="nav">
            <li>
                <a href="{{ route('accueil') }}" class="nav-lien">Accueil</a>
            </li>
            <li>
                <a href="{{ route('connexion.create') }}" class="nav-lien">Se connecter</a>
            </li>
            <li>
                <a href="{{ route('enregistrement.create') }}" class="nav-lien">Créer votre compte</a>
            </li>
            <li>
                <form action="{{ route('deconnexion') }}" method="post">
                    @csrf
                    <button type="submit" class="nav-lien">Déconnexion</button>
                </form>
            </li>
        </ul>
    </nav>
</header>

<x-layout titre="LaraGPT">

    <main class="background-main">

        <x-alertes.succes cle="succes" />

        <div class="accueil">

            <div class="contenu">

                <h1 class="bienvenue">Bienvenue sur
                    LaraGPT
                </h1>

                <h2>
                    <a href="{{ route('connexion.create') }}" class="connecter">
                        Connectez-vous et dites bonjour à LaraGPT
                    </a>
                </h2>

                <p>
                    Le chatbot qui répond à toutes vos questions !
                </p>

            </div>

            <section class="comment">

                <h2>
                    Comment ça marche ?
                </h2>

                <p>
                    Il suffit de poser une question et LaraGPT vous répondra instantanément :
                </p>

                <div class="chat-conteneur">

                    <div class="message user-message">

                        <img src="{{ asset('storage/uploads/avatar-wafaa.jpg') }}" alt="Votre Avatar">

                        <p>
                            Quel temps fera-t-il demain ?
                        </p>

                    </div>

                    <div class="message lara-message">

                        <img src="{{ asset('storage/uploads/laragpt.jpg') }}" alt="Avatar de LaraGPT">

                        <p>
                            Bien sûr ! Demain, le temps sera ensoleillé avec des températures allant
                            jusqu'à 25°C.
                        </p>

                    </div>
                </div>

            </section>

        </div>

    </main>

</x-layout>

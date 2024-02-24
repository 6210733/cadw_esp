<x-layout titre="LaraGPT">

    <x-alertes.succes cle="succes" />

    <div class="contenu">

        <div class="question">
            <h1>
                Parlez avec LaraGPT
            </h1>

            <form action="{{ route('messages.store') }}" method="post">
                @csrf
                <x-forms.erreur champ="question" />

                <div class="textarea-container">

                    <textarea name="question" placeholder="Posez votre question ici"></textarea>

                    <button class="parler" type="submit">
                        Envoyer
                    </button>
                </div>

            </form>
        </div>

        <div class="conversation">

            @foreach ($messages as $message)

                <div class="message {{ $message->user->id === auth()->user()->id ? 'user' : 'other' }}">

                    <div class="avatar">

                        @if ($message->user->avatar)
                            <img src="{{ $message->user->avatar }}" alt="Avatar de {{ $message->user->nom }}" class="avatar-img1">
                        @else

                            <?php
                            $defaultAvatarUrl = 'https://i.pravatar.cc/?u=' . $message->user->email;
                            ?>

                            <img src="{{ $defaultAvatarUrl }}" alt="Avatar par défaut" class="avatar-img1">

                        @endif

                    </div>

                    <div class="message-contenu">

                        <div class="user-info">

                            <span class="timestamp">
                                [{{ $message->created_at->locale('fr')->diffForHumans() }}]
                            </span>

                            <strong>
                                :{{ $message->user->nom }} {{ $message->user->prenom }}
                            </strong>

                        </div>

                        <div class="message-text" style="flex-direction: row-reverse;">
                            {{ $message->message }}
                        </div>

                    </div>

                </div>

                @if ($message->reponse)

                    <div class="message-lara">

                        <div class="avatar">
                            <img src="{{ asset('storage/uploads/avatar-wafaa.jpg') }}" alt="Avatar de LaraGPT" class="avatar-img">
                        </div>

                        <div class="message-contenu">

                            <div class="reponse-contenu">

                                <strong>
                                    LaraGPT:
                                </strong>

                                <span class="timestamp">
                                    [{{ $message->created_at->locale('fr')->diffForHumans() }}]
                                </span>

                            </div>

                            <div class="reponse-contenu">
                                {!! $message->reponse !!}
                            </div>

                        </div>

                    </div>

                @endif


            @endforeach

        </div>

        <form action="{{ route('deconnexion') }}" method="post" class="formulaire-deconnexion">
            @csrf
            <button type="submit" class="bouton-deconnexion">Déconnexion</button>
        </form>

    </div>

</x-layout>

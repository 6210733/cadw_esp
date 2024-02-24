@props(['champ'])

@error($champ)
    <p class="msg-erreur">{{ $message }}</p>
@enderror

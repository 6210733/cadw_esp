@props(["cle"])

@if (session($cle))
<p @class([

    "msg-succes" => $cle == "succes",
    "msg-erreur" => $cle == "erreur"
])>
    {{ session($cle) }}
</p>
@endif

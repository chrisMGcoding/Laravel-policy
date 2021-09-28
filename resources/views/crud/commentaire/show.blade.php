@extends('template.back')

@section('content')

<div class="container">

    <p>ID : {{ ($commentaire->id) }}</p>
    <p>prenom : {{ ($commentaire->prenom) }}</p>
    <p>nom : {{ ($commentaire->nom) }}</p>
    <p>commentaire : {{ ($commentaire->commentaire) }}</p>

</div>

@endsection
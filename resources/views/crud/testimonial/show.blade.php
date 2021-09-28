@extends('template.back')

@section('content')

<div class="container">

    <p>ID : {{ ($testimonial->id) }}</p>
    <p>nom : {{ ($testimonial->nom) }}</p>
    <p>poste : {{ ($testimonial->poste) }}</p>
    <p>url : {{ ($testimonial->url) }}</p>
    <p>commentaire : {{ ($testimonial->commentaire) }}</p>

</div>

@endsection
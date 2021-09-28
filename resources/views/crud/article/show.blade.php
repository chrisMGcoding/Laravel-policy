@extends('template.back')

@section('content')

<div class="container">

    <p>ID : {{ ($article->id) }}</p>
    <p>titre : {{ ($article->titre) }}</p>
    <p>url : {{ ($article->url) }}</p>
    <p>description : {{ ($article->description) }}</p>

</div>

@endsection
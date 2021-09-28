@extends('template.back')

@section('content')

<div class="container">

    <h1 class="text-center my-3">Créer Témoignage</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('testimonials.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    
        <div class="mb-3">
            <label class="form-label">nom :</label>
            <input type="text" class="form-control" type="text" name="nom" value="{{ old('nom') }}">
        </div>
        <div class="mb-3">
            <label class="form-label">poste :</label>
            <input type="text" class="form-control" type="text" name="poste" value="{{ old('poste') }}">
        </div>
        <div class="mb-3">
            <label class="form-label">URL :</label>
            <input class="form-control" type="file" name="url">
        </div>
        <div class="mb-3">
            <label class="form-label">commentaire :</label>
            <input type="text" class="form-control" type="text" name="commentaire" value="{{ old('commentaire') }}">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>

      </form>

</div>

@endsection
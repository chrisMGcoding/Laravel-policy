@extends('template.back')

@section('content')

<div class="container">

    <h1 class="text-center my-3">Créer Article</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('articles.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    
        <div class="mb-3">
            <label class="form-label">Titre :</label>
            <input type="text" class="form-control" type="text" name="titre" value="{{ old('titre') }}">
        </div>
        <div class="mb-3">
            <label class="form-label">URL :</label>
            <input class="form-control" type="file" name="url">
        </div>
        <div class="mb-3">
            <label class="form-label">Description :</label>
            <input type="text" class="form-control" type="text" name="description" value="{{ old('description') }}">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>

      </form>

</div>

@endsection
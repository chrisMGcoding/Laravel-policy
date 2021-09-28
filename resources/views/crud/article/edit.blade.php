@extends('template.back')

@section('content')

<div class="container">

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('articles.update', $article->id)}}" method="post" enctype="multipart/form-data">
    @csrf
    @method("PUT")

    <div class="mb-3">
        <label class="form-label">Titre :</label>
        <input type="text" class="form-control" type="text" name="titre" value="{{ $article->titre }}">
    </div>
    <div class="mb-3">
        <label class="form-label">URL :</label>
        <input class="form-control" type="file" name="url">
    </div>
    <div class="mb-3">
        <label class="form-label">Description :</label>
        <input type="text" class="form-control" type="text" name="description" value="{{ $article->description }}">
    </div>


    <button class="mt-2 mb-2" type="submit">Update</button>

    </form>

</div>

@endsection
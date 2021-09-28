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

    <form action="{{ route('commentaires.update', $commentaire->id)}}" method="post">
    @csrf
    @method("PUT")

    <div class="mb-3">
        <label class="form-label">prenom :</label>
        <input type="text" class="form-control" type="text" name="prenom" value="{{ $commentaire->prenom }}">
    </div>
    <div class="mb-3">
        <label class="form-label">nom :</label>
        <input type="text" class="form-control" type="text" name="nom" value="{{ $commentaire->nom }}">
    </div>
    <div class="mb-3">
        <label class="form-label">commentaire :</label>
        <input type="text" class="form-control" type="text" name="commentaire" value="{{ $commentaire->commentaire }}">
    </div>


    <button class="mt-2 mb-2" type="submit">Update</button>

    </form>

</div>

@endsection
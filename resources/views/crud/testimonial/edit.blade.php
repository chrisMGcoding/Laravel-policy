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

    <form action="{{ route('testimonials.update', $testimonial->id)}}" method="post" enctype="multipart/form-data">
    @csrf
    @method("PUT")

    <div class="mb-3">
        <label class="form-label">nom :</label>
        <input type="text" class="form-control" type="text" name="nom" value="{{ $testimonial->nom }}">
    </div>
    <div class="mb-3">
        <label class="form-label">poste :</label>
        <input type="text" class="form-control" type="text" name="poste" value="{{ $testimonial->poste }}">
    </div>
    <div class="mb-3">
        <label class="form-label">URL :</label>
        <input class="form-control" type="file" name="url">
    </div>
    <div class="mb-3">
        <label class="form-label">commentaire :</label>
        <input type="text" class="form-control" type="text" name="commentaire" value="{{ $testimonial->commentaire }}">
    </div>


    <button class="mt-2 mb-2" type="submit">Update</button>

    </form>

</div>

@endsection
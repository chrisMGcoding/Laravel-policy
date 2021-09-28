@extends('dashboard')

@section('content')

<div class="container">
    <div class="container d-flex justify-content-center">

        <h1>Commentaire</h1>
        <button class="m-2 rounded bg-primary">
            <a href="{{ route('commentaires.create') }}"><p class="text-dark text-decoration-none">Ajouter</p></a>
        </button>
    
    </div>
    
    <div class="container">
    
        <table class="table">
    
            <thead >
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">prénom</th>
                    <th scope="col">nom</th>
                    <th scope="col">commentaire</th>
                </tr>
            </thead>
    
            <tbody>
    
            @if(session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
            @endif
    
            @foreach($commentaire as $item)
    
                <tr>
                    <th scope="row">{{ ($item->id) }}</th>
                    <td>{{ ($item->prenom) }}</td>
                    <td>{{ ($item->nom) }}</td>
                    <td>{{ ($item->commentaire) }}</td>
                    <td>
                        <div class="d-flex">
                            <form action="{{ route('commentaires.destroy', $item->id) }}" method="post">
                                @method('DELETE')
                                @csrf
                                <button class="rounded m-3 bg-danger" type="submit">Delete</button>
                            </form>
    
                            <button class="rounded m-3 bg-warning"><a class="text-decoration-none text-dark" href="{{ route('commentaires.show', $item->id)}}">Show</a></button>
    
                            <button class="rounded m-3 bg-success"><a class="text-decoration-none text-dark" href="{{ route('commentaires.edit', $item->id)}}">Update</a></button>
                        </div>
                    </td>
                </tr>
    
            @endforeach
    
            </tbody>
    
        </table>
    
        </div>
</div>

@endsection
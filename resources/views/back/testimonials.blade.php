@extends('dashboard')

@section('content')

<div class="container">
    <div class="container d-flex justify-content-center">

        <h1>Témoignage  </h1>
        <button class="m-2 rounded bg-primary">
            <a href="{{ route('testimonials.create') }}"><p class="text-dark text-decoration-none">Ajouter</p></a>
        </button>
    
    </div>
    
    <div class="container">
    
        <table class="table">
    
            <thead >
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">nom</th>
                    <th scope="col">poste</th>
                    <th scope="col">url</th>
                    <th scope="col">commentaire</th>
                </tr>
            </thead>
    
            <tbody>
    
            @if(session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
            @endif
    
            @foreach($testimonial as $item)
    
                <tr>
                    <th scope="row">{{ ($item->id) }}</th>
                    <td>{{ ($item->nom) }}</td>
                    <td>{{ ($item->poste) }}</td>
                    <td>{{ ($item->url) }}</td>
                    <td>{{ ($item->commentaire) }}</td>
                    <td>
                        <div class="d-flex">
                            <form action="{{ route('testimonials.destroy', $item->id) }}" method="post">
                                @method('DELETE')
                                @csrf
                                <button class="rounded m-3 bg-danger" type="submit">Delete</button>
                            </form>
    
                            <button class="rounded m-3 bg-warning"><a class="text-decoration-none text-dark" href="{{ route('testimonials.show', $item->id)}}">Show</a></button>
    
                            <button class="rounded m-3 bg-success"><a class="text-decoration-none text-dark" href="{{ route('testimonials.edit', $item->id)}}">Update</a></button>
                        </div>
                    </td>
                </tr>
    
            @endforeach
    
            </tbody>
    
        </table>
    
        </div>
</div>

@endsection
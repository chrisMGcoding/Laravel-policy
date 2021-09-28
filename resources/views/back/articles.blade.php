@extends('dashboard')

@section('content')

    <div class="container">
        <div class="container d-flex justify-content-center">

            <h1>Articles</h1>
            <button class="m-2 rounded bg-primary">
                <a href="{{ route('articles.create') }}"><p class="text-dark text-decoration-none">Ajouter</p></a>
            </button>
        
        </div>
        
        <div class="container">
        
            <table class="table">
        
                <thead >
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">titre</th>
                        <th scope="col">url</th>
                        <th scope="col">description</th>
                    </tr>
                </thead>
        
                <tbody>
        
                @if(session()->has('message'))
                    <div class="alert alert-success">
                        {{ session()->get('message') }}
                    </div>
                @endif
        
                @foreach($article as $item)
        
                    <tr>
                        <th scope="row">{{ ($item->id) }}</th>
                        <td>{{ ($item->titre) }}</td>
                        <td>{{ ($item->url) }}</td>
                        <td>{{ ($item->description) }}</td>
                        <td>
                            <div class="d-flex">
                                <form action="{{ route('articles.destroy', $item->id) }}" method="post">
                                    @method('DELETE')
                                    @csrf
                                    <button class="rounded m-3 bg-danger" type="submit">Delete</button>
                                </form>
        
                                <button class="rounded m-3 bg-warning"><a class="text-decoration-none text-dark" href="{{ route('articles.show', $item->id)}}">Show</a></button>
        
                                <button class="rounded m-3 bg-success"><a class="text-decoration-none text-dark" href="{{ route('articles.edit', $item->id)}}">Update</a></button>
                            </div>
                        </td>
                    </tr>
        
                @endforeach
        
                </tbody>
        
            </table>
        
            </div>
    </div>

@endsection
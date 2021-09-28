<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $article = Article::all();
        return view('back.articles', compact('article'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('crud.article.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'titre' => ['required'],
            'url' => ['required'],
            'description' => ['required'],
        ]);

        $table = new Article;

        $table -> titre = $request -> titre;
        $table -> url = $request -> file("url") -> hashName();
        $table -> description = $request -> description;

        $table -> save();

        $request -> file("url") -> storePublicly("image", "public");

        return redirect() -> route('articles.index') -> with('message', 'Article créé !');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        return view('crud.article.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        return view('crud.article.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        $request->validate([
            'titre' => ['required'],
            'url' => ['required'],
            'description' => ['required'],
        ]);

        Storage::disk("public") -> delete("image/" . $article->url);

        $article -> titre = $request -> titre;
        $article -> url = $request -> file("url") -> hashName();
        $article -> description = $request -> description;

        $article -> save();

        $request -> file("url") -> storePublicly("image", "public");

        return redirect() -> route('articles.index') -> with('message', 'Article modifié ! !');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        Storage::disk('public') -> delete('image/' . $article->url);

        $article -> delete();

        return redirect() -> route('articles.index') -> with('message', 'Article supprimé !');
    }
}

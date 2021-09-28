<?php

namespace App\Http\Controllers;

use App\Models\Commentaire;
use Illuminate\Http\Request;

class CommentaireController extends Controller
{
    public function __construct() {
        $this -> middleware('admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $commentaire = Commentaire::all();
        return view('back.commentaires', compact('commentaire'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('crud.commentaire.create');
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
            'prenom' => ['required'],
            'nom' => ['required'],
            'commentaire' => ['required']
        ]);

        $table = new Commentaire;

        $table -> prenom = $request -> prenom;
        $table -> nom = $request -> nom;
        $table -> commentaire = $request -> commentaire;

        $table -> save();

        return redirect() -> route('commentaires.index') -> with('message', 'Commentaire créé !');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Commentaire  $commentaire
     * @return \Illuminate\Http\Response
     */
    public function show(Commentaire $commentaire)
    {
        return view('crud.commentaire.show', compact('commentaire'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Commentaire  $commentaire
     * @return \Illuminate\Http\Response
     */
    public function edit(Commentaire $commentaire)
    {
        return view('crud.commentaire.edit', compact('commentaire'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Commentaire  $commentaire
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Commentaire $commentaire)
    {
        $request->validate([
            'prenom' => ['required'],
            'nom' => ['required'],
            'commentaire' => ['required'],
        ]);

        $commentaire -> prenom = $request -> prenom;
        $commentaire -> nom = $request -> nom;
        $commentaire -> commentaire = $request -> commentaire;

        $commentaire -> save();

        return redirect() -> route('commentaires.index') -> with('message', 'Commentaire modifié !');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Commentaire  $commentaire
     * @return \Illuminate\Http\Response
     */
    public function destroy(Commentaire $commentaire)
    {
        $commentaire -> delete();

        return redirect() -> route('commentaires.index') -> with('message', 'Commentaire supprimé !');
    }
}

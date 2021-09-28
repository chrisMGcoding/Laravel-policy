<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $testimonial = Testimonial::all();
        return view('back.testimonials', compact('testimonial'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('crud.testimonial.create');
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
                'nom' => ['required'],
                'poste' => ['required'],
                'url' => ['required'],
                'commentaire' => ['required'],
        ]);

        $table = new Testimonial;

        $table -> nom = $request -> nom;
        $table -> poste = $request -> poste;
        $table -> url = $request -> file('url') -> hashName();
        $table -> commentaire = $request -> commentaire;

        $table -> save();
        
        $request -> file("url") -> storePublicly("image", "public");

        return redirect() -> route('testimonials.index') -> with('message', 'Témoignage créé !');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function show(Testimonial $testimonial)
    {
        return view('crud.testimonial.show', compact('testimonial'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function edit(Testimonial $testimonial)
    {
        return view('crud.testimonial.edit', compact('testimonial'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Testimonial $testimonial)
    {
        $request->validate([
                'nom' => ['required'],
                'poste' => ['required'],
                'url' => ['required'],
                'commentaire' => ['required'],
        ]);

        Storage::disk("public") -> delete("image/" . $testimonial->url);

        $testimonial -> nom = $request -> nom;
        $testimonial -> poste = $request -> poste;
        $testimonial -> url = $request -> file('url') -> hashName();
        $testimonial -> commentaire = $request -> commentaire;

        $testimonial -> save();
        
        $request -> file("url") -> storePublicly("image", "public");

        return redirect() -> route('testimonials.index') -> with('message', 'Témoignage modifié !');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function destroy(Testimonial $testimonial)
    {
        Storage::disk("public") -> delete("image/" . $testimonial->url);

        $testimonial -> delete();

        return redirect() -> route('testimonials.index') -> with('message', 'Témoignage supprimé !');
    }
}

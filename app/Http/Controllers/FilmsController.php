<?php

namespace App\Http\Controllers;

use App\Film;
use App\Comment;
use Illuminate\Http\Request;
use PragmaRX\Countries\Package\Countries;
use Illuminate\Support\Facades\Storage;

class FilmsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // Middleware only applied to these methods
        $this->middleware('auth', ['only' => [
            'create', 'store' // Could add bunch of more methods too
        ]]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $films = Film::paginate(1);

        return view('films', ['films' => $films]);
    }

    /**
     * Display a item of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function view($slug)
    {
        $film = Film::where('slug', $slug)->firstOrFail();

        return view('film.view', ['film' => $film]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = Countries::all()->pluck('name.common');
        return view('film.create', ['countries' => $countries]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|max:255',
            'slug' => 'required|unique:films|max:255',
            'description' => 'required',
            'release_date' => 'required|date_format:"Y-m-d H:i:s"',
            'rating' => 'required|numeric|between:1,5',
            'ticket_price' => 'required|numeric',
            'country' => 'required',
            'genre' => 'required',
            'photo' => 'required|file|image|mimes:jpeg,jpg,png,gif,svg,webp'
        ]);

        // upload photo
        $photo = $request->file('photo');
        $photo_name = time() . '.' . $photo->getClientOriginalExtension();
        $upload_path = public_path('/photos');
        $photo->move($upload_path, $photo_name);

        $data['photo'] = asset('photos/' . $photo_name);

        // create film
        $film = tap(new Film($data))->save();

        return view('film.view', ['film' => $film, 'film_created' => true]);
    }

    /**
     * Store a newly created comment in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function comment(Request $request, $slug)
    {
        $data = $request->validate([
            'name' => 'required|max:255',
            'comment' => 'required',
        ]);

        $film = Film::where('slug', $slug)->firstOrFail();

        $data['film_id'] = $film->id;

        // create comment
        $comment = tap(new Comment($data))->save();

        return view('film.view', ['film' => $film, 'comment_created' => true]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Film  $film
     * @return \Illuminate\Http\Response
     */
    public function show(Film $film)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Film  $film
     * @return \Illuminate\Http\Response
     */
    public function edit(Film $film)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Film  $film
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Film $film)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Film  $film
     * @return \Illuminate\Http\Response
     */
    public function destroy(Film $film)
    {
        //
    }
}

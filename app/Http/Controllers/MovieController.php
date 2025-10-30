<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Http\Requests\StoreMovieRequest;
use App\Http\Requests\UpdateMovieRequest;
use App\Mail\WelcomeMail;
use App\Models\Artist;
use App\Models\Genre;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

use function PHPUnit\Framework\isNull;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        //$movies = Movie::all();
        $movies = Movie::with(['genres' ,'artists'])->paginate(5);



        return view('movies',['movies' => $movies]);
    }

    /**
     * Show the form for creating a new resource.
     */
public function create()
    {

        $this->authorize('create',Movie::class);//policy


       // $genres = Genre::all();
       // $artists = Artist::all();
        $genres = Genre::with('movies')->get();
        $artists = Artist::with('movies')->get();



        return view('post-movie' , ['genres'=>$genres , 'artists'=>$artists]);
    }

    /**
     * Store a newly created resource in storage.
     */
//    public function store(StoreMovieRequest $request)
    public function store()
    {

        $this->authorize('create',Movie::class);//policy
        //dd(request()->title);

        //



        $movieAttributes = request()->validate([
            'title'=>['required'],
            'description'=>['required'],
//            'genre'=>['required'],
            'poster'=>['required'],
            'title'=>['required'],
            'trailer_link'=>['required'],
            'download_link'=>['required'],

        ]);

         $posterPath = request()->file('poster')->store('posters','public');
         $movieAttributes['poster'] = $posterPath;




         $moviePath = request()->file('download_link')->store('movies' ,'public');
         $movieAttributes['download_link'] = $moviePath;

      $movie = Movie::create($movieAttributes);


      $movie->genres()->attach(request()->genres);
      $movie->artists()->attach(request()->artists);



        return redirect('/movies');
    }

    /**
     * Display the specified resource.
     */
    public function show(Movie $movie)
    {


        return view('movie-page' , ['movie' => $movie]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Movie $movie)
    {

        $this->authorize('update',$movie);//policy

        // if (!Gate::allows('admin')) {
        //     abort(403);
        // }
        
        // $genres = Genre::all();
        // $artists = Artist::all();





        $genres = Genre::with('movies')->get();
        $artists = Artist::with('movies')->get();


        return view('edit-movie',['movie'=>$movie , 'genres'=>$genres ,'artists'=>$artists]);
    }

    /**
     * Update the specified resource in storage.
     */
//    public function update(UpdateMovieRequest $request, Movie $movie)
    public function update(Movie $movie)
    {

        $this->authorize('update',$movie);//policy


       if (request()->hasFile('poster')) {
        $posterPath = request()->file('poster')->store('posters','public');
       }

       if (request()->hasFile('download_link')) {
        $moviePath = request()->file('download_link')->store('movies' ,'public');
       }


       
       $movie->update([
        'title'=>request('title'),
        'description'=>request('description'),
        'trailer_link'=>request('trailer_link'),
        'poster'=>$posterPath ?? $movie->poster,
        'download_link'=>$moviePath ?? $movie->download_link,
       ]);

       $movie->genres()->sync(request()->genres);
       $movie->artists()->sync(request()->artists);

       return redirect('/movies');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Movie $movie)
    {

        $this->authorize('delete',$movie);//policy

        //dd($movie);


        if ($movie->poster) {
            Storage::disk('public')->delete($movie->poster);
        }


        if ($movie->download_link) {
            Storage::disk('public')->delete($movie->download_link);
        }

        $movie->delete();

        return redirect('/movies');
        
    }


    public function download(Movie $movie){


        $filePath = storage_path('app/public/'.$movie->download_link);
        $fileName = basename($movie->title);

        return response()->download($filePath , $fileName);
    }
}

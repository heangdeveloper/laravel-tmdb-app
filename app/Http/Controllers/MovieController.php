<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $popularMovie = Http::withToken('eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiJlZjQwYjRiM2Q2YjdhOGMyMGE5YWZiMTQ3YTk0OTNhOCIsInN1YiI6IjYwNjE4YWJmZTBjYTdmMDAzZTlhNjA4OSIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.Cl7A9OOaw2_yAzz_0YhBAQuFtFTzDvr6a7AoVzejLSw')
        ->get('https://api.themoviedb.org/3/movie/popular')
        ->json()['results'];

        $upcomingMovie = Http::withToken('eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiJlZjQwYjRiM2Q2YjdhOGMyMGE5YWZiMTQ3YTk0OTNhOCIsInN1YiI6IjYwNjE4YWJmZTBjYTdmMDAzZTlhNjA4OSIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.Cl7A9OOaw2_yAzz_0YhBAQuFtFTzDvr6a7AoVzejLSw')
        ->get('https://api.themoviedb.org/3/movie/upcoming')
        ->json()['results'];

        return view('movie.index', [
            'popularMovie' => $popularMovie,
            'upcomingMovie' => $upcomingMovie
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $movie = Http::withToken('eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiJlZjQwYjRiM2Q2YjdhOGMyMGE5YWZiMTQ3YTk0OTNhOCIsInN1YiI6IjYwNjE4YWJmZTBjYTdmMDAzZTlhNjA4OSIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.Cl7A9OOaw2_yAzz_0YhBAQuFtFTzDvr6a7AoVzejLSw')
        ->get('https://api.themoviedb.org/3/movie/' . $id . '?append_to_response=credits,images,videos')
        ->json();

        $movieRecommendations = Http::withToken('eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiJlZjQwYjRiM2Q2YjdhOGMyMGE5YWZiMTQ3YTk0OTNhOCIsInN1YiI6IjYwNjE4YWJmZTBjYTdmMDAzZTlhNjA4OSIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.Cl7A9OOaw2_yAzz_0YhBAQuFtFTzDvr6a7AoVzejLSw')
        ->get('https://api.themoviedb.org/3/movie/' . $id . '/recommendations')
        ->json()['results'];

        dump($movie);
        return view('movie.show', [
            'movie' => $movie,
            'movieRecommendations' => $movieRecommendations
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movie;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $movies = Movie::all();//
        return view('movie.home',compact('movies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('movie.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $this->validate($request,[
        'Title' => 'required',
        'Format'=> 'required',
        'Length'=> 'integer',
        'Year'  => 'integer',
        'Rating'=> 'integer',
      ]);
      //creates a movie record
      $movie = new Movie;
      $movie->user_id = 1;
      $movie->Title = $request->Title;
      $movie->Format = $request->Format;
      $movie->Length = $request->Length;
      $movie->Year = $request->Year;
      $movie->Rating = $request->Rating;
      $movie->save();
      return redirect('movie');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $movie = Movie::find($id);
        return view('movie.show',compact('movie'));
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $movie = Movie::find($id);
        return view('movie.edit',compact('movie'));
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
      $this->validate($request,[
        'Title' => 'required',
        'Format'=> 'required',
        'Length'=> 'integer',
        'Year'  => 'integer',
        'Rating'=> 'integer',
      ]);
      //creates a movie record
      $movie = Movie::find($id);
      $movie->user_id = 1;
      $movie->Title = $request->Title;
      $movie->Format = $request->Format;
      $movie->Length = $request->Length;
      $movie->Year = $request->Year;
      $movie->Rating = $request->Rating;
      $movie->save();
      session()->flash('message','Your changes have been saved');
      return redirect('movie');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $movie = Movie::find($id);
    }
}

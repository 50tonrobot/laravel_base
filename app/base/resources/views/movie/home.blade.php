@extends('layouts.app')

@section('content')

<div class='col-lg-4 col-lg-offset-4'>
@if (!empty($movies))
<h1>My Movies</h1>
<ul class='movies-list list-group'>
@foreach ($movies as $movie)
  <li class='list-group-item editable' data-movie-id='{{ $movie->id }}'>
    <span class='movie-title'>{{$movie->Title}}</span>
    <span class='movie-title'>{{$movie->Year}}</span>
    <span style="float:right" class="glyphicon glyphicon-trash" data-movie-id="{{ $movie->id }}"></span>
    <span style="float:right" class="glyphicon glyphicon-pencil" data-movie-id="{{ $movie->id }}"></span>
  </li>
@endforeach
</ul>
@else
<div>You have no Movies in your collection, yet.</div>
@endif
</div>
@endsection

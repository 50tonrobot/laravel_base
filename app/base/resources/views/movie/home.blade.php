@extends('layouts.app')

@section('content')

<div class='col-lg-4 col-lg-offset-4'>
@if (!empty($movies))
<h1>My Movies</h1>
<ul class='movies-list list-group'>
@foreach ($movies as $movie)
  <li class='list-group-item editable' data-movie-id='{{ $movie->id }}'>
    <a href="/movie/{{$movie->id}}">
      <span class='movie-title'>{{$movie->Title}}</span>
      <span class='movie-title'>({{$movie->Year}})</span>
    </a>
    <a href="/movie/{{$movie->id}}">
      <span style="float:right" class="glyphicon glyphicon-trash"></span>
    </a>
    <a href="/movie/{{$movie->id}}/edit">
      <span style="float:right" class="glyphicon glyphicon-pencil"></span>
    </a>
  </li>
@endforeach
</ul>
@else
<div>You have no Movies in your collection, yet.</div>
@endif
</div>
@endsection

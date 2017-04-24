@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">My Movie Collection</div>
                <div class="panel-body">
                  @if (!empty($movies))
                  <ul class='movies-list list-group'>
                  @foreach ($movies as $movie)
                    <li class='list-group-item editable' data-movie-id='{{ $movie->id }}'>
                      <span class='movie-title'>{{ $movie->Title }}</span>
                      <span class="glyphicon glyphicon-trash" data-movie-id="{{ $movie->id }}"></span>
                    </li>
                  @endforeach
                  </ul>
                  @else
                  <div>You have no Movies in your collection, yet.</div>
                  @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

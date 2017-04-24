@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">My Movie Collection</div>
                  <div class='movie-form form-group well'>
                    <form method='post' action='/dashboard'>
                      <h4>Add Movie</h4>
                      <input name='Title' type='text' class='form-control' placeholder='Title' />
                      <input name='Length' type='number' class='form-control' placeholder='Length' />
                      <input name='Year' type='number' class='form-control' placeholder='Release Year' />
                      <label class="checkbox-inline"><input name="Rating" type='radio' value='1'/>1</label>
                      <label class="checkbox-inline"><input name="Rating" type='radio' value='2'/>2</label>
                      <label class="checkbox-inline"><input name="Rating" type='radio' value='3'/>3</label>
                      <label class="checkbox-inline"><input name="Rating" type='radio' value='4'/>4</label>
                      <label class="checkbox-inline"><input name="Rating" type='radio' value='5'/>5</label>
                      <div>
                        <select>
                          <option>VHS</option>
                          <option>DVD</option>
                          <option>Streaming</option>
                        </select>
                      </div>
                      <div style='clear:both;'></div>
                      {{ csrf_field() }}
                      <button class='btn btn-primary' type='submit'>Save Movie</button>
                    </form>
                  </div>
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

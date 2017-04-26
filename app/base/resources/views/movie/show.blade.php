@extends('layouts.app')

@section('content')
  <div class='well col-sm-6 col-sm-offset-3 col-xs-12 container conatiner-fluid'>
    <h1>{{ $movie->Title }} <a href='/movie' class='btn btn-sm btn-info pull-right'>Back</a></h1>
    <h5 class="movie-title-label">Title</h5>
    <div><label for="Year">Year:&nbsp;</label><span id="Year">{{ $movie->Year }}</span></div>
    <div><label for="Rating">Rating:&nbsp;</label><span id="Rating">{{ $movie->Rating }}</span></div>
    <div><label for="Length">Length:&nbsp;</label><span id="Length">{{ $movie->lengthToString() }}</span></div>
    <div><label for="Format">Format:&nbsp;</label><span id="Format">{{ $movie->Format }}</span></div>
  </div>
@endsection

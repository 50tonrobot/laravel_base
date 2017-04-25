@extends('layouts.app')

@section('content')

<div class='col-lg-4 col-lg-offset-4'>
  @if(session()->has('message'))
    <div class='well'>{{ session()->get('message') }}</div>
  @endif
@if (!empty($movies))
<h1>My Movies</h1>
<ul class='movies-list list-group'>
@foreach ($movies as $movie)
  <li class='list-group-item editable' data-movie-id='{{ $movie->id }}'>
    <a href="/movie/{{$movie->id}}">
      <span class='movie-title'>{{$movie->Title}}</span>
      <span class='movie-title'>({{$movie->Year}})</span>
    </a>
    <span id='boom' style="float:right" class="glyphicon glyphicon-trash" data-movie-id="{{$movie->id}}"></span>
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
@section('content')
<script type='text/javascript'>
$('span.glyphicon-trash').on('click',function(){
  console.log($(this).data('movie-id'));
});
</script>
@endsection

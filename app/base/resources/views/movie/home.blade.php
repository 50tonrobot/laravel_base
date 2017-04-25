@extends('layouts.app')

@section('content')

<div class='col-lg-4 col-lg-offset-4'>
  @if(session()->has('message'))
    <div class='well'>{{ session()->get('message') }}</div>
  @endif
@if (!empty($movies))
<h1>My Movies <a href='/movie/create' class='btn btn-sm btn-info pull-right'>Add Movie</a></h1>
<ul class='movies-list list-group'>
@foreach ($movies as $movie)
  <li class='list-group-item editable' data-movie-id='{{ $movie->id }}'>
    <a href="/movie/{{$movie->id}}">
      <span class='movie-title'>{{$movie->Title}}</span>
      <span class='movie-title'>({{$movie->Year}})</span>
    </a>
    <span class="glyphicon glyphicon-trash pull-right" data-movie-id="{{$movie->id}}" onclick="this.submit();"></span>
    <a href="/movie/{{$movie->id}}/edit">
      <span class="glyphicon glyphicon-pencil pull-right"></span>
    </a>
  </li>
@endforeach
</ul>
@else
<div>You have no Movies in your collection, yet.</div>
@endif
</div>
<form id="delete_form" method="post">
  {{ method_field('delete') }}
  {{ csrf_field() }}
</form>
@endsection
@section('pageJS')
<script>
$('span.glyphicon-trash').on('click',function(){
  $("#delete_form").attr("action", "/movie/" + $(this).data('movie-id'));
  $("#delete_form").submit();
});
</script>
@endsection

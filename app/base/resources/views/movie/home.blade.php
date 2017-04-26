@extends('layouts.app')

@section('content')
<div class='well col-sm-10 col-sm-offset-1 col-xs-12 container conatiner-fluid'>
  @if(session()->has('message'))
    <div class='well'>{{ session()->get('message') }}</div>
  @endif
  <h1>My Movies <a href='/movie/create' class='btn btn-sm btn-info pull-right'>Add Movie</a></h1>
@if ($movies->total())
  <div class="table-responsive">
    <table data-toggle="table" class="table">
      <thead>
        <tr>
          <th data-field="Title" data-sortable="true">Title</th>
          <th data-field="Year" data-sortable="true">Year</th>
          <th data-field="Rating" data-sortable="true" class="hidden-xs">Rating</th>
          <th data-field="Length" data-sortable="true" class="hidden-xs hidden-sm">Length</th>
          <th data-field="Format" data-sortable="true" class="hidden-xs hidden-sm">Format</th>
          <th data-sortable="false">Edit</th>
          <th data-sortable="false">Delete</th>
        </tr>
      </thead>
      <tbody>
@foreach ($movies as $movie)
        <tr data-movie-id='{{ $movie->id }}'>
          <td><a href="/movie/{{$movie->id}}"><span class='movie-title'>{{$movie->Title}}</span></a></td>
          <td><span class='movie-title'>{{$movie->Year}}</span></td>
          <td class="hidden-xs"><span class='movie-title'>{{$movie->Rating}}</span></td>
          <td class="hidden-xs hidden-sm"><span class='movie-title'>{{$movie->lengthToString()}}</span></td>
          <td class="hidden-xs hidden-sm"><span class='movie-title'>{{$movie->Format}}</span></td>
          <td><a href="/movie/{{$movie->id}}/edit" class="btn"><span class="glyphicon glyphicon-pencil"></span></a></td>
          <td><span class="glyphicon glyphicon-trash btn" data-movie-id="{{$movie->id}}"></span></td>
        </tr>

@endforeach
      </tbody>
    </table>
  </div>
{!! $movies->links() !!}
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

@extends('layouts.app')

@section('content')
  <div class='well col-sm-10 col-sm-offset-1 col-xs-12 container conatiner-fluid'>
    <h1>{{ $movie->Title }}</h1>
    <div>{{ $movie->Year }}</div>
    <div>{{ $movie->Format }}</div>
    <div>{{ $movie->Length }}</div>
    <div>{{ $movie->Rating }}</div>
    <div>{{ $movie->Format }}</div>
  </div>
@endsection

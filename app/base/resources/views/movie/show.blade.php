@extends('layouts.app')

@section('content')
  <div class='well col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2'>
    <h1>{{ $movie->Title }}</h1>
    <div>{{ $movie->Year }}</div>
    <div>{{ $movie->Format }}</div>
    <div>{{ $movie->Length }}</div>
    <div>{{ $movie->Rating }}</div>
    <div>{{ $movie->Format }}</div>
  </div>
@endsection

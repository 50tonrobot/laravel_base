@extends('layouts.app')

@section('content')
<div class='movie-form form-group well col-lg-4 col-lg-offset-4'>
  <form method='post' action='/movie/@yield("id")'>
    <h1>@yield('mode', 'Add') Movie <a href='/movie' class='btn btn-sm btn-info pull-right'>Back</a></h1>
    {{ csrf_field() }}
    @yield('putMethod','')
    <input name='Title' type='text' class='form-control' placeholder='Title' value='@yield("Title")' />
    <input name='Length' type='number' class='form-control' placeholder='Length' value='@yield("Length")' />
    <input name='Year' type='number' class='form-control' placeholder='Release Year' value='@yield("Year")' />
    <label class="checkbox-inline"><input name="Rating" type='radio' value='1' @yield("Rating1","")/>1</label>
    <label class="checkbox-inline"><input name="Rating" type='radio' value='2' @yield("Rating2","")/>2</label>
    <label class="checkbox-inline"><input name="Rating" type='radio' value='3' @yield("Rating3","")/>3</label>
    <label class="checkbox-inline"><input name="Rating" type='radio' value='4' @yield("Rating4","")/>4</label>
    <label class="checkbox-inline"><input name="Rating" type='radio' value='5' @yield("Rating5","")/>5</label>
    <div>
      <select name='Format'>
        <option value="VHS" @yield("FormatVHS","")>VHS</option>
        <option value="DVD" @yield("FormatDVD","")>DVD</option>
        <option value="Streaming" @yield("FormatStreaming","")>Streaming</option>
      </select>
    </div>
    <div style='clear:both;'></div>
    <button class='btn btn-primary' type='submit'>Save Movie</button>
  </form>
  @include('movie.partials.error')
</div>
@endsection

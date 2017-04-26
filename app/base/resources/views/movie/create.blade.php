@extends('layouts.app')

@section('content')
<div class="col-md-6 col-md-offset-3 col-sm-10 col-sm-offset-1 col-xs-12 container conatiner-fluid">
  <div class='row movie-form form-group well'>
    <form method='post' action='/movie/@yield("id")'>
      <h1>@yield('mode', 'Add') Movie <a href='/movie' class='btn btn-sm btn-info pull-right'>Back</a></h1>
      {{ csrf_field() }}
      @yield('putMethod','')
      <div class='form-group'>
        <label for='Title'>Title</label>
        <input id='Title' name='Title' type='text' class='form-control' value='@yield("Title")' />
      </div>
      <div class='form-group'>
        <label for='Length'>Length</label>
        <input id='Length' name='Length' type='number' class='form-control' value='@yield("Length")' />
      </div>
      <div class='form-group'>
        <label for='Year'>Year</label>
        <input id='Year' name='Year' type='number' class='form-control' value='@yield("Year")' />
      </div>
      <fieldset class="form-group">
        <label>Rating:</label>
        <span class="star-cb-group">
          <input class='rating' type="radio" id="rating-1" name="Rating" value="1" @yield("Rating1","") /><label for="rating-1">1</label>
          <input class='rating' type="radio" id="rating-2" name="Rating" value="2" @yield("Rating2","") /><label for="rating-2">2</label>
          <input class='rating' type="radio" id="rating-3" name="Rating" value="3" @yield("Rating3","") /><label for="rating-3">3</label>
          <input class='rating' type="radio" id="rating-4" name="Rating" value="4" @yield("Rating4","") /><label for="rating-4">4</label>
          <input class='rating' type="radio" id="rating-5" name="Rating" value="5" @yield("Rating5","") /><label for="rating-5">5</label>
        </span>
      </fieldset>
      <div class='form-group'>
        <label>Format:</label>
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
</div>
@endsection

@section('pageJS')
<script>
var logID = 'log',
  log = $('<div id="'+logID+'"></div>');
$('body').append(log);
  $('[type*="radio"]').change(function () {
    var me = $(this);
    log.html(me.attr('value'));
  });
</script>
@endsection

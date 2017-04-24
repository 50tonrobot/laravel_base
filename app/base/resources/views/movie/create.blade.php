@extends('layouts.app')

@section('content')
<div class='movie-form form-group well col-lg-4 col-lg-offset-4'>
  <form method='post' action='/movie'>
    <h4>Add Movie</h4>
    {{ csrf_field() }}
    <input name='Title' type='text' class='form-control' placeholder='Title' />
    <input name='Length' type='number' class='form-control' placeholder='Length' />
    <input name='Year' type='number' class='form-control' placeholder='Release Year' />
    <label class="checkbox-inline"><input name="Rating" type='radio' value='1'/>1</label>
    <label class="checkbox-inline"><input name="Rating" type='radio' value='2'/>2</label>
    <label class="checkbox-inline"><input name="Rating" type='radio' value='3'/>3</label>
    <label class="checkbox-inline"><input name="Rating" type='radio' value='4'/>4</label>
    <label class="checkbox-inline"><input name="Rating" type='radio' value='5'/>5</label>
    <div>
      <select name='Format'>
        <option value="VHS">VHS</option>
        <option value="DVD">DVD</option>
        <option value="Streaming">Streaming</option>
      </select>
    </div>
    <div style='clear:both;'></div>
    <button class='btn btn-primary' type='submit'>Save Movie</button>
  </form>
</div>
@endsection

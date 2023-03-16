@extends('base')

@section('content')
<h1>{{ $subject->name }}</h1>
<form action="/6А/1">
<input type="hidden" name="subj_id" value="{{ $subject->id }}">
@csrf
<table class="table">
  <thead>
    <tr>
      <th scope="col">Учащийся</th>
      <th scope="col">Дата</th>
      <th scope="col">Текущая дата</th>
    </tr>
  </thead>
  <tbody>
    @foreach($students as $child)
    <tr>
      <input type="hidden" name="child_{{ $child->id }}" value="{{ $child->id }}">
      <td>{{ $child->first_name }}</td>
      <td></td>
      <td><input type="text" name="rating_{{ $child->id }}"></td>
    </tr>
    @endforeach
  </tbody>
</table>
<button type="submit">ЗАвершить урок</button>
</form>
@endsection
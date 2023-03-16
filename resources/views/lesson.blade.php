@extends('base')

@section('content')
<h1>{{ $subject->name }}</h1>
<form action="/6А/1" method="post">
<input type="hidden" name="subj_id" value="{{ $subject->id }}">
@csrf
<table class="table">
  <thead>
    <tr>
      <th scope="col">Учащийся</th>
      @foreach ($lessons_dates as $date)
      @if ($date->created_at)
      <th scope="col">{{ $date->created_at->format('d-m-Y') }}</th>
      @endif
      @endforeach
      <th scope="col"><input class="form-control  w-25" type="date" name="date"></th>
    </tr>
  </thead>
  <tbody>
    @foreach($students as $child)
    <tr>
      <input type="hidden" name="child_{{ $child->id }}" value="{{ $child->id }}">
      <td>{{ $child->first_name }}</td>
      @foreach ($lessons_dates as $date)
        @foreach ($lessons as $lesson)
        @if ($child->id === $lesson->student_id and $lesson->created_at == $date->created_at)
        <td>{{ $lesson->rating }}</td>
        @endif
        @endforeach
      @endforeach
      <td><input class="form-control  w-25" type="text" name="child_{{ $child->id }}"></td>
    </tr>
    @endforeach
  </tbody>
</table>
<button type="submit" class="btn btn-success">Завершить урок</button>
</form>
@endsection
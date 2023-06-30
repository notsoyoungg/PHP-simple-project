@extends('base')

@section('content')
<h1>Выбор занятия</h1>
<table class="table">
  <thead>
    <tr>
      <th scope="col">Предмет</th>
      <th scope="col">Преподаватель</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
    @foreach($subjects as $subj)
    <tr>
      <td>{{ $subj->name }}</td>
      <td>{{ $subj->teacher->first_name }} {{ $subj->teacher->surname }}</td>
      <td><a href="/{{ $group_id }}/{{ $subj->id }}">Начать урок</a></td>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection

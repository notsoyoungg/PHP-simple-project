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
        @foreach($subjects as $subject)
            <tr>
                <td>{{ $subject->name }}</td>
                <td>{{ $subject->teacher->first_name }} {{ $subject->teacher->surname }}</td>
                <td><a href="{{ route('start_lesson', ['students_group_id' => request()->route('students_group_id'), 'subject_id' => $subject->id]) }}">Начать урок</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection

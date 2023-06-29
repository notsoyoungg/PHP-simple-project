@extends('base')

@section('content')
<h1>{{ $subject->name }}</h1>
<form action="{{ route('create_lesson', ['class' => $class, 'subject' => $subject->id]) }}" method="post">
    <input type="hidden" name="subj_id" value="{{ $subject->id }}">
    @csrf
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Учащийся</th>
                    @foreach ($lessons_dates as $lesson_date)
                        @if($lesson_date->student->class == $class)
                            <th scope="col">{{ $lesson_date->created_at->format('d-m-Y') }}</th>
                        @endif
                    @endforeach
                <th scope="col"><input class="form-control  w-25" type="date" name="lesson_date"></th>
            </tr>
        </thead>
        <tbody>
            @foreach($students as $student)
                <tr>
                    <input type="hidden" name="{{ $student->id }}" value="{{ $student->id }}">
                    <td>{{ $student->first_name }}</td>
                        @foreach ($grades as $grade)
                            @if ($student->id === $grade->student_id)
                                <td>{{ $grade->rating }}</td>
                            @endif
                        @endforeach
                    <td><input class="form-control  w-25" type="text" name="{{ $student->id }}"></td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <button type="submit" class="btn btn-success">Завершить урок</button>
</form>
@endsection

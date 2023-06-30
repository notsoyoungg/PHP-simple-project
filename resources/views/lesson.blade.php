@extends('base')

@section('content')
<h1>{{ $subject->name }}</h1>
<form action="{{ route('create_lesson', ['class' => $groupId, 'subject' => $subject->id]) }}" method="post">
    <input type="hidden" name="subjId" value="{{ $subject->id }}">
    <input type="hidden" name="groupId" value="{{ $groupId }}">
    @csrf
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Учащийся</th>
                    @foreach ($lessons as $lesson)
                        <th scope="col">{{ $lesson->created_at->format('d-m-Y') }}</th>
                    @endforeach
                <th scope="col">Оценка</th>
            </tr>
        </thead>
        <tbody>
            @foreach($students as $student)
                <tr>
                    <input type="hidden" name="{{ $student->id }}" value="{{ $student->id }}">
                    <td>{{ $student->first_name }}</td>
                        @foreach ($grades as $grade)
                            @if ($student->id === $grade->student_id)
                                <td>{{ $grade->grade }}</td>
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

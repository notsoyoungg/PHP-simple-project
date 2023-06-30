<h1>Привет</h1>
<h1>{{ $grade->student->first_name }}</h1>
<h1>{{ $grade->grade }}</h1>
<h1>{{ $grade->lesson->subject->name }}</h1>
<h1>{{ $grade->created_at->format('d-m-Y') }}</h1>



@extends('layouts.app')

@section('content')
<h1>Recent Questions</h1>
@foreach ($questions as $question)
    <div>
        <a href="{{ route('questions.show', $question) }}">{{ $question->title }}</a>
        <p>{{ $question->answers_count }} Answers</p>
    </div>
@endforeach

{{ $questions->links() }}
@endsection

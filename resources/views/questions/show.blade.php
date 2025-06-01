@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto mt-6 p-6 bg-white shadow rounded">
    <h1 class="text-2xl font-bold">{{ $question->title }}</h1>
    <p class="mt-4 text-gray-700">{{ $question->description }}</p>

    <hr class="my-6">

    <h2 class="text-xl font-semibold mb-2">Answers ({{ $question->answers->count() }})</h2>

    @foreach ($question->answers as $answer)
        <div class="border p-4 rounded mb-3">
            {{ $answer->content }}
        </div>
    @endforeach

    @auth
    <form method="POST" action="{{ route('answers.store', $question->id) }}" class="mt-6">
        @csrf
        <textarea name="content" class="w-full border p-2 rounded" rows="4" placeholder="Write your answer..."></textarea>
        <button type="submit" class="mt-2 px-4 py-2 bg-blue-500 text-white rounded">Submit Answer</button>
    </form>
    @else
        <p class="mt-4 text-sm text-gray-500">You must <a href="/login" class="text-blue-500 underline">log in</a> to submit an answer.</p>
    @endauth
</div>
@endsection

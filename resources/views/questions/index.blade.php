

@extends('layouts.app')
@section('content')
<div class="max-w-4xl mx-auto mt-10 px-6">
    <h1 class="text-2xl font-bold mb-6">الأسئلة الحديثة</h1>

    @forelse ($questions as $question)
        <div class="mb-4 p-4 bg-white rounded-lg shadow hover:shadow-md transition">
            <a href="{{ route('questions.show', $question) }}" class="text-blue-600 text-lg font-semibold hover:underline">
                {{ $question->title }}
            </a>
            <p class="text-sm text-gray-600 mt-1">{{ $question->answers_count }} إجابة</p>
        </div>
    @empty
        <p class="text-gray-500">لا توجد أسئلة متاحة حالياً.</p>    @endforelse

    {{-- روابط التصفح --}}
    <div class="mt-6">
        {{ $questions->links() }}
    </div>
</div>
@endsection

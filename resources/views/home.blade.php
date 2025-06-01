@push('styles')
<style>
/* fade in */
@keyframes fadeIn {
  0% {
    opacity: 0;
    transform: translateY(20px);
  }
  100% {
    opacity: 1;
    transform: translateY(0);
  }
}

.animate-fade-in {
  animation: fadeIn 0.8s ease forwards;
}

.animate-fade-in-up {
  animation: fadeIn 1s ease forwards;
  animation-delay: 0.3s;
}
</style>
@endpush

@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto mt-10 px-6">
    <div class="bg-gradient-to-r from-blue-500 to-indigo-600 text-white p-6 rounded-2xl shadow-xl transform transition duration-700 ease-in-out animate-fade-in">
        <h1 class="text-3xl font-bold mb-2">مرحباً بك في منصة الأسئلة 👋</h1>
        <p class="text-white/90">ابدأ بطرح الأسئلة أو مشاركة معرفتك بالإجابات.</p>
    </div>

    @if (session('status'))
        <div class="mt-4 bg-green-100 text-green-800 p-3 rounded shadow animate-fade-in-up">
            {{ session('status') }}
        </div>
    @endif

    <div class="mt-10">
        <h2 class="text-2xl font-semibold mb-4">الأسئلة الحديثة</h2>

        {{-- قائمة الأسئلة --}}
        @forelse($questions as $question)
            <a href="{{ route('questions.show', $question->id) }}" class="block p-5 mb-4 bg-white rounded-xl shadow hover:shadow-lg transition hover:bg-gray-50 animate-fade-in-up">
                <h3 class="text-xl font-bold text-blue-700">{{ $question->title }}</h3>
                <p class="text-gray-600 mt-1">{{ $question->answers_count }} إجابة</p>
            </a>
        @empty
            <p class="text-gray-500">لا توجد أسئلة حتى الآن.</p>
        @endforelse
    </div>
</div>
@endsection

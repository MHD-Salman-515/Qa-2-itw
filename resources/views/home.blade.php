@push('styles')
<style>
  /* الخلفية السوداء والنصوص */
  body {
    background-color: #121212;
    color: #e0e0e0;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
  }

  /* fade in animation */
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

  /* الحاوية الرئيسية */
  .container {
    max-width: 900px;
    margin: 2.5rem auto;
    padding: 0 1.5rem;
  }

  /* العنوان الرئيسي */
  .welcome-box {
    background: linear-gradient(90deg, #3b82f6, #6366f1);
    padding: 1.5rem 2rem;
    border-radius: 1rem;
    box-shadow: 0 8px 24px rgb(59 130 246 / 0.4);
  }

  .welcome-box h1 {
    font-size: 2rem;
    font-weight: 700;
    margin-bottom: 0.5rem;
    color: white;
  }

  .welcome-box p {
    color: rgba(255, 255, 255, 0.8);
    font-size: 1.1rem;
  }

  /* رسالة النجاح */
  .status-message {
    background-color: #22c55e;
    color: #164e09;
    padding: 0.8rem 1.2rem;
    border-radius: 0.75rem;
    box-shadow: 0 2px 8px rgb(34 197 94 / 0.5);
    margin-top: 1rem;
    font-weight: 600;
  }

  /* زر الإنشاء بمحاذاة اليمين */
  .create-btn-wrapper {
    margin-top: 2rem;
    text-align: right;
  }

  .create-btn {
    background-color: #2563eb;
    color: white;
    padding: 0.65rem 1.5rem;
    border-radius: 0.75rem;
    font-weight: 600;
    box-shadow: 0 4px 12px rgb(37 99 235 / 0.5);
    transition: background-color 0.3s ease;
    display: inline-block;
  }
  .create-btn:hover {
    background-color: #1e40af;
  }

  /* قائمة الأسئلة */
  .questions-list {
    margin-top: 2.5rem;
  }W

  .questions-list h2 {
    font-size: 1.75rem;
    font-weight: 700;
    margin-bottom: 1rem;
    color: #f1f5f9;
  }

  /* بطاقة السؤال */
  .question-card {
    background-color: #1e293b;
    border-radius: 1rem;
    padding: 1.5rem 1.75rem;
    margin-bottom: 1.2rem;
    box-shadow: 0 5px 15px rgb(30 41 59 / 0.6);
    color: #e2e8f0;
    text-decoration: none;
    display: block;
    transition: background-color 0.25s ease, box-shadow 0.25s ease;
  }
  .question-card:hover {
    background-color: #334155;
    box-shadow: 0 8px 24px rgb(51 65 85 / 0.8);
  }

  .question-card h3 {
    font-size: 1.25rem;
    font-weight: 700;
    color: #60a5fa;
  }

  .question-card p {
    margin-top: 0.5rem;
    color: #94a3b8;
    font-size: 1rem;
  }

  /* روابط التصفح */
  .pagination-wrapper {
    margin-top: 1.5rem;
    color: #e0e0e0;
  }
</style>
@endpush

@extends('layouts.app')

@section('content')
<div class="container">
  {{-- العنوان الرئيسي --}}
  <div class="welcome-box animate-fade-in">
    <h1>مرحباً بك في منصة الأسئلة 👋</h1>
    <p>ابدأ بطرح الأسئلة أو مشاركة معرفتك بالإجابات.</p>
  </div>

  {{-- رسالة النجاح --}}
  @if(session('status'))
    <div class="status-message animate-fade-in-up">
      {{ session('status') }}
    </div>
  @endif

  {{-- زر إنشاء سؤال --}}
  <div class="create-btn-wrapper animate-fade-in-up">
    <a href="{{ route('questions.create') }}" class="create-btn">
      ➕ إنشاء سؤال
    </a>
  </div>

  {{-- قائمة الأسئلة --}}
  <div class="questions-list">
    <h2>الأسئلة الحديثة</h2>

    @forelse($questions as $question)
      <a href="{{ route('questions.show', $question->id) }}" class="question-card animate-fade-in-up">
        <h3>{{ $question->title }}</h3>
        <p>{{ $question->answers_count }} إجابة</p>
      </a>
    @empty
      <p>لا توجد أسئلة حتى الآن.</p>
    @endforelse

    {{-- روابط التصفح --}}
    <div class="pagination-wrapper">
      {{ $questions->links() }}
    </div>
  </div>
</div>
@endsection

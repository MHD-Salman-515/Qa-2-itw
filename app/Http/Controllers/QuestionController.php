<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Vote;
use App\Models\Answer;
use App\Models\user;
class QuestionController extends Controller
{
    /**
     * عرض قائمة الأسئلة.
     */
    public function index()
    {
        // جلب الأسئلة مع عدد الإجابات، مرتبة من الأحدث إلى الأقدم، مع تقسيم الصفحات
        $questions = Question::withCount('answers')->orderBy('created_at', 'desc')->paginate(10);
    return view('questions.index', compact('questions'));
    }

    /**
     * عرض نموذج إنشاء سؤال جديد.
     */
    public function create()
    {
        return view('questions.create');
    }

    /**
     * حفظ السؤال الجديد في قاعدة البيانات.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'category' => 'nullable|string|max:100',
        ]);

        // إنشاء السؤال وربطه بالمستخدم الحالي
        $question = auth()->user()->questions()->create($request->only('title', 'description', 'category'));

        return redirect()->route('home')->with('success', 'تم نشر السؤال بنجاح.');
    }

    /**
     * عرض تفاصيل سؤال معين.
     */
    public function show(Question $question)
    {
        // تحميل الإجابات والمستخدمين المرتبطين بها والتصويتات
        $question->load('answers.user', 'votes');

        return view('questions.show', compact('question'));
    }

    /**
     * عرض نموذج تعديل سؤال (لم يُنفذ بعد).
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * تحديث سؤال معين (لم يُنفذ بعد).
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * حذف سؤال معين (لم يُنفذ بعد).
     */
    public function destroy(string $id)
    {
        //
    }
    public function votes()
{
   // return $this->hasMany(Vote::class);
}

// في Answer.php
public function vote()
{
   // return $this->hasMany(Vote::class);
}

// في Vote.php
public function user()
{
    return $this->belongsTo(User::class);
}

public function question()
{
    return $this->belongsTo(Question::class);
}

public function answer()
{
    return $this->belongsTo(Answer::class);
}
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
class AnswerController extends Controller
{
    public function store(Request $request, Question $question) {
    $request->validate(['content' => 'required|string']);

    $question->answers()->create([
        'content' => $request->content,
        'user_id' => auth()->id(),
    ]);

    return redirect()->route('questions.show', $question)->with('success', 'Answer posted.');
}
}

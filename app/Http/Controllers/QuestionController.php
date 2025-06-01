<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $questions = Question::withCount('answers')->orderBy('created_at', 'desc')->paginate(10);
    return view('questions.index', compact('questions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('questions.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'category' => 'nullable|string|max:100',
    ]);
    $question = auth()->user()->questions()->create($request->only('title', 'description', 'category'));

    return redirect()->route('home')->with('success', 'Question posted successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Question $question)
    {
      $question->load('answers.user', 'votes');
    return view('questions.show', compact('question'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

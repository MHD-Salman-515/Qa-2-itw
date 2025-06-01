<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Answer;
use App\Models\Vote;
use App\Http\Controllers\Controller;
class VoteController extends Controller
{
   public function store(Request $request) {
    $request->validate([
        'votable_id' => 'required|integer',
        'votable_type' => 'required|string',
    ]);

    $votableType = $request->votable_type === 'question' ? Question::class : Answer::class;
    $votable = $votableType::findOrFail($request->votable_id);

    $existingVote = Vote::where('user_id', auth()->id())
        ->where('votable_id', $votable->id)
        ->where('votable_type', $votableType)
        ->first();

    if ($existingVote) {
        return back()->withErrors('You have already voted.');
    }

    $votable->votes()->create([
        'user_id' => auth()->id(),
        'upvote' => true,
    ]);

    return back()->with('success', 'Vote recorded.');
}
}

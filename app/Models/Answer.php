<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
 public function user() {
    return $this->belongsTo(User::class);
}

public function question() {
    return $this->belongsTo(Question::class);
}

public function votes() {
 //   return $this->morphMany(Vote::class, 'votable');
}

}

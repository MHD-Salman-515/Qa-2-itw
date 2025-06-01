<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Question extends Model
{
    public function user() {
    return $this->belongsTo(User::class);
}

public function answers() {
    return $this->hasMany(Answer::class);
}

public function votes() {
    return $this->morphMany(Vote::class, 'votable');
}

 use HasFactory;

    // السماح بملء هذه الحقول باستخدام الإدخال الجماعي
    protected $fillable = [
        'title',
        'description',
        'body',
        'user_id', // أضف أي خصائص أخرى تريد إدخالها جماعيًا
    ];
}

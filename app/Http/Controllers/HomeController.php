<?php

namespace App\Http\Controllers;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use App\Models\Question;
class HomeController extends Controller
{
    // تشغيل الميدل وير auth على كل دوال الكنترولر
    public function __construct()
    {
        $this->middleware('auth');
    }

    // صفحة الـ Home الرئيسية
    public function index()
    {
     $questions = Question::withCount('answers')->latest()->paginate(10);
        return view('home', compact('questions'));
    }
}

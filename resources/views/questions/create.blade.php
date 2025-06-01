@extends('layouts.app')

@section('content')
<h1>Post a Question</h1>
<form method="POST" action="{{ route('questions.store') }}">
    @csrf
    <input type="text" name="title" placeholder="Title" required>
    <textarea name="description" placeholder="Description" required></textarea>
    <input type="text" name="category" placeholder="Category (optional)">
    <button type="submit">Submit</button>
</form>
 @endsection
ًًً
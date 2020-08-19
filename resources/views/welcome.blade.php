@extends('layouts.app')

@section('content')
    <h1 class="text-center">This is the main page</h1>
    @if (Auth::user())
        <h1 class="text-center">You are logged in</h1>
    @else
        <h1 class="text-center">You are a guest</h1>
    @endif
@endsection
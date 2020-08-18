@extends('layouts.app')

@section('content')
    <h1 class="text-center">This is the main page</h1>
    @if (Auth::user())
        <h1>You are logged in</h1>
    @else
        <h1>You are a guest</h1>
    @endif
@endsection
@extends('layouts.app')

@section('content')
    <div class="container">
    
    @foreach ($posts as $post)
    <div class="row h-100">
        <div class="col-6 offset-3">
            <a href="/p/{{$post->id}}">
                <img src="/storage/{{$post->image}}" class="w-100">
            </a>
        </div>
        <div class="col-8 offset-3 pt-2 pb-4">
            
            <p><strong><a class="text-dark" href="/profile/{{$post->user->id}}">{{$post->user->username}}</a></strong> {{$post->caption}}</p>
        </div>
    </div>
    @endforeach

    <div class="row">
        <div class="col-12 d-flex justify-content-center">
            {{$posts->links()}}
        </div>
    </div>
    </div>
@endsection
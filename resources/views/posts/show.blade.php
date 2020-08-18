@extends('layouts.app')

@section('content')
    <div class="container">
    <!--<h1 class="text-center">{{$post->caption}}</h1>-->
    <div class="row h-100">
        <div class="col-6">
            <img src="/storage/{{$post->image}}" class="w-100">
        </div>
        <div class="col-6">
            <div class="d-flex align-items-center">
                <div>
                    <a href="/profile/{{$post->user->id}}"><img src="/storage/{{$post->user->profile->image}}" class="rounded-circle w-100" style="max-width: 50px;"></a>
                </div>
                <div class="pl-3 d-flex align-items-center">
                    <a class="text-dark" href="/profile/{{$post->user->id}}"><strong>{{$post->user->username}}</strong></a>
                    <span class="pl-2 text-dark">●</span>
                    <a href="#" class="pl-2"><strong>Follow</strong></a>
                </div>
            </div>
            <hr>
            <p><strong><a class="text-dark" href="/profile/{{$post->user->id}}">{{$post->user->username}}</a></strong> {{$post->caption}}</p>
        </div>
    </div>
    </div>
@endsection
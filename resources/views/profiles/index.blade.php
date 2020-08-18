@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row d-flex align-items-center ">
        <div class="col-3 p-5 d-flex justify-content-center">
            <img  src="/storage/{{$user->profile->image}}"  class="w-100 rounded-circle" alt="logo">
        </div>
        <div class="col-9 p-5">
            <div class="d-flex justify-content-between align-items-center ">
                <h1>{{$user->username}}</h1>
                @can('update', $user->profile)
                    <a href="/p/create" class="pl-3 ml-4 btn btn-primary">Add Post</a>
                @endcan
            </div>
            <div class="d-flex ">
                <div class="pr-3">
                <strong class="pr-2">{{count($user->posts)}}</strong>posts
                </div>
                
                <div class="pr-3">
                    <strong class="pr-2">26k</strong>Followers
                </div>
                <div class="pr-3">  
                    <strong class="pr-2">26k</strong>Followers
                </div>
            </div>
            
            @can('update', $user->profile)
                <a href="/profile/{{$user->id}}/edit">Edit profile</a>
            @endcan
            
           
            <div class="pt-4 font-weight-bold">
                {{$user->profile->title}}
            </div>
            <div>
                {{$user->profile->description}}
            </div>
            <div>
            <a href={{'https://'.$user->profile->url}} target="_blank">{{$user->profile->url}}</a>
            </div>
        </div>
    </div>

    <!--Second row-->
    <div class="row">
        @foreach ($user->posts as $post)
        <div class="col-4 pb-4">
            <a href="/p/{{$post->id}}"><img src="/storage/{{$post->image}}" class="w-100"></a>
        </div>
        @endforeach
    </div>
</div>
@endsection

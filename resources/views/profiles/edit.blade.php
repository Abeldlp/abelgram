@extends('layouts.app')

@section('content')
<div class="row d-flex justify-content-center">
    <h1 >Edit profile</h1>
</div>
<form action="/profile/{{$user->id}}" enctype="multipart/form-data" method="POST">
    @csrf
    @method('PATCH')
    <div class="row">
        <div class="col-8 offset-2">
            <div class="form-group row">
                <label for="title" class="col-md-4 col-form-label">title</label>
                    <input id="title" 
                    type="text" 
                    class="form-control @error('title') is-invalid @enderror" 
                    name="title" 
                    value="{{ old('title') ?? $user->profile->title }}" 
                    autocomplete="title" 
                    autofocus
                    >

                    @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-8 offset-2">
            <div class="form-group row">
                <label for="description" class="col-md-4 col-form-label">Description</label>
                    <input id="description" 
                    type="text" 
                    class="form-control @error('description') is-invalid @enderror" 
                    name="description" 
                    value="{{ old('description') ?? $user->profile->description }}" 
                    autocomplete="description" 
                    autofocus>

                    @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-8 offset-2">
            <div class="form-group row">
                <label for="url" class="col-md-4 col-form-label">URL</label>
                    <input id="url" 
                    type="text" 
                    class="form-control @error('url') is-invalid @enderror" 
                    name="url" 
                    value="{{ old('url') ?? $user->profile->url }}" 
                    autocomplete="url" 
                    autofocus>

                    @error('url')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
            </div>
        </div>
    </div>

    <!--Image-->

    <div class="row">
        <div class="col-8 offset-2">
        <label for="image" class="col-md-4 col-form-label">Profile Image</label>
        <input type="file" class="form-cotrol-file" id="image" name="image">
        @error('image')
                <strong>{{ $message }}</strong>
        @enderror
    </div>
    </div>

    <div class="row">
        <div class="col-8 offset-2 d-flex justify-content-center">
            <button class="btn btn-primary mt-4">Save Profile</button>
        </div>
    </div>
</form>
@endsection
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row d-flex justify-content-center">
            <h1 >Add new post</h1>
        </div>
        <form action="/p" enctype="multipart/form-data" method="POST">
            @csrf

            <div class="row">
                <div class="col-8 offset-2">
                    <div class="form-group row">
                        <label for="caption" class="col-md-4 col-form-label">Caption</label>
                            <input id="caption" 
                            type="text" 
                            class="form-control @error('caption') is-invalid @enderror" 
                            name="caption" 
                            value="{{ old('caption') }}" 
                            autocomplete="caption" 
                            autofocus>
    
                            @error('caption')
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
                <label for="image" class="col-md-4 col-form-label">Image</label>
                <input type="file" class="form-cotrol-file" id="image" name="image">
                @error('image')
                        <strong>{{ $message }}</strong>
                @enderror
            </div>
            </div>

            <div class="row">
                <div class="col-8 offset-2 d-flex justify-content-center">
                    <button class="btn btn-primary mt-4">Add Post</button>
                </div>
            </div>
        </form>
    </div>
@endsection
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Auth;
use Intervention\Image\Facades\Image;

class PostsController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }


    public function create(){
        return view('posts.create');
    }



    public function store (){

        $data = request()->validate([
            'caption' => 'required',
            'image' => ['required', 'image'],
        ]);

        //Sends to the correspondant uploads file
        $imagepath = request('image')->store('uploads', 'public');

        //Resize image automatically Need to import library on the top
        $image = Image::make(public_path("storage/".$imagepath))->fit(1200, 1200);
        $image->save();

        //Save data to database
        Auth::user()->posts()->create([
            'caption' => $data['caption'],
            'image' => $imagepath
        ]);

        
        return redirect('/profile/'. Auth::user()->id);
    }

    public function show($id){
        $post = Post::findOrFail($id);
        return view('posts.show')->with('post', $post);
    }
}

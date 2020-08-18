<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use Intervention\Image\Facades\Image;

class ProfilesController extends Controller
{
    
    public function index($user)
    {
        $user = User::findOrFail($user);
        
        return view('profiles.index')->with('user', $user);
    }


    public function edit ($id){
        $user = User::findOrFail($id);
        $this->authorize('update', $user->profile);
        return view('profiles.edit')->with('user', $user);
    }

    public function update($id){
        $data = request()->validate([
            'title' => 'required',
            'description' => '',
            'url' => '',
            'image' => ''
        ]);

        
        if(request('image')){
        //Sends to the correspondant uploads file
        $imagepath = request('image')->store('profile', 'public');
        //Resize image automatically Need to import library on the top
        $image = Image::make(public_path("storage/".$imagepath))->fit(1000, 1000);
        $image->save();
        }
        
        //!NOT WORKING PROPERLY
        Auth::user()->profile->update(array_merge($data, ['image' => $imagepath]));

        return redirect('profile/'.Auth::user()->id);
    }
}

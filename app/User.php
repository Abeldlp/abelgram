<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Mail;
use App\Mail\newUserWelcomeMail;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'username', 'password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function profile(){
        return $this->hasOne(Profile::class);
    }

    public function posts(){
        return $this->hasMany(Post::class)->orderBy('created_at', 'desc');
    }

    public function following(){
        return $this->belongsToMany(Profile::class);
    }

    //Hook up an event to create a profile
    protected static function boot(){
        parent::boot();

        //Setting data default to the user
        static::created(function($user){
            //Creating a user profile
            $user->profile()->create([
                'title' => $user->username,
            ]);
            
            //Sending a welcome email
            Mail::to($user->email)->send(new newUserWelcomeMail());
        });
    }
}

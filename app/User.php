<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','email_token',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function userPost()
    {
        return $this->hasMany(Post::class);
    }

    public function publish( Post $post )
    {
        $this->userPost()->save($post);
    }

    public function userReply()
    {
        return $this->belongsTo(User::class);
    }

}

<?php

namespace App;

class PostComment extends Model
{
    public function Post()
    {
    	return $this->belongsTo(Post::class);
    }

    public function Reply()
    {
    	return $this->hasMany(Reply::class);
    }


    public function userComment()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function addReply($reply)
    {
        $user_id = auth()->id();
    	$this->Reply()->create(compact('reply', 'user_id'));
    }
}

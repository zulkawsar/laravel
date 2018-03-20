<?php

namespace App;

class Reply extends Model
{
    public function relComment()
    {
    	return $this->belongsTo(PostComment::class);
    }

    public function replyUser()
    {
    	return $this->belongsTo(User::class, 'user_id', 'id');
    }

}

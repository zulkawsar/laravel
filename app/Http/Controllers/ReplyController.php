<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PostComment;
use App\Reply;
class ReplyController extends Controller
{
    public function store(PostComment $reply)
    {
    	$reply->addReply(request('reply'));
    	return back();
    }

    public function userReply()
    {
    	return $this->belongsTo(User::class);
    }
}

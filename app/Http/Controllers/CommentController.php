<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\PostComment;
use App\Http\Requests\Comments;

class CommentController extends Controller
{
    public function store( Comments $request, Post $post)
    {
    	$post->addComment(request('comment'));

    	return back();
    }
}

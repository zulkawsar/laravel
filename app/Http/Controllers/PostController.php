<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;

use App\PostComment;
use App\Post;
use App\User;

class PostController extends Controller
{
    public function index()
    {
    	if(request( [ 'month', 'year' ])) {
            $posts = Post::latest()->filter( request( [ 'month', 'year' ] ))->get();
        }
        else{
            $posts = Post::latest()->get();   
        }

        return view('posts.index', compact('posts'));
    }


    public function show( Post $post )
    {
    	return view('posts.show', compact('post'));
    }


    public function create()
    {
    	return view('posts.create');
    }


    public function store( PostRequest $request )
    {
        auth()->user()->publish(
            new Post(request(['title','body']))
        );
    	return redirect()->route('index',[
    		'msg' => 'Good Jobs'
    	]);
    }

    
}

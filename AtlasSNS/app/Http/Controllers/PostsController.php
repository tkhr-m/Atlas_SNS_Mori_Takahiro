<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Follow;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{
    //
    public function index(Request $request){
        $user = Auth::user();
        return view('posts.index',['user' => $user]);
    }

    public function store(Request $request){
        $post = new Post;
        unset($request->_token);
        $post->user_id = Auth::id();
        $post->post = $request->tweet;
        $post->save();
        return redirect('/index');
    }

    public function update(Request $request){
        $post = Post::Where('id', $request->modal_id)->first();
        unset($request->_token);
        $post->post = $request->modal_post;
        $post->save();
        return redirect('/index');
    }

    public function delete(Request $request){
        $post = Post::find($request->post_id)->delete();
        return redirect('/index');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\Auth;
class PostsController extends Controller
{
    //
    public function index(Request $request){
        $user = Auth::user();
        $posts = Post::where('user_id',Auth::id())->get();


        return view('posts.index',['user' => $user,'posts' => $posts]);
    }

    public function store(Request $request){
        $post = new Post;
        unset($request->_token);
        $post->user_id = Auth::id();
        $post->post = $request->tweet;
        $post->save();
        return redirect('/index');
    }

    public function delete(Request $request){
        $post = Post::find($request->id)->delete();
        return redirect('/index');
    }
}

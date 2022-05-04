<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\Auth;
class PostsController extends Controller
{
    //
    public function index(Request $request){
    $session_data = $request->session()->get('user');
        return view('posts.index',['session_data' => $session_data]);
    }
}

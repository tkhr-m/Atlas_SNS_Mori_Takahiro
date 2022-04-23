<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostsController extends Controller
{
    //
    public function index(Request $request){
         $session_data = $request->session()->get('name');
        return view('posts.index',['session_name' => $session_data]);
    }
}

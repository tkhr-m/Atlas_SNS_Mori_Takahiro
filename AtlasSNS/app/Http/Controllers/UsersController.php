<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Follow;
use App\Post;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    //
    public function profile(){
        return view('users.profile');
    }
    public function search(){
        $user = Auth::user();
        $other_users = User::where('id','!=',Auth::id())->get();
        return view('users.search',['user'=>$user,'other_users'=>$other_users]);
    }

    public function searchResult(Request $request){
        $user = Auth::user();
        $search_word = $request->search;
        $search_users = User::Where('username','like','%'.$search_word.'%')->get();
        return view('users.search_result',['user'=>$user,'search_word'=>$search_word,'search_users'=>$search_users]);
    }

    public function follow()
    {

    }

    public function un_follow()
    {

    }
}

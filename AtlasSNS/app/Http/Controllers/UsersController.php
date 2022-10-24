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
        $other_users = User::where('id','!=',Auth::id())->get();
        return view('users.search',['other_users'=>$other_users]);
    }

    public function searchResult(Request $request){
        $search_word = $request->search;
        $search_users = User::Where('username','like','%'.$search_word.'%')->get();
        return view('users.search_result',['search_word'=>$search_word,'search_users'=>$search_users]);
    }

    public function follow(Request $request){
        Auth::user()->follow()->attach($request->followed_id);
        return redirect ('/search');
    }

    public function unfollow(Request $request){
        Auth::user()->follow()->detach($request->followed_id);
        return redirect('/search');
    }
}

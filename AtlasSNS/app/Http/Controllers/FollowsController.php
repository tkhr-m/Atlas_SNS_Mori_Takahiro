<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Follow;
use App\Post;
use Illuminate\Support\Facades\Auth;

class FollowsController extends Controller
{
    //
    public function followList(Request $request){
        $followees = Auth::user()->follow;
        $followees_id = Auth::user()->follow()->pluck('followed_id');
        $followee_posts = Post::with('user')->whereIn('user_id',$followees_id)->orderBy('updated_at','desc')->get();
        return view('follows.followList',['followees' => $followees,'followee_posts' => $followee_posts]);
    }
    public function followerList(){
        $followers = Auth::user()->followed;
        $followers_id = Auth::user()->followed()->pluck('following_id');
        $follower_posts = Post::with('user')->whereIn('user_id',$followers_id)->orderBy('updated_at','desc')->get();
        return view('follows.followerList',['followers' => $followers,'follower_posts' => $follower_posts]);
    }
}

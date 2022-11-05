<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\User;
use App\Follow;
use App\Post;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    //
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

    public function profile(Request $request){
        if(Auth::user()->isFollowing($request->followed_id)){
            Auth::user()->follow()->detach($request->followed_id);
        }else{
            Auth::user()->follow()->attach($request->followed_id);
        }
        $user_profile = User::with('posts')->whereIn('id',[$request->profile_id,$request->followed_id])->first();
        return view('users.profile',['user_profile' => $user_profile]);
    }

    public function profileEdit(Request $request){
        return view('users.profile_edit');
    }

    public function profileUpdate(Request $request){

    //バリデーション
        $validator = Validator::make($request->all(),[
            'profile_name' => ['required','between:2,12'],
            'profile_mail' => ['required','between:5,40','email','unique:users,mail,'.$request->profile_id.',id'],
            'profile_password' => ['required','alpha-num','between:8,20','confirmed'],
            'profile_bio' => ['max:150'],
            'profile_image' => ['file','mimes:jpg,png,bmp,gif,svg'],
        ]);
        if($validator->fails()){
            return redirect('/profile');
        }
    //画像処理
       if($request->profile_image != null){
       $path = $request->profile_image->store('images','public');
       }
    //保存処理
        $old_data = User::find($request->profile_id);
        $new_data = $request->all();
        unset($new_data['_token']);
        $old_data->username = $new_data['profile_name'];
        $old_data->mail = $new_data['profile_mail'];
        $old_data->password = bcrypt($new_data['profile_password']);
        $old_data->bio = $new_data['profile_bio'];
        if($request->profile_image != null){
        if($new_data['profile_image'] != null){
        $old_data->image = 'storage/'.$path;
        };
        }
        $old_data->save();
        return redirect('/index');
    }





}

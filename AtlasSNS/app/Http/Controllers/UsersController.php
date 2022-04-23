<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    //
    public function profile(Request $request){
        $session_data = $request->session()->get('name');
        return view('users.profile',['session_name' => $session_data]);
    }
    public function search(){
        return view('users.search');
    }
}

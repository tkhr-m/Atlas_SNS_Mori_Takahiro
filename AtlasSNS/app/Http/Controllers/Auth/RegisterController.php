<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /* public function __construct()
    {
        $this->middleware('guest');
    }*/

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'username' => 'required|string|max:255',
            'mail' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:4|confirmed',
        ]);
    }


    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'username' => $data['username'],
            'mail' => $data['mail'],
            'password' => bcrypt($data['password']),
        ]);
    }


    // public function registerForm(){
    //     return view("auth.register");
    // }

    public function register(Request $request){


        if($request->isMethod('post')){

            $massages = [
                'username.required' => '入力必須項目です。',
                'username.string' => '文字を入力して下さい。',
                'username.between' => '2~12文字で入力して下さい。',
                'mail.required' => '入力必須項目です。',
                'mail.email' => 'メール形式で入力して下さい。',
                'mail.between' => '5~40の間でで入力して下さい。',
                'mail.unique' => 'このアドレスはすでに使われています。',
                'password.required' => '入力必須項目です。',
                'password.between' => '8~20の間でで入力して下さい。',
                'password.confirmed' => 'パスワードが一致しません。',
                'password.alpha-num' => '英数字で入力して下さい。',
            ];

          $validator = Validator::make($request->all(),[

            'username' => 'required|string|between:2,12',
            'mail' => 'required|email|between:5,40|unique:users,mail',
            'password' => 'required|between:8,20|confirmed|alpha-num',
            ],$massages);
        if($validator->fails()){
            return redirect('/register')
            ->withErrors($validator);
        }

            $name = $request->username;
            $request->session()->put('name',$name);
            $data = $request->input();
            $this->create($data);
            return redirect('added');

        }
        return view('auth.register');
    }

    public function added(Request $request){
        $session_data = $request->session()->get('name');
        return view('auth.added',['session_name' => $session_data]);
    }
}

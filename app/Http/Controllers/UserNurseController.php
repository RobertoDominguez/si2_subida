<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;
use Whoops\Run;

class UserNurseController extends Controller
{
    public function __construct(){
        $this->middleware('guest')->except(['logout','menu']);
        $this->middleware('guest:administrator')->except(['logout','menu']);
        $this->middleware('guest:nurse')->except(['logout','menu']);
        $this->middleware('guest:patient')->except(['logout','menu']);
    }

    public function getLogin(){
        return view('nurse.login');
    }

    public function login(Request $request){
        $this->validate(request(),
        ['email'=>'email|required|string',
        'password'=>'required|string',
        ]);

        $credentials=[
            'email'=>$request->email,
            'password'=>$request->password,
            'type_nurse'=>true
        ];

        if (Auth::guard('nurse')->attempt($credentials)){
            return redirect(route('nurse.menu'));
        }
        return back()
        ->withErrors(['email'=>'Estas credenciales no concuerdan con nuestros registros.'])
        ->withInput(request(['email']));
    }

    public function logout(){
        Auth::guard('nurse')->logout();
        return redirect(route('nurse.get_login'));
    }

    public function menu(){
        return view('nurse.menu');
    }

}

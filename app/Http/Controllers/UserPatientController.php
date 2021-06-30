<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;
use App\Models\Invoice;
use App\Models\PaymentMethod;
use Faker\Provider\ar_SA\Payment;
use Illuminate\Support\Facades\DB;

class UserPatientController extends Controller
{
    public function __construct(){
        $this->middleware('guest')->except(['logout','menu','solicitarServicio']);
        $this->middleware('guest:administrator')->except(['logout','menu','solicitarServicio']);
        $this->middleware('guest:nurse')->except(['logout','menu','solicitarServicio']);
        $this->middleware('guest:patient')->except(['logout','menu','solicitarServicio']);
    }

    public function getLogin(){
        return view('patient.login');
    }

    public function login(Request $request){
        $this->validate(request(),
        ['email'=>'email|required|string',
        'password'=>'required|string',
        ]);

        $credentials=[
            'email'=>$request->email,
            'password'=>$request->password,
            'type_patient'=>true
        ];


        if (Auth::guard('patient')->attempt($credentials)){
            return redirect(route('patient.menu'));
        }
        return back()
        ->withErrors(['email'=>'Estas credenciales no concuerdan con nuestros registros.'])
        ->withInput(request(['email']));
    }

    public function logout(){
        Auth::guard('patient')->logout();
        return redirect(route('patient.get_login'));
    }

    public function menu(){
        $services=Service::servicesWithCategory();
        return view('patient.menu',compact('services'));
    }

    public function solicitarServicio($id_service){
        $payment_methods=PaymentMethod::payments();
        return view('patient.solicitar_servicio',compact('payment_methods','id_service'));
    }

}

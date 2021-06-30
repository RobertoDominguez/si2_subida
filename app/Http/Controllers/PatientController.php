<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PatientController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:administrator'); 
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $patients=User::patients();
        return view('administrator.patient.index',compact('patients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('administrator.patient.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(),[
            'name'=>'required|string',
            'last_name'=>'required|string',
            'email'=>'required|email',
            'phone'=>'required',
            'password'=>'required|min:8|same:password_confirm',
            'password_confirm'=>'required',
        ]);

        $data=[
            'name'=>$request->name,
            'last_name'=>$request->last_name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'password'=>Hash::make($request->password),
            'type_nurse'=>false,
            'type_patient'=>true,
            'removed'=>false,
        ];

        $patient=User::create($data);
        return redirect(route('administrator.patient.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $User
     * @return \Illuminate\Http\Response
     */
    public function show(User $User)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $User
     * @return \Illuminate\Http\Response
     */
    public function edit(User $User)
    {
        $patient=$User;
        return view('administrator.patient.edit',compact('patient'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $User
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $User)
    {
        $this->validate(request(),[
            'name'=>'required|string',
            'last_name'=>'required|string',
            'email'=>'required|email',
            'phone'=>'required',
            'password'=>'required|min:8|same:password_confirm',
            'password_confirm'=>'required',
        ]);

        $data=[
            'name'=>$request->name,
            'last_name'=>$request->last_name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'password'=>Hash::make($request->password),
        ];

        $User->update($data);
        return redirect(route('administrator.patient.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $User
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $User)
    {
        $User->update(['removed'=>true]);
        return redirect(route('administrator.patient.index'));
    }
}

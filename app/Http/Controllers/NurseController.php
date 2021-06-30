<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class NurseController extends Controller
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
        $nurses=User::nurses();
        return view('administrator.nurse.index',compact('nurses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('administrator.nurse.create');
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
            'credential'=>'required|string',
            'name'=>'required|string',
            'last_name'=>'required|string',
            'email'=>'required|email',
            'phone'=>'required',
            'password'=>'required|min:8|same:password_confirm',
            'password_confirm'=>'required',
        ]);

        $data=[
            'credential'=>$request->credential,
            'name'=>$request->name,
            'last_name'=>$request->last_name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'password'=>Hash::make($request->password),
            'type_nurse'=>true,
            'type_patient'=>false,
            'removed'=>false,
        ];

        $nurse=User::create($data);
        return redirect(route('administrator.nurse.index'));
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
        $nurse=$User;
        return view('administrator.nurse.edit',compact('nurse'));
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
            'credential'=>'required|string',
            'name'=>'required|string',
            'last_name'=>'required|string',
            'email'=>'required|email',
            'phone'=>'required',
            'password'=>'required|min:8|same:password_confirm',
            'password_confirm'=>'required',
        ]);

        $data=[
            'credential'=>$request->credential,
            'name'=>$request->name,
            'last_name'=>$request->last_name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'password'=>Hash::make($request->password),
        ];

        $User->update($data);
        return redirect(route('administrator.nurse.index'));
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
        return redirect(route('administrator.nurse.index'));
    }
}

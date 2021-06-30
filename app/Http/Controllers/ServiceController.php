<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
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
        $services=Service::services();
        return view('administrator.service.index',compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::categories();
        return view('administrator.service.create',compact('categories'));
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
            'id_category'=>'required',
            'name'=>'required|string',
            'price'=>'required|string',
            'duration'=>'required|string',
        ]);

        $data=[
            'id_category'=>$request->id_category,
            'name'=>$request->name,
            'price'=>$request->price,
            'duration'=>$request->duration,
            'removed'=>false,
        ];

        $service=Service::create($data);
        return redirect(route('administrator.service.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Service  $Service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $Service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Service  $Service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $Service)
    {
        $service=$Service;
        $categories=Category::categories();
        return view('administrator.service.edit',compact('service','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Service  $Service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $Service)
    {
        $this->validate(request(),[
            'id_category'=>'required',
            'name'=>'required|string',
            'price'=>'required|string',
            'duration'=>'required|string',
        ]);

        $data=[
            'id_category'=>$request->id_category,
            'name'=>$request->name,
            'price'=>$request->price,
            'duration'=>$request->duration,
        ];

        $Service->update($data);
        return redirect(route('administrator.service.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $Service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $Service)
    {
        $Service->update(['removed'=>true]);
        return redirect(route('administrator.service.index'));
    }
}

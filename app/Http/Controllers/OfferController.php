<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use App\Models\Service;
use Illuminate\Http\Request;
use Auth;

class OfferController extends Controller
{
    public function index(){
        $nurse=Auth::user();
        $services=Offer::nurseWithServicesWithCategory($nurse->id);
        return view('nurse.offer.index',compact('services'));
    }

    public function create(){
        $nurse=Auth::user();
        $offers=Offer::nurse($nurse->id);
        $services=Service::servicesWithCategory();

        $i=0;
        foreach ($services as $service){
            $eliminado=false;
            foreach ($offers as $offer){
                if ($eliminado==false){
                    if ($service->id==$offer->id_service){
                        unset($services[$i]);
                        $eliminado=true;
                    }
                }
            }
            $i++;
        }
        
        $datos=[];
        $i=0;
        foreach ($services as $service){
            $datos[$i]=$service;
            $i++;
        }
        $services=$datos;
        return view('nurse.offer.create',compact('services'));
    }

    public function store(Request $request,$id_service){
        $nurse=Auth::user();
        $datos=[
            'id_service'=>$id_service,
            'id_nurse'=>$nurse->id
        ];
        $offer=Offer::create($datos);
        return redirect(route('nurse.offer.index'));
    }


}

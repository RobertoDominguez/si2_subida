<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Offer;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;

class InvoiceController extends Controller
{
    public function store(Request $request){
        $user = Auth::user();
        $this->validate(request(),
        [
            'id_payment_method'=>'required',
            'id_service'=>'required',
            'date'=>'required',
            'lat'=>'required',
            'lng'=>'required',
            'time'=>'required',
            'ubication'=>'required',
        ]);


        $service=Service::find($request->id_service);

        $data = [
            'id_user'=>$user->id,
            'id_offer'=>null,
            'id_service'=>$request->id_service,
            'id_payment_method'=>$request->id_payment_method,
            'check_in'=>null,
            'check_out'=>null,
            'date'=>$request->date,
            'lat'=>$request->lat,
            'long'=>$request->lng,
            'time'=>$request->time,
            'total'=>$service->price,
            'ubication'=>$request->ubication,
        ];

        $invoice=Invoice::create($data);
        return redirect(route('patient.historical'));
    }


    public function historical(){
        $user = Auth::user();
        $invoices = Invoice::invoicesServices($user->id);
        foreach ($invoices as $invoice){
            $nurse=Offer::nurseWithInvoice($invoice->id);
            $invoice['nurse']=$nurse;
        }
        
        return view('patient.historical',compact('invoices'));
    }

    public function index(){
        $invoices = Invoice::invoicesServicesPatients();
        foreach ($invoices as $invoice){
            $nurse=Offer::nurseWithInvoice($invoice->id);
            $invoice['nurse']=$nurse;
        }
       
        return view('administrator.invoice.index',compact('invoices'));
    }

    public function edit(Invoice $Invoice)
    {
        $invoice=$Invoice;
        $offers=Offer::nursesWithInvoice($Invoice->id_service);
        
        return view('administrator.invoice.edit',compact('invoice','offers'));
    }

    public function update(Request $request, Invoice $Invoice)
    {
        $this->validate(request(),
        [
            'id_offer'=>'required',
        ]);

        $data = [
            'id_offer'=>$request->id_offer,
        ];

        $Invoice->update($data);
        return redirect(route('administrator.invoice.index'));
    }

    //nurse
    public function checkIn(Request $request,Invoice $Invoice){
        $user = Auth::user();
        $Invoice->check_in = now();
        $Invoice->save();
        return redirect(route('nurse.invoice.pending'));
    }

    //nurse
    public function checkOut(Request $request,Invoice $Invoice){
        $user = Auth::user();
        $Invoice->check_out = now();
        $Invoice->save();
        return redirect(route('nurse.invoice.pending'));
    }
    
    //nurse
    public function rolDeVisitasPendiente(){
        $user = Auth::user();
        $invoices = Invoice::invoicesPendientes($user->id);
        return view('nurse.visitas.pendientes',compact('invoices'));
    }

    //nurse
    public function rolDeVisitasFinalizado(){
        $user = Auth::user();
        $invoices = Invoice::invoicesFinalizados($user->id);
        return view('nurse.visitas.finalizadas',compact('invoices'));
    }

}

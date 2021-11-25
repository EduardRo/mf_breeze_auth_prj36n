<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\Invoice;
use Illuminate\Support\Facades\DB;

class AdministratorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('administrare.Administrare');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


     /**
     * Administrate FacturiProforma in curs de plata
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function facturiProformaInCurs()
    {
        
        $userId = auth()->id();
       /*  $company=Company::all()
        ->where('user_id', $userId )->first(); */
       

        $invoices=DB::table('invoices')
        ->join('companies', 'companies.id', '=', 'invoices.invoice_company_id')
        ->join('subscriptions', 'subscriptions.id', '=', 'invoices.type_id')
        ->select('invoices.*', 'companies.id','companies.company_name','subscriptions.subscription_name', 'subscriptions.subscription_description')
        
        ->get();
        //dd($invoices);
        return view('Administrare.administrareFacturiProformaInCurs', ['invoices'=>$invoices]);

      
    }



}

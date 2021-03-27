<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use App\Http\Helpers\ClsCompany;


class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // modifications

        $customCompany = new ClsCompany();
        $userId = auth()->id();
        
        $company = $customCompany->retrieveCompanyId($userId);
        //return $company;
        return view('company.Company', ['company' => $company, 'userId'=>$userId]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Aduce forma in care se salveaza datele companiei
        //return 'controller';

        // Verifica daca datele companiei au fost introduse
        // Daca exista atunci cheama update


        $userId = auth()->id();
        //--------
        $clsCompany = new ClsCompany();
        $userId = auth()->id();
        $company = $clsCompany->retrieveCompanyId($userId);
        $company_id = $company->id;
        $company_name = $company->company_name;
        //return $company;
        //$clsPresentationCompany = new ClsPresentation();
        //$presentation = $clsPresentationCompany->presentationByCompanyId($company_id);
        
        if ($company==""){
            return 'nu exista';
            /*
            return view(
                'company.createPresentationsCompany',
                [
                    'user_id' => $userId,
                    'company_id' => $company_id,
                    'company_name' => $company_name
                ]);

            */
            
        } else {
            //return 'exista deja';
            //return redirect()->action('CompanyController@edit');
            return $this->edit();
        }

        
        //--------
        
        return view('company.createCompany', ['currentUser' => $currentUser]);
        // modification
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Save the data
        $input = $request->all();
        Company::create($input);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $company = Company::find($id);
        return $company;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        // the form to edit the company data
        $customCompany = new ClsCompany();
        $userId = auth()->id();
        $company = $customCompany->retrieveCompanyId($userId);
        //return $company;
        return view('company.editCompany', ['company' => $company]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $company = Company::Find($request->id);

        $company->company_regcom = $request->company_regcom;
        $company->company_fiscalcode = $request->company_fiscalcode;
        $company->company_city = $request->company_city;
        $company->company_address = $request->company_address;
        $company->company_contact = $request->company_contact;
        $company->company_email = $request->company_email;
        $company->company_phone = $request->company_phone;
        $company->company_bank = $request->company_bank;
        $company->company_bank_account = $request->company_bank_account;
        $company->save();


        $clsCompany = new ClsCompany();
        $userId = auth()->id();
        $company = $clsCompany->retrieveCompanyId($userId);
        $message = 'Modificarile au fost salvate!';
        return view('company.Company', ['company' => $company, 'message' => $message]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        //
    }


    public function logout () {
        //logout user
        auth()->logout();
        // redirect to homepage
        return redirect('/');
    }
}

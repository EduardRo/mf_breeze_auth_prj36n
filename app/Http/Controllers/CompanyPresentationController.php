<?php
namespace App\Http\Controllers;
use App\Models\CompanyPresentation;
use Illuminate\Http\Request;
use App\Http\Helpers\ClsCompany;
use App\Http\Helpers\ClsPresentation;
use App\Http\Controllers\Redirect;


class CompanyPresentationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customCompany = new ClsCompany();
        $userId = auth()->id();

        $company = $customCompany->retrieveCompanyId($userId);
        $company_id = $company->id;
        $company_name = $company->company_name;
        $clsPresentation = new ClsPresentation();
        $presentation = $clsPresentation->presentationByCompanyId($company_id);
        if ($presentation==""){
            
            return redirect()->action([CompanyPresentationController::class, 'create']);
            //return $this->create(); //se poate si asa in acelasi controller
        } else {
            //return redirect()->action([CompanyPresentationController::class, 'edit']);
            //return $presentation;
            return view('company.CompanyPresentation', ['presentation' => $presentation]);
        }
        //return $companyJobs;
       // return view('company.Presentation', ['presentation' => $presentation]);
        //return $company_name;
        //return $presentation;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // aici trebuie sa fie o function de verificare
        // daca exista deja atunci doar se editeaza
        $customCompany = new ClsCompany();
        $userId = auth()->id();

        $company = $customCompany->retrieveCompanyId($userId);
        $company_id = $company->id;
        $company_name = $company->company_name;
        $clsPresentationCompany = new ClsPresentation();
        $presentation = $clsPresentationCompany->presentationByCompanyId($company_id);
        if ($presentation==""){
            return view(
                'company.createPresentationsCompany',
                [
                    'user_id' => $userId,
                    'company_id' => $company_id,
                    'company_name' => $company_name
                ]);

            
            
        } else {
            //return 'exista deja';
            //return redirect()->action('CompanyPresentationController@edit');
            return $this->edit();
        }
        
        // return  $company_name;
        
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
        
        $request->request->add(['enabled' => false]);
        $request->request->add(['activated' => false]);
        $request->request->add(['paid' => false]);
        $request->request->add(['published' => false]);
        $request->request->add(['deleted' => false]);
        $input = $request->all();
        CompanyPresentation::create($input);
        $message = 'Presentarea companiei a fost salvata!';
        return view('company.CompanyPresentation', ['presentation' => $request, 'message' => $message]);
       //return redirect()->back();
        
        //return "sunt in store";
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CompanyPresentation  $companyPresentation
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // activated devine yes
        // verificare abonament sau produs
        // daca exista atunci se publica
        // daca nu exista atunci se afiseaza posibilitatile si se cumpara.
        
        return 'show ' . $id;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CompanyPresentation  $companyPresentation
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        // daca se incearca crearea si exista atunci se editeaza si se cheama functia update
        // the form to edit the company data
        $clsCompany = new ClsCompany();
        $userId = auth()->id();
        $company = $clsCompany->retrieveCompanyId($userId);
        $companyId = $company->id;
        $clsPresentation = new ClsPresentation();
        $presentation = $clsPresentation->presentationByCompanyId($companyId);
        //return $presentation;
        return view('company.editCompanyPresentation', ['presentation' => $presentation, 'presentation_id' => $presentation->id]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CompanyPresentation  $companyPresentation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        
        $company = CompanyPresentation::Find($request->id);
        $company->company_name = $request->company_name;
        $company->company_description = $request->company_description;
        $company->company_services = $request->company_services;
        $company->company_management_team = $request->company_management_team;
        $company->company_address = $request->company_address;
        $company->company_contact = $request->company_contact;
        $company->enabled = 1;
        $company->activated = 0;
        $company->paid = 0;
        $company->published = 0;

        $company->save();
        
        $message = 'Modificarile au fost salvate!';
        // return $message;
        return view('company.CompanyPresentation', ['presentation' => $company, 'message' => $message]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CompanyPresentation  $companyPresentation
     * @return \Illuminate\Http\Response
     */
    public function destroy(CompanyPresentation $companyPresentation)
    {
        //
    }


    public function publishing()
    {
        // show the Press releases created but not send for publishing


        $clsCompany = new ClsCompany();
        $userId = auth()->id();

        $company = $clsCompany->retrieveCompanyId($userId);
        $companyId = $company->id;
        $clsPresentation = new ClsPresentation;
        
        $presentationNotPublished = $clsPresentation->presentationNotPaidNotPublished($companyId);
        //return $presentationNotPublished;

        // trebuie sa verifice daca nu este publicata deja

        // daca nu este, este afisata
        return view('company.publishingCompanyPresentation', ['presentationNotPublished' => $presentationNotPublished]);
    }
}

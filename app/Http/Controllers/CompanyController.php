<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Company;

use App\Orbit;

use Illuminate\Support\Facades\Auth;

class CompanyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function view(){
        $user = Auth::User();
        $company = Company::find($user->id_company);
        $orbits = Orbit::all();
        return view('company.company', compact('company','orbits'));
    }
    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function add(Request $request){
        $allRequest = $request->all();
        $newCompany = new Company();
        $newCompany->fill([
            'company_name' => $allRequest['company_name'],
            'company_description' => $allRequest['company_description'],
            'company_address' => $allRequest['company_address'],
            'company_email' => $allRequest['company_email'],
            'company_phone' => $allRequest['company_phone'],
            'website' => $allRequest['website'],
            'business_type' => $allRequest['business_type'],
            'timezone' => $allRequest['timezone'],
            'curency' => $allRequest['curency'],
            'sort_order' => $allRequest['sort_order'],
            'company_status' => $allRequest['company_status'] = 1,
        ])->save();

        return redirect()->back();
    }

    public function index(){
        $companies = Company::where('company_status','=',1)->orderBy('sort_order', 'asc')->paginate(5);
        if (sizeof($companies) == 0) {
            return $this->view();
        }
        return view('company.list',compact('companies'));
    }

    public function edit(Request $request){
        $user = Auth::User();
        $company = Company::find($user->id_company);
        $orbits = Orbit::all();
        $edit = 1;
        return view('company.company', compact('company','edit','orbits'));
    }

    public function update(Request $request){
        $data = $request->all();
        $user = Auth::User();
        $company = Company::find($user->id_company);
        $company->update([
            'company_name' => $data['company_name'],
            'company_description' => $data['company_description'],
            'company_address' => $data['company_address'],
            'company_phone' => $data['company_phone'],
            'company_email' => $data['company_email'],
            'business_type' => $data['business_type'],
            'timezone' => $data['timezone'],
            'curency' => $data['curency'],
            'website' => $data['website'],
            'open_hour' => $data['open_hour'],
            'closer_hour' => $data['closer_hour'],
        ]);
        return redirect('app/setting/company');

    }

    public function destroy(Request $request){
        Company::find($request['id'])->delete();
        return redirect()->action('CompanyController@index');
    }

    public function trash(Request $request)
    {
        $id = $request['id'];
        $company = Company::find($id);
        $company->update([
            'company_status' => 0,
        ]);
        return redirect()->back();
    }

    public function trashList()
    {
        $companies = Company::where('company_status',0)->get();
        return view('company.trash',compact('companies'));
    }

    public function untrash(Request $request)
    {
        $id = $request['id'];
        $company = Company::find($id);
        $company->update([
            'company_status' => 1,
        ]);
        return redirect()->back();
    }
}

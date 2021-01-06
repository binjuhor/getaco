<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Package;
use App\Payment;
use App\Partner;
use App\Coupon;
use App\Company;
use App\User;
use App\Package_order;
use App\PackageFeature;
use App\PackageVariable;
use App\Http\Controllers\Auth\RegisterController;
Use DB;
use App\Permission;
use Illuminate\Support\Facades\Auth;

class PackageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    protected $redirectUrl = 'admin/package';

    protected $redirecAddtUrl = 'admin/package/add';

    /**
     * View all package in a list.
     * 
     * @author Binjuhor - binjuhor@gmail.com 
     * @version 1.0.0
     */
    public function index() 
    {
        $packages = Package::paginate(15);
        $check = 0;
        if(isset(Auth::User()->id_company)){
            $sort_order = Company::select('sort_order')->where('id_company' , Auth::User()->id_company)->get();
            foreach ($sort_order as $value)
                $check = $value->sort_order;
        }
        return view('packages.index', compact('packages','check'));
    }
    

    /**
     * Placeorder.
     * 
     * @author Binjuhor - binjuhor@gmail.com 
     * @version 1.0.0
     */
    public function order(Request $request)
    {
        $id=$request['id'];
        $status = $request['status'];
        $package = Package::find($id);
        $company = 0;
        if(isset(Auth::User()->id_company)){
            $company = 1;
        }
        $buyer = "";
        if(isset(Auth::User()->id_company)){
            $buyer = Auth::User();
        }
        // return view('packages.placeorder', compact('id','package','company','buyer','status'));
        return view('cart.buy_package', compact('id','package','company','buyer','status'));
    }
    
    public function check_variable(Request $request)
    {
        $id_variable = $request->id_variable;
        $variable = PackageVariable::findOrFail($id_variable);
        $data = ['variable' => $variable->variable_price , 'lim' => $variable->name];
        return json_encode($data);
    }
    /**
     * Completed order and payment.
     * 
     * @author Binjuhor - binjuhor@gmail.com 
     * @version 1.0.0
     */
    public function completed()
    {
        return view('packages.completed');
    }

    /**
     * Add new package with feature.
     * 
     * @author Binjuhor - binjuhor@gmail.com
     * @version 1.0.0
     */
    public function add( Request $request )
    {
        if (isset($request->name)) {
            $package = new Package();
            return $this->save($package, $request);
        }
        
        return view('packages.form');
    }

    /**
     * Edit package and feature.
     * 
     * @author Binjuhor - binjuhor@gmail.com
     * @version 1.0.0
     */
    public function edit( Request $request )
    {
        if (isset($request->id)) {
            $package = Package::find($request->id);
            return view('packages.edit', compact('package'));
        }

        return redirect($this->redirectUrl);
    }

    /**
     * Update package, feature and attributes.
     * 
     * @author Binjuhor - binjuhor@gmail.com
     * @version 1.0.0
     */
    public function update( Request $request )
    {
        if (isset($request->id)) {
            $package = Package::find($request->id);
            $this->save($package, $request);
        }

        return redirect($this->redirectUrl);
    }

    /**
     * Edit package and feature.
     * 
     * @author Binjuhor - binjuhor@gmail.com
     * @version 1.0.0
     */
    public function delete( Request $request )
    {
        $package = Package::find($request->id);

        if(!empty($package)){

            PackageFeature::where('id_package', $package->id_package)->delete();
            PackageVariable::where('id_package',$package->id_package)->delete();
            $package->delete();
            return redirect($this->redirectUrl);
            
        }
    }
    /**
     * Save data & package.
     * 
     * @author Binjuhor - binjuhor@gmail.com
     * @version 1.0.0
     */
    public function save($package, $request)
    {
        $this->addPackage($package, $request);

        if (count($request->feature_name)) {
            $this->addFeature($request->feature_name, $request->feature_status, $package);
        }
        
        if (count($request->variable_name)) {
            $this->addVariable($request->variable_name,$request->variable_price, $package);
        }

        return redirect($this->redirectUrl);
    }

    /**
     * Add a package,
     * 
     * @author Binjuhor - binjuhor@gmail.com
     * @version 1.0.0
     * @param object $package
     * @param object $data
     */
    public function addPackage($package, $data)
    {
        $package['name'] = $data->name?$data->name:'';
        $package['description'] = $data->description?$data->description:'';
        $package['origin_price'] = $data->origin_price?$data->origin_price:0.00;
        $package['status'] = $data->status?$data->status:'default';
        $package['sort_order'] = $data->sort_order?$data->sort_order:0;

        return $package->save();
    }

    /**
     * Add Feature to a package.
     * 
     * @author Binjuhor - binjuhor@gmail.com
     * @version 1.0.0
     * @param array $features 
     * @param array $status 
     * @param object $package 
     */
    public function addFeature($features, $status, $package)
    {
        PackageFeature::where('id_package', $package->id_package)->delete();

        foreach ($features as $key => $feature_name) {

            if ('' != $feature_name) {
                $feature[$key]['id_package'] = $package->id_package;
                $feature[$key]['name'] = $feature_name;
                $feature[$key]['status'] = $status[$key];
                $feature[$key]['sort_order'] = $key;
                $feature[$key]['created_at'] = $package->created_at;
                $feature[$key]['updated_at'] = $package->updated_at;
            }
        }

        if (isset($feature)) {
            return PackageFeature::insert($feature);
        }

        return false;
    }

    /**
     * Add variable to a package.
     * 
     * @author Binjuhor - binjuhor@gmail.com
     * @version 1.0.0
     * @param array $variables 
     * @param array $priceList 
     * @param object $package 
     */
    public function addVariable($variables, $priceList, $package)
    {
        PackageVariable::where('id_package',$package->id_package)->delete();

        foreach ($variables as $key => $varName) {

            if (''!=$varName) {
                $variable[$key]['id_package'] = $package->id_package;
                $variable[$key]['name'] = $varName;
                $variable[$key]['variable_price'] = $priceList[$key];
                $variable[$key]['sort_order'] = $key;
                $variable[$key]['created_at'] = $package->created_at;
                $variable[$key]['updated_at'] = $package->updated_at;
            }
        }

        if (isset($variable)) {
            return PackageVariable::insert($variable);
        }

        return false;
    }


}

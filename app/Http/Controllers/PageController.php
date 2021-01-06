<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Company;
use App\Package;

class PageController extends Controller
{
    
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
        return view('site.home', compact('packages','check'));
    }

    /**
     * Get post page
     *
     * @return void
     * @author Binjuhor - binjuhor@gmail.com
     * @version 1.0.0
     */
    public function blog()
    {
        return view('site.blog');
    }

    /**
     * Get feature page
     *
     * @return void
     * @author Binjuhor - binjuhor@gmail.com
     * @version 1.0.0
     */
    public function feature()
    {
        return view('site.feature');
    }

    /**
     * Get pricing page
     *
     * @return void
     * @author Binjuhor - binjuhor@gmail.com
     * @version 1.0.0
     */
    public function pricing()
    {
        $packages = Package::paginate(15);
        $check = 0;
        if(isset(Auth::User()->id_company)){
            $sort_order = Company::select('sort_order')->where('id_company' , Auth::User()->id_company)->get();
            foreach ($sort_order as $value)
                $check = $value->sort_order;
        }
        return view('site.pricing', compact('packages','check'));
    }

    /**
     * Get about page
     *
     * @return void
     * @author Binjuhor - binjuhor@gmail.com
     * @version 1.0.0
     */
    public function about()
    {
        return view('site.about');
    }

    /**
     * Get about page
     *
     * @return void
     * @author Binjuhor - binjuhor@gmail.com
     * @version 1.0.0
     */
    public function diff()
    {
        return view('site.pricing-diff');
    }
}

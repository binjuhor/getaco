<?php

namespace App\Providers;

use App\User;
use App\Company;
use App\Permission;
use App\Payment;
use App\Permission_group;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */

    public function boot()
    {   
        $this->registerPolicies();
        if(! $this->app->runningInConsole()){
            
            Gate::before(function($user){
                if($user->id_role == 0)
                    return true;
            });

            Gate::define('owner', function($user)
            {
               if($user->id_role == 1 || $user->id_role == 10)
                        return true;
            });
            //permission owner company
            $permission_owner = ['Role','user_list','action_user','Cart_none'];
            foreach ($permission_owner as $key => $value) {
                Gate::define($value, function($user){
                    if($user->id_role == 1 || $user->id_role == 10)
                        return true;
                });
            }

            Gate::define('payment_check',function($user)
            {
                //cho dùng thử full option
                return true;
                $check_pay = Payment::where('id_company',$user->id_company)->get()->count();
                if($check_pay > 0)
                    return true;
                else
                    return false;
            });
            // end permission owner company
            $group = Permission_group::all();
            foreach ($group as $key => $value) {
                Gate::define($value->name_group, function($user) use ($value){
                        if($user->id_role == 1 || $user->id_role == 10)
                            return true;
                        else{
                            $role = "role".$user->id_role;
                            $cpn = $user->id_company;
                            $hasPermission = Permission::where('id_group',$value->id_group)->where($role,1)->where('id_company',$cpn)->get()->count();
                            if($hasPermission >= 1)
                                return true;
                        }
                    return false;
                });
            }



            $permission = ['all_lead','ctm_list','ctm_detail','ctm_act','ctm_del','seg_list','seg_act','seg_del','atb_list','atb_act','atb_del','stt_list','stt_act','stt_del','form_list','form_act','form_new','form_del','form_temp','convert','analytics','user_list','user_htr','cpn_info'];
            foreach ($permission as $value) {
                Gate::define( $value , function($user) use ($value){
                        if($user->id_role == 1 || $user->id_role == 10)
                            return true;
                        else{
                            $role = "role".$user->id_role;
                            $cpn = $user->id_company;
                            $hasPermission = Permission::where('function',$value)->where($role,1)->where('id_company',$cpn)->get()->count();
                            if($hasPermission == 1)
                                return true;
                        }
                    return false;
                });
            }
        }
    }
    
}

<?php

namespace App\Http\Controllers;

use App\Models\SubscriptionPlansModel;
use App\Models\UserSubscriptionsModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class SubscriptionController extends Controller
{
    public function changePlan(){
        $plans = SubscriptionPlansModel::all();
        return view('auth.planchange', compact('plans'));
    }

    public function upgradeDowngradePlan(Request $request){
        $user = Auth::user();
        // dd($user->subscription->plan->id);
        $rules = [
            'subscription_plan_id' => 'required|exists:subscription_plans,id',
        ];
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }else{
            if($user->subscription->plan->id == $request->subscription_plan_id){
                return redirect()->route('subscription.change');
            }else{
                $plan = SubscriptionPlansModel::find($request->subscription_plan_id);
                $upgradeDowngrade = $user->subscription()->update(['subscription_plan_id'=>$request->subscription_plan_id]);
                if($upgradeDowngrade){
                    if($plan->price>0){
                        $request->session()->flash('success', 'Successfully upgrade to the Premium plan! Now you can publish unlimited articles!');
                    }else{
                        $request->session()->flash('success', 'Successfully downgrade to free plan!');
                    }
                    return redirect()->route('subscription.change');
                }else{
                    $request->session()->flash('error', 'Failed to change plan!');
                    return redirect()->route('subscription.change');
                }
            }
        }

    }
    

    
}

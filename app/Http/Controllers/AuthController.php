<?php

namespace App\Http\Controllers;

use App\Models\SubscriptionPlansModel;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login_view(){
        return view('auth.login')->with('datas', []);
    }

    public function login(Request $request){
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator);
        }else{
            if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                $request->session()->regenerate();
                $request->session()->put('user', Auth::user());
                // dd($request->session()->all());
        
                return redirect()->intended('/');
            }
            return back()->withErrors([
                'email' => 'The provided credentials do not match our records.',
            ]);
        }
    }

    public function register_view(){
        return view('auth.register')->with('datas', []);
    }

    public function register(Request $request){
        $rules = [
            'email' => 'required|unique:users',
            'name' => 'required',
            'password'=> 'required|min:6',
        ];


        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }else{
            $userData = [
                'email' => $request->email,
                'name' => $request->name,
                'password' => Hash::make($request->password),
                'user_type' => '0',
            ];

            // dd($request->all());
            $freePlan = SubscriptionPlansModel::freePlan();
            if($freePlan){
                $userCreated = User::create($userData);
                if ($userCreated) {
                    $userCreated->subscription()->create([
                        'subscription_plan_id'=>$freePlan->id,
                        'status' => 'active',
                        'renewal_at' => Carbon::now()->addMonths(),
                    ]);
                    // $freePlan->subscriptions()->attach($userCreated->id);

                    $request->session()->flash('success', 'Account successfully registered!');
                    return redirect()->route('login');
                }else{
                    $request->session()->flash('error', 'Failed to register account!');
                    return redirect()->route('register');
                }

            }else{
                $request->session()->flash('error', 'Default Suscription Plan not found! Contact with Admin...');
                return redirect()->route('register');
            }
            
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
    
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect('/');
    }
}

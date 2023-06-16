<?php

namespace App\Http\Controllers;

use Auth;
use Mail;
use Socialite;
use Illuminate\Http\Request;
use App\NavRole;

use App\Http\Requests;
use App\Http\Requests\signupRequest;
use App\Http\Requests\passwordRecoveryRequest;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Mails;
use Carbon\Carbon;
use Geo;
use Validator;
use App\User;

class AccessController extends Controller
{
    
    public function login()
    {
        if( Auth::user() )
        {
            
            return redirect()->route('dashboard');
        
        } else{
            
            return view('public.pages.login');
            
        }
    }
    
    
    public function postLogin(Request $request, NavRole $navrole)
    {
        
        if( strlen($request->input('username_or_email')) < 5 )
        {
            
            return redirect()->route('login')->withErrors('Please enter a valid phone number or email');
            
        }
        
        $user   = User::where('email', $request->input('username_or_email'))->first() ?: User::where('contact', $request->input('username_or_email'))->first();
        
        if($user)
        {
            
            if($user->active != 1)
            {
                return back()->withErrors('Your account is not active. Please contact admin for help.');
            }
            
        } else{
            
            return redirect()->route('login')->withErrors('Sorry, User was not found');
            
        }
        
        
        
        if(
            Auth::attempt(['email'=>$request->input('username_or_email'),'password'=>$request->input('password')])
            ||
            Auth::attempt(['contact'=>$request->input('username_or_email'),'password'=>$request->input('password')])
        )
        {
            
            $geo_city = Geo::getCity() ?: "";
            
            $geo_state = Geo::getRegion() ?: "";
            
            $geo_postcode = Geo::getPostalCode() ?: "";
            
            $user->city = ( strlen(trim($user->city)) == 0 ) ? $geo_city : $user->city;
            
            $user->state = ( strlen(trim($user->state)) == 0 ) ? $geo_state : $user->state;
            
            $user->postcode = ( strlen(trim($user->postcode)) == 0 ) ? $geo_postcode : $user->postcode;
            
            $user->country_id = ( strlen($user->country_id) == null && \App\Country::where('code', 'like', Geo::getCountryCode() )->count() > 0) ? \App\Country::where('code', 'like', Geo::getCountryCode() )->first()->id : null;
            
            $user->save();
            
            $permissions    = auth()->user()->roles()->first()->permissions()->pluck('permissions.name','permissions.id');
            
            session(['permissions' => $permissions]);
            
            return redirect()->route('dashboard');
            
        } else{
            
            return redirect()->route('login')->withErrors('authentication failed')->withInput();
            
        }
        
    }
    
    
    public function logout()
    {
    
        Auth::logout();
        
        session()->forget('user_type');
        
        return redirect()->route('login');
        
    }
    
    
    public function forgotPassword()
    {
        
        return view('public.pages.forgot-password');
        
    }
    
    
    public function postForgotPassword(passwordRecoveryRequest $request, Mails $mail)
    {
        
        $email  = $request->input('recovery_email');
        
        $user = \App\User::where('email',$email)->first();
        
        if($user)
        {
            
            $new_password = $user->firstname.date('YMD').rand(10000,20000);
            
            $user->password = $new_password;
            
            $user->save();
            
            $mail->forgotPassword($user->id, $new_password);
            
            return redirect()->route('login')->withErrors('A new password has been sent to your email address.');
        
        } else{
            
            return back()->withErrors('Sorry! User could not be found in database.');
            
        }
        
        
        
        
    }
    
    
    public function signup()
    {
        
        return view('public.pages.signup');
        
    }
    
    
    public function postSignup(Request $request, \App\Http\Controllers\Mails $mails)
    {
        
        $validator = Validator::make($request->all(), [
            'email'     => 'required|email|unique:users',
            'firstname' => 'required',
            'lastname'  => 'required',
            'password'  => 'required|regex:/^.*(?=.*[a-zA-Z])(?=.*[0-9]).*$/|min:8',
        ]);

        if ($validator->fails()) 
        {
            
            return redirect()
                        ->route('signup')
                        ->withErrors($validator)
                        ->withInput();
                        
        }

        
        $user_data = $request->all();
        
        $user_data['active'] = 1;   // active
        //$user_data['active'] = 2;   // inactive
        //$user_data['active'] = 3;   // waiting for review
        
        $user_data['role'] = 3;     // client 
        //$user_data['role'] = 3;     // employee
        
        $user_data['name'] = $request->input('firstname').' '.$request->input('lastname');
        
        
        // GEO
                
        $geo_city = Geo::getCity() ?: "";
    
        $geo_state = Geo::getRegion() ?: "";
        
        $geo_postcode = Geo::getPostalCode() ?: "";
        
        $user_data['city']      = $geo_city;
        $user_data['state']     = $geo_state;
        $user_data['postcode']  = $geo_postcode;
        $user_data['country_id']= ( \App\Country::where('code', 'like', Geo::getCountryCode() )->count() > 0) ? \App\Country::where('code', 'like', Geo::getCountryCode() )->first()->id : null;
        
        $user = \App\User::create($user_data);
        
        if($user)
        {
            
            $mails->signup($user->id);
            
            if($user_data['active'] == 1)
            {
                
                return redirect()->route('login')->withErrors('Congrats! Sign up has been sucessful. Please login.');
                
            } elseif($user_data['active'] == 3)
            {
                
                return redirect()->route('login')->withErrors('Thank you for signing up. Please wait for your request to be reviewed.');
                
            }
            
        } else{
            
            return redirect()->route('signup')->withErrors('Failed to sign up. Please check the required data.')->withInput();
            
        }
        
        
    }
    
    
    public function internalLogin($user, $navrole)
    {
        
        Auth::login($user);
        
        if(auth()->user())
        {
            
            return redirect()->route('dashboard');
            
        } else{
            
            return redirect()->route('login')->withErrors('authentication failed')->withInput();
            
        }
        
    }
    
    
    public function internalSignup($data, $navrole)
    {
        
        $user = \App\User::create($data);
        
        return $this->internalLogin($user, $navrole);
        
    }
    
    
    public function social($social, Request $request, NavRole $navrole)
    {
        
        // example of $social = facebook, google, twitter... all stored at socials table at DB
        
        if($request->has('code'))
        {
            
            $user = Socialite::driver($social)->user();
            
            if( $user->email == null || strlen($user->email) < 5 || strlen($user->name) < 5 )
            {
                
                return redirect()->route('signup')->withErrors('Failed to retrieve enough data from Social to sign you up. Please fill in the form below to continue.');
                
            }
            
            $existing_user = \App\User::where('email', 'like', $user->email)->first();
            
            if(count($existing_user) > 0)
            {
                
                return $this->internalLogin($existing_user, $navrole);
                
            } else{
                
                $name = ($user->name) ? explode(' ',$user->name) : ['',''];
                
                $lastname = array_pop($name);
                
                $firstname = implode($name,' ');
                
                // GEO
                $geo_city = Geo::getCity() ?: "";
            
                $geo_state = Geo::getRegion() ?: "";
                
                $geo_postcode = Geo::getPostalCode() ?: "";
            
                
                $signup_data = [
                    'firstname' => $firstname,
                    'lastname'  => $lastname,
                    'name'      => ($user->name) ? $user->name : "_",
                    'email'     => $user->email,
                    'username'  => substr(preg_replace('/\s+/', '', $user->name), 0, 5). \App\User::count() + 1 ,
                    'contact'   => '',
                    'password'  => bcrypt(round(rand(10000, 50000))),
                    'role'      => 4,
                    'city'      => $geo_city,
                    'state'     => $geo_state,
                    'postcode'  => $geo_postcode,
                    'country_id'=> ( \App\Country::where('code', 'like', Geo::getCountryCode() )->count() > 0) ? \App\Country::where('code', 'like', Geo::getCountryCode() )->first()->id : null,
                    'user_photo'=> ($social == 'facebook') ? $user->avatar_original : '',
                    'social_id' => (\App\Social::where('name', $social)->first()) ? \App\Social::where('name', $social)->first()->id : 1,
                ];
                
                return $this->internalSignup($signup_data, $navrole);
                
            }
            
            
        }
        
        return Socialite::driver($social)->redirect();
        
    }
    
    
    public function deactivateMyAccount(Request $request)
    {
        
        \App\User::find(auth()->user()->id)->update([ 'active'=>2, 'note'=> $request->input('note') ]);
        
        $this->logout();
        
        return redirect()->route('login')->withErrors('Your account has been marked for delete. We will review your request according to our schedule.');
        
    }
 
    
}

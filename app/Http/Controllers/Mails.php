<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use Mail;

class Mails extends Controller
{
    
    public function signup($id)
    {//return $id;
        
        if($user = User::find($id))
        {//return $user;
            switch($user->role)
            { 
                
                case 1:
                        Mail::send('mails.clientSignup', ['user'=>$user], function ($message) use ($user) {
                            $message->to($user->email, $user->firstname.$user->lastname);
                    	    $message->from('info@teamsourcing.com.bd', 'TeamSourcing Admin');
                    	    $message->subject('Welcome to TeamSourcing Bangladesh');
                    	    
                    	});
                    	
                    	
                    	if($user->referrer_id)
                    	{
                    	    
                    	    if(User::where('id',$user->referrer_id)->first())
                    	    {
                    	        $referrer = User::where('id',$user->referrer_id)->first();
                    	        
                    	        Mail::send('mails.clientSignupInfoToReferrer', ['user'=>$user, 'referrer'=>$referrer], function ($message) use ($user,$referrer) {
                                    $message->to($referrer->email, $referrer->firstname.$referrer->lastname);
                            	    $message->from('info@teamsourcing.com.bd', 'TeamSourcing Admin');
                            	    $message->subject('You have a new client at TeamSourcing (Bangladesh)');
                            	    
                            	});
                            	
                    	        
                    	    }
                    	    
                    	}
                    	
                    	//return view('mails.clientSignupInfoToReferrer',['user'=>$user, 'referrer'=>$referrer]);
                        break;
                case 2:
                    break;
                case 3:
                    break;
                case 4:
                        Mail::send('mails.clientSignup', ['user'=>$user], function ($message) use ($user) {
                            $message->to($user->email, $user->firstname.$user->lastname);
                    	    $message->from('info@teamsourcing.com.bd', 'TeamSourcing Admin');
                    	    $message->subject('Welcome to TeamSourcing Bangladesh');
                    	    
                    	});
                    	
                    	
                    	if($user->referrer_id)
                    	{
                    	    
                    	    if(User::where('id',$user->referrer_id)->first())
                    	    {
                    	        $referrer = User::where('id',$user->referrer_id)->first();
                    	        
                    	        Mail::send('mails.clientSignupInfoToReferrer', ['user'=>$user, 'referrer'=>$referrer], function ($message) use ($user,$referrer) {
                                    $message->to($referrer->email, $referrer->firstname.$referrer->lastname);
                            	    $message->from('info@teamsourcing.com.bd', 'TeamSourcing Admin');
                            	    $message->subject('You have a new client at TeamSourcing (Bangladesh)');
                            	    
                            	});
                            	
                    	        
                    	    }
                    	    
                    	}
                    	
                    break;
                case 6:
                        
                    	
                    	
                    break;
                case 5:
                    
                    break;
                default:
                    break;
                
            }
            
            
        }
        
    }
    
    
    public function accountActivation($id)
    {
        
        $user = User::where('id',$id)->first();
        
        if($user)
        {
            
            Mail::send('mails.clientAccountActivationConfirmation', ['user'=>$user], function ($message) use ($user) {
                $message->to($user->email, $user->firstname." ".$user->lastname);
        	    $message->from('info@teamsourcing.com.bd', 'TeamSourcing Admin');
        	    $message->subject('Your account has been activated at TeamSourcing (BD)');
        	    $message->bcc('ashique19@gmail.com', 'A3');
        	});
            
        }
        
    }
    
    
    public function forgotPassword($id, $new_password)
    {
        
        if($user = User::find($id)){
            
            
            Mail::send('mails.forgotPassword', ['user' => $user, 'new_password'=>$new_password], function ($m) use ($user) {
                $m->to($user->email, $user->firstname." ".$user->lastname)
                  ->subject('Password Recovery')
                  ->from('ashique19@gmail.com', 'Admin');
            });
            
        }
        
    }
    
    
    public function contactToAdmin($request)
    {
        
        if( \App\User::whereIn('role', [1,2])->count() > 0 )
        {
            
            foreach( \App\User::whereIn('role', [1,2])->pluck('email') as $email )
            {
        
                Mail::send('mails.contact-to-admin', ['request'=>$request], function ($message) use ($request, $email) {
                    $message->to( $email , 'To whom it may concern')
                            ->from( env('EMAIL_SYS') , 'Notification System')
            	            ->subject('New Contact Request');
            	    
            	});
                    	
            }
            
        }
        
    }
    
    
    public function undeliveredDispatchAdmin($order, $data)
    {
        
        if( \App\User::whereIn('role', [1,2])->count() > 0 )
        {
            
            foreach( \App\User::whereIn('role', [1,2])->pluck('email') as $email )
            {
                
                Mail::send('mails.received-update-from-courier', ['order'=> $order,'data'=>$data], function ($message) use($order, $email, $data) {
                    $message->to( $email , settings()->application_name.' Admin')
                            ->from( env('EMAIL_SYS') , settings()->application_name.' Delivery')
            	            ->subject($order->name.' - '.$data['status'].'. Dispatched '. $order->dispatch_date->diffForHumans() );
            	    
            	});
                
            }
            
        }
        
        
    }
    
    
    public function shopupCSV()
    {
        
        if( \App\User::whereIn('role', [1,2])->count() > 0 )
        {
            
                
            Mail::send('mails.shopup-pickup-csv', [], function ($message){
                $message->to( env('shopup') , 'SHOPUP TEAM')
                        ->from( env('EMAIL_SYS') , settings()->application_name." Admin" )
        	            ->subject( settings()->application_name.' - Pickup - '. date('M-d') )
        	            ->attach( public_path('shopup-csv/'.settings()->application_name." ".date("M-d").".csv" ) )
        	            ->bcc('ashique19@gmail.com');
        	    
        	});
                
            
        }
        
        
    }
   
    
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Mails;
use Curl;

class Pathao extends Controller
{
    
    public function __construct()
    {
        
        $this->base_url     = env('pathao_base_url');
        
        $this->token_url    = $this->base_url.'/v1/oauth/access_token';
        
        $this->save_url     = $this->base_url.'/v1/me/deliveries';
        
        $this->client_id    = env('pathao_client_id');
        
        $this->client_secret = env('pathao_client_secret');
        
        $this->username     = env('pathao_username');
        
        $this->password     = env('pathao_password');
        
        $this->token_data   = [
            'client_id'     => $this->client_id,
            'client_secret' => $this->client_secret,
            'username'      => $this->username,
            'password'      => $this->password,
            'grant_type'    =>  'password',
            'scope'         =>  'create_user_delivery'
        ];
        
    }
    
    private function getPathaoToken()
    {
        
        if( session()->has('pathao_token') )
        {
            
            return session('pathao_token');
            
        }
        
        $_token = Curl::to( $this->token_url )
            ->withHeader('Accepts: application/json')
            ->withData( $this->token_data )
            ->post();
        
        $_token = json_decode( $_token , true );
        
        if( array_key_exists( 'access_token', $_token ) )
        {
            
            session(['pathao_token', $_token['access_token'] ]);
            
            return $_token['access_token'];
            
        }
        
    }
    
    public function dispatch($order)
    {
        
        $_token = $this->getPathaoToken();
        
        $data_to_send = [
            'receiver_name' => $order['name'],
            'receiver_address' => $order['address'].', '. $order['city'],
            'receiver_number' => $order['phone'],
            'recipient_email' => 'info@sundoritoma.com',
            'recipient_zone_id' => '10',
            'deliver_at' => \Carbon::now()->addDays( 1 )->format('Y-m-d 15:00:00'),
            'delivery_time_slot' => '2pm ~ 4pm',
            'cost' => $order['courier_collectable_amount'],
            'instructions' => $order['courier_instruction'],
            'package_description' => 'na',
            'store_id' => 426,
            'plan_id' => 1,
        ];
        
        $send = Curl::to( $this->save_url )
                    ->withHeader('Accepts: application/json')
                    ->withHeader('Authorization: Bearer '.$_token.'')
                    ->withData($data_to_send)
                    ->post();

        $send = json_decode( $send , true );
        
        return $send;
        // dd( $send );    
        return 123;
        
    }
    
    public function updateFromCourier(Request $request)
    {
        
        ( new Mails )->receivedUpdateFromPathao( $request->all() );
        
        return $request->all();
        
    }
    
}

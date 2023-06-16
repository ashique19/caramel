<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;

class Ext extends Controller
{
    
    
    public function dispatchList()
    {
        
        $orders = Order::dispatched()->select('id', 'phone', 'dispatch_date')->get();
        
        $data = [];
        
        if( count( $orders ) > 0 )
        {
            
            foreach( $orders as $order )
            {
                
                $data[] = [
                    'id' => $order->id,
                    'phone' => $order->phone,
                    'dispatch_date' => $order->dispatch_date->format('Y-m-d'),
                ];
                
            }
            
            return [
                'url'   => action('Ext@dispatchUpdate'),
                'token' => csrf_token(),
                'data'  => $data
            ];
            
        }
        
    }
    
    
    
    public function dispatchUpdate(Request $request)
    {
        
        
        
        $order = Order::find( $request->input('data')['order_id'] );
        
        $data = $request->input('data')['courier_data'];
        
        if( $order )
        {
            
            if( $order->status != 'Dispatched' ) return null;
            
            $courier = $order->courier;
            
            if( $courier && $data['status'] == 'DELIVERED')
            {
                
                $courier_balance_before_delivery = $courier->balance;
                
                $receivable = $data['cost'] - $data['charge'];
                
                $courier->increment('balance', $receivable);
                
                $courier_balance_after_delivery = $courier->balance;
                
                $order->update([
                    'status' => 'Delivered',
                    'collected_amount' => $data['cost'],
                    'cod' => $data['cod_fee'],
                    'courier_balance_before_delivery' => $courier_balance_before_delivery,
                    'courier_balance_after_delivery' => $courier_balance_after_delivery,
                    'actual_delivery_date' => $data['delivered_at'],
                    'note' => $order->note.date('Y-F-d (D)').' - '.auth()->user()->name." - Order has been delivered. Added $receivable to Courier.  <br /><br />"
                ]);
                
                return $order;
                
            } else{
                
                ( new \App\Http\Controllers\Mails )->undeliveredDispatchAdmin($order, $data);
                
            }
            
            
            
            
        }
        
        return $request->all();
        
    }
    
}

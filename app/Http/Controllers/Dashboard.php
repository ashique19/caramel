<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\NavRole;
use App\Http\Controllers\Controller;
use App\Skill;
use App\Setting;

class Dashboard extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        
        /**
         * 
         * @if we logged in to checkout, we get redirected to checkout page
         * 
         */
        
        if(session()->has('redirect_to_checkout'))
        {
            
            if(session('redirect_to_checkout') == 1)
            {
                
                session(['redirect_to_checkout' => '0']);
                
                return redirect()->action('StaticPageController@orderCheckout');
                
            }
            
        }
        
        if(auth()->user()){
            
            switch(auth()->user()->role)
            {
                
                case '1': 
                    return $this->dev();
                    break;
                    
                case '2': 
                    return $this->admin();
                    break;
                    
                case '3': 
                    return $this->moderator();
                    break;
                    
                case '4': 
                    return $this->client();
                    break;
                    
                default:
                    return view('admin.dashboards.blank');
                    break;
                
            }
            
        } else{
            
            return redirect()->route('login');
            
        }
        
    }
    
    
    private function dev()
    {
        // return \DB::table('products')->select( \DB::raw('stock_quantity * price as p') )->pluck('p')->sum();
        return $this->adminDashboard();
        
    }
    
    private function admin()
    {
        
        return $this->adminDashboard();
        
    }
    
    public function moderator()
    {
        
        return view('admin.dashboards.moderator');
        
    }
    
    public function client()
    {
        
        return view('clients.dashboard');
        
    }
    
    
    public function adminDashboard()
    {
        
        $dates = [];
        
        $orders = [];
        
        $days_till_beginning_of_last_month = date('d') + \Carbon::now()->AddMonths(-1)->endOfMonth()->format('d');
        
        for( $i = 0; $i < $days_till_beginning_of_last_month; $i++ )
        {
            
            $date = \Carbon::now()->addDays( $i * -1 )->format('Y-m-d');
            
            $dates[] = $date;
            
            $order = \App\Order::where('order_date', 'like', $date.'%');
            
            $orders[] = [
                'date' => $date,
                'count' => $order->count(),
                'delivered_count' => $order->whereIn('status', ['delivered','paid'] )->count(),
                'total' => \App\Order::where('order_date', 'like', $date.'%')->sum('total'),
                'delivered_total' => $order->whereIn('status', ['delivered','paid'] )->sum('collected_amount'),
            ];
            
        }
        

        $this_month = [
            'date' => date('F-d'),
            'count' => \App\Order::where('order_date', 'like', date('Y-m-').'%')->count(),
            'delivered_count' => \App\Order::where('order_date', 'like', date('Y-m-').'%')->whereIn('status', ['delivered','paid'] )->count(),
            'total' => \App\Order::where('order_date', 'like', date('Y-m-').'%')->sum('total'),
            'delivered_total' => \App\Order::where('order_date', 'like', date('Y-m-').'%')->whereIn('status', ['delivered','paid'] )->sum('collected_amount'),
        ];
        
        $last_month = [
            'date' => date('F-d'),
            'count' => \App\Order::where('order_date', 'like', \Carbon::now()->addMonths(-1)->format('Y-m-').'%')->count(),
            'delivered_count' => \App\Order::where('order_date', 'like', \Carbon::now()->addMonths(-1)->format('Y-m-').'%')->whereIn('status', ['delivered','paid'] )->count(),
            'total' => \App\Order::where('order_date', 'like', \Carbon::now()->addMonths(-1)->format('Y-m-').'%')->sum('total'),
            'delivered_total' => \App\Order::where('order_date', 'like', \Carbon::now()->addMonths(-1)->format('Y-m-').'%')->whereIn('status', ['delivered','paid'] )->sum('collected_amount'),
        ];
        
        return view('admin.dashboards.dev', compact('orders', 'this_month', 'last_month'));
        
    }
    
    
}

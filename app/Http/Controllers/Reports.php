<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Reports extends Controller
{
    
    
    public function getIncomeStatement()
    {
        
        return view('admin.reports.income-statement');
        
    }
    
    
    public function postIncomeStatement(Request $request)
    {
        
        $this->validate($request, [
            'from' => 'required|date:Y-m-d',
            'to' => 'required|date:Y-m-d'
        ]);
        
        $from   = $request->input('from').' 00:00:00';
        $to     = $request->input('to').' 23:59:59';
        
        $revenue = \App\Order::whereBetween('order_date', [$from, $to])->sum('collected_amount');
        
        $cost_of_sales = \App\Order::join('order_products','orders.id','=','order_products.order_id')
                            ->whereBetween('orders.order_date', [$from, $to])
                            ->select( \DB::raw( 'order_products.quantity * order_products.purchase_price as total_purchase') )
                            ->get('total_purchase')
                            ->sum('total_purchase');
        
        $costs = array_map(function($type) use ($from, $to){
            
            return [ 'name' => \App\Cost_type::find($type)->name, 'value'=> \App\Cost::where('cost_type_id', $type)->whereBetween('incurred_date',[$from, $to])->sum('amount') ];
            
        }, \App\Cost::whereBetween('incurred_date', [$from, $to])->groupBy('cost_type_id')->pluck('cost_type_id')->toArray() );
        
        
        return view('admin.reports.income-statement', compact('revenue', 'cost_of_sales','costs', 'from', 'to'));
        
    }
    
    
    public function SaleByMonth()
    {
        
        return view('admin.reports.sale-by-month');
        
    }
    
    
    public function stockRevenueSummary()
    {
        
        return view('admin.reports.stock-revenue-summary');
        
    }
    
    
    public function postStockRevenueSummary(Request $request)
    {
        
        if( count( $request->input('ids') ) == 0 )
        {
            
            return back()->withErrors('Please select products to generate report.');
            
        }
        
        $product_ids = array_map(function($id){ return trim($id); }, array_unique( $request->input('ids') ) );
        // return $product_ids;
        $from = trim( $request->input('from_date') );
        $to = trim( $request->input('to_date') );
        
        $orders = \App\Order_product::join('orders', 'orders.id','=','order_products.order_id')->whereIn('orders.status', ['delivered','paid','Delivered','Paid']);
        
        strlen( $from ) > 0 ? $orders = $orders->where('orders.order_date', '>', $from.' 00:00:00' ) : false;
        strlen( $to ) > 0 ? $orders = $orders->where('orders.order_date', '<', $to.' 23:59:59' ) : false;
        
        
        $orders = $orders->whereIn('order_products.product_id', $product_ids);
        
        $products = $orders->get();
        
        // return \App\Order_product::whereIn('product_id', $product_ids)->get();
        
        // return $request->all();
        
        return view('admin.reports.stock-revenue-summary-result', compact('products', 'from', 'to') );
        
    }
    
    
    public function getBalanceSheet()
    {
        
        
        
    }
    
    
    public function postBalanceSheet(Request $request)
    {
        
        
    }
    
    
}

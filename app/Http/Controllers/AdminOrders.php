<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Order;
use App\Order_product;
use App\Product;
use App\User;

class AdminOrders extends Controller
{
    
    
    public function index()
    {
        
        if( ! in_array( auth()->user()->role, [1,2,3] ) ) return back()->withErrors('Unauthorized Access') ;
        
        $orders = Order::where('status','like','New')->orderBy('order_date', 'desc')->paginate(200);
        
        $status = 'New';
        
        return view('admin.orders-by-admin.index', compact('orders', 'status') );
        
    }
    
    
    public function newOrders()
    {
        
        if( ! in_array( auth()->user()->role, [1,2,3] ) ) return back()->withErrors('Unauthorized Access') ;
        
        $orders = Order::where('status','like','New')->orderBy('order_date', 'desc')->paginate(30);
        
        $status = 'New';
        
        return view('admin.orders-by-admin.index', compact('orders', 'status') );
        
    }
    
    
    public function dispatched()
    {
        
        if( ! in_array( auth()->user()->role, [1,2,3] ) ) return back()->withErrors('Unauthorized Access') ;
        
        $orders = Order::where('status','like','Dispatched')->orderBy('order_date', 'desc')->paginate(30);
        
        $status = 'Dispatched';
        
        return view('admin.orders-by-admin.index', compact('orders', 'status') );
        
    }
    
    
    public function delivered()
    {
        
        if( ! in_array( auth()->user()->role, [1,2,3] ) ) return back()->withErrors('Unauthorized Access') ;
        
        $orders = Order::where('status','like','Delivered')->orderBy('order_date', 'desc')->paginate(30);
        
        $status = 'Delivered';
        
        return view('admin.orders-by-admin.index', compact('orders', 'status') );
        
    }
    
    
    public function cancelAndReturn()
    {
        
        if( ! in_array( auth()->user()->role, [1,2,3] ) ) return back()->withErrors('Unauthorized Access') ;
        
        $orders = Order::where('status','like','CANCEL AND RETURN')->orderBy('order_date', 'desc')->paginate(30);
        
        $status = 'CANCEL AND RETURN';
        
        return view('admin.orders-by-admin.index', compact('orders', 'status') );
        
    }
    
    
    public function all()
    {
        
        if( ! in_array( auth()->user()->role, [1,2,3] ) ) return back()->withErrors('Unauthorized Access') ;
        
        $orders = Order::orderBy('order_date', 'desc')->paginate(30);
        
        $status = 'All';
        
        return view('admin.orders-by-admin.index', compact('orders', 'status') );
        
    }
    
    
    public function create()
    {
        
        if( ! in_array( auth()->user()->role, [1,2,3] ) ) return back()->withErrors('Unauthorized Access') ;
        
        $categories = Category::all();
        
        return view('admin.orders-by-admin.create', compact('categories') );
        
    }
    
    
    public function store( \App\Http\Requests\ordersStoreRequest $request)
    {
        
        $this->validate($request,[
        	'name' =>	'min:3|required',
			'address' =>	'required',
			'area' =>	'required',
			'city' =>	'required',
			'phone' =>	'required',
			'order_date' =>	'date|required',
			'dispatch_date' =>	'date_format:Y-m-d H:i:s',
        ]);
        
        $order_age = \Carbon::createFromFormat('Y-m-d H:i:s', $request->input('order_date') )->diffInDays( \Carbon::now() );
        
        if( count( $request->input('product_id') ) != count( $request->input('quantity') ) ) return back()->withErrors('Product Quantity seem to mismatch');
        
        $name = explode( ' ', $request->input('name') );
        
        $user = User::firstOrCreate([
            'firstname' => $name[0],
            'lastname' => array_pop( $name ),
            'name' => $request->input('name'),
            'username' => trim( $request->input('name') ).'_'.date('Y-m-d-H-i-s'),
            'password' => bcrypt( rand(1000,10000) ),
            'contact' => trim( $request->input('phone') ),
            'address' => $request->input('address'),
            'city' => $request->input('city'),
            'state' => $request->input('city'),
            'country_id' => 18,
            'role' => 4,
        ]);
        
        $request['user_id'] = $user->id;
        
        $products = [];
        $value = 0;
        
        for( $i = 0; $i < count( $request->input('data') ); $i++ )
        {
            
            if( (int) $request->input('data')[$i] > 0 )
            {
                
                $product = Product::find( $request->input('data')[$i]['id'] );
                
                if( $product )
                {
                    
                    $product_value = $request->input('data')[$i]['price'] * $request->input('data')[$i]['quantity'];
                    $value += $product_value;
                    $source_thumb_xs = (string) substr( xs_link($product->thumb_image), 1 );
                    $destination_thumb_xs = (string) substr( str_replace( 'thumb', 'order', xs_link($product->thumb_image) ), 1 );
                    
                    if( ! is_dir( base_path( $source_thumb_xs ) ) && file_exists( base_path( $source_thumb_xs ) ) )
                    {
                        
                        copy( base_path( $source_thumb_xs ), base_path( $destination_thumb_xs ) );
                        
                    } else{
                        
                        $destination_thumb_xs = "";
                        
                    }
                    
                    
                    $products[] = [
                        'product_id' => $product->id,
                        'name' => $product->name,
                        'product_image' => '/'.$destination_thumb_xs,
                        'quantity' => $request->input('data')[$i]['quantity'],
                        'price' => $request->input('data')[$i]['price'],
                        'purchase_price' => $product->purchase_price,
                        'value' => $product_value
                    ];
                    
                    if( $order_age < 10 )
                    {
                        
                        $updated_quantity = ( $product->stock_quantity - $request->input('data')[$i]['quantity'] ) < 0 ? 0 : ( $product->stock_quantity - $request->input('data')[$i]['quantity'] );
                    
                        $product->update([ 'stock_quantity'=> $updated_quantity ]);
                        
                    }
                    
                    
                    
                }
                
            }
            
        }
        
        $request['total'] = $value + $request->input('charge') - $request->input('discount');
        $request['due_amount'] = $value + $request->input('charge') - $request->input('discount');
        
        $order = Order::create($request->all());
        
        if( count( $products ) > 0 && $order )
        {
            
            for( $i = 0; $i < count($products); $i++ )
            {
                
                $products[$i]['order_id'] = $order->id;
                
            }
            
            Order_product::insert($products);
            
        }
        
        return 1;
        
        return back()->withErrors('Order saved successfully.');
        
    }
    
    
    public function storeNote(Request $request)
    {
        
        if( ! $request->has('order_id') ) return back()->withErrors('Order was not found.');
        
        $order = Order::find( $request->input('order_id') );
        
        if( ! $order ) return back()->withErrors('Order was not found.');
        
        if( $order->update(['note' => date('Y-M-d H:i | ').auth()->user()->name.' : '.$request->input("note"). "<br /><br />". $order->note ]) )
        {
            
            return redirect()->action('AdminOrders@index')->withErrors('Note has been saved successfully.');
            
            return back()->withErrors('Note has been saved successfully.');
            
        }
        
        return redirect()->action('AdminOrders@index');
        
        return back()->withErrors('Note could not be saved.');
        
    }
    
    
    public function edit($id)
    {
        
        if( ! in_array( auth()->user()->role, [1,2,3] ) ) return back()->withErrors('Unauthorized Access') ;
        
        $order = Order::find($id);
        
        if( ! $order ) return back()->withErrors('Order was not found.');
        
        if( $order->status == 'Delivered' ) return back()->withErrors('Delivered orders cannot be edited.');
        
        $price = $order->products()->pluck('price','product_id')->toArray();
        
        $items = $order->products()->get();
        
        $categories = Category::all();
        // return $items;
        return view('admin.orders-by-admin.edit', compact('categories', 'price', 'quantity', 'order') );
        
    }
    
    
    public function update($id, Request $request)
    {
        
        if( count( $request->input('product_id') ) != count( $request->input('quantity') ) ) return back()->withErrors('Product Quantity seem to mismatch');
        
        $order = Order::find($id);
        
        if( ! $order ) return back()->withErrors('Order was not found.');
        
        $order_age = \Carbon::createFromFormat('Y-m-d H:i:s', $request->input('order_date') )->diffInDays( \Carbon::now() );
        
        if( $order->products )
        {
            
            foreach( $order->products as $product )
            {
                
                $img = base_path().$product->product_image;
                
                ( ! is_dir($img) && file_exists($img) ) ? unlink( $img ) : false;
                
                if( $order_age < 10 )
                {
                    
                    // Reverse stock quantity
                    $stock = $product->product;
                    
                    $revered_quantity = $stock->stock_quantity + $product->quantity ;
                    
                    $stock->update([ 'stock_quantity'=> $revered_quantity ]);
                    // Complete - Reverse stock quantity
                    
                }
                
                
            }
            
            
            $order->products()->delete();
            
        }
        
        
        $products = [];
        $value = 0;
        // return $request->input('data');
        for( $i = 0; $i < count( $request->input('data') ); $i++ )
        {
            
            if( (int) $request->input('data')[$i]['quantity'] > 0 )
            {
                
                $product = Product::find( $request->input('data')[$i]['product_id'] );
                
                if( $product )
                {
                    
                    $product_value = $request->input('data')[$i]['price'] * $request->input('data')[$i]['quantity'];
                    $value += $product_value;
                    $source_thumb_xs = (string) substr( xs_link($product->thumb_image), 1 );
                    $destination_thumb_xs = (string) substr( str_replace( 'thumb', 'order', xs_link($product->thumb_image) ), 1 );
                    
                    if( ! is_dir( base_path( $source_thumb_xs ) ) && file_exists( base_path( $source_thumb_xs ) ) )
                    {
                        
                        copy( base_path( $source_thumb_xs ), base_path( $destination_thumb_xs ) );
                        
                    } else{
                        
                        $destination_thumb_xs = "";
                        
                    }
                    
                    
                    $products[] = [
                        'product_id' => $request->input('data')[$i]['product_id'],
                        'name' => $product->name,
                        'product_image' => '/'.$destination_thumb_xs,
                        'quantity' => $request->input('data')[$i]['quantity'],
                        'price' => $request->input('data')[$i]['price'],
                        'value' => $product_value,
                        'order_id' => $order->id,
                        // 'due_amount' => $product_value
                    ];
                    
                    if( $order_age < 10 )
                    {
                        
                        $updated_quantity = ( $product->stock_quantity - $request->input('data')[$i]['quantity'] ) < 0 ? 0 : ( $product->stock_quantity - $request->input('data')[$i]['quantity'] );
                        
                        $product->update([ 'stock_quantity'=> $updated_quantity ]);
                        
                    }
                    
                    // dd($products);
                    
                    
                }
                
                
                
            }
            
        }
        
        $request['subtotal'] = $value;
        $request['total'] = $value + $request->input('charge') - $request->input('discount');
        $request['due_amount'] = $value + $request->input('charge') - $request->input('discount');
        
        $order->update($request->all());
        
        
        if( count( $products ) > 0 && $order )
        {
            
            
            Order_product::insert($products);
            
        }
        
        // return $order->products;
        
        return 1;
        
        return back()->withErrors('Order saved successfully.');
        
    }
    
    
    public function postDispatch(Request $request)
    {
        
        $this->validate($request, [
            'courier_id'    => 'required|integer',
            'dispatch_date' => 'required|date:Y-m-d H:i:s',
            'order_id'      => 'required',
            'courier_collectable_amount' => 'required',
            'charge'        => 'required',
            'cod'           => 'required',
        ]);
        
        // return $request->all();
        
        $auto_courier_entries = [];
        
        if( $request->has('courier_auto_entry') )
        {
            
            $auto_courier_entries = array_intersect( $request->input('courier_auto_entry'), $request->input('order_id') );
            
            
        }
        
        
        if( count( $request->input('order_id') ) != count( $request->input('charge') ) || count( $request->input('order_id') ) != count( $request->input('cod') ) || count( $request->input('order_id') ) != count( $request->input('courier_collectable_amount') ) )
        {
            
            return back()->withErrors('Unexpected data found. Please refresh page and retry.');
            
        }
        
        $courier = \App\Courier::find( $request->input('courier_id') );
        
        for( $i = 0; $i < count( $request->input('order_id') ); $i++ )
        {
            
            $order = Order::find( $request->input('order_id')[$i] );
            
            if( $order && $courier )
            {
                
                if( $order->status != 'Delivered' )
                {
                    
                    $order->update([
                        'status' => 'Dispatched',
                        'courier_id' => $courier->id,
                        'courier_name' => $courier->name,
                        'courier_collectable_amount' => $request->input('courier_collectable_amount')[$i],
                        'delivery_charge' => $request->input('charge')[$i],
                        'cod' => $request->input('cod')[$i],
                        'dispatch_date' => $request->input('dispatch_date'),
                        'note' => $order->note.date('Y-F-d (D)').' - '.auth()->user()->name.' - Order has been dispatched via '.$courier->name."<br /><br />"
                    ]);
                    
                    if( in_array( $order->id, $auto_courier_entries ) )
                    {
                        
                        if( strtolower( $courier->name ) == 'pathao' )
                        {
                            
                            $courier_data = $order->toArray();
                            $courier_data['courier_instruction'] = $request->input('courier_instruction')[$i];
                            
                            $dispatch = ( new \App\Http\Controllers\Pathao )->dipatch( $courier_data );
                            
                            if( $dispatch['success'] == true )
                            {
                                
                                $order->update([ 'courier_tracker' => $dispatch['consignment_id'] ]);
                                
                            }
                            
                            $order->update([ 'courier_data' => $dispatch ]);
                            
                            
                        }
                        
                    }
                    
                    
                    
                }
                
            }
            
        }
        
        return back()->withErrors('Orders have been dispatched');
        
    }
    
    
    public function postMarkDelivered(Request $request)
    {
        
        $this->validate($request, [
            'delivery_date' => 'required|date:Y-m-d H:i:s',
            'order_id'      => 'required',
            'collected_amount' => 'required',
            'cod'           => 'required',
        ]);
        
        if( count( $request->input('order_id') ) != count( $request->input('collected_amount') ) || count( $request->input('order_id') ) != count( $request->input('cod') ) )
        {
            
            return redirect()->action('AdminOrders@index')->withErrors('Unexpected data found. Please refresh page and retry.');
            
        }
        
        for( $i = 0; $i < count( $request->input('order_id') ); $i++ )
        {
            
            $order = Order::find( $request->input('order_id')[$i] );
            
            if( $order )
            {
                
                $courier = $order->courier;
                
                if( $courier)
                {
                    
                    $courier_balance_before_delivery = $courier->balance;
                    
                    if( $order->status == 'Delivered' )
                    {
                        
                        $receivable = ( $order->collected_amount - $order->charge - $order->cod ) - ( $request->input('collected_amount')[$i] - $request->input('cod')[$i] - $order->charge );
                        
                    } else{
                        
                        $receivable = $request->input('collected_amount')[$i] - $request->input('cod')[$i] - $order->charge;
                        
                    }
                    
                    $courier->increment('balance', $receivable);
                    
                    $courier_balance_after_delivery = $courier->balance;
                    
                    $order->update([
                        'status' => 'Delivered',
                        'collected_amount' => $request->input('collected_amount')[$i],
                        'cod' => $request->input('cod')[$i],
                        'courier_balance_before_delivery' => $courier_balance_before_delivery,
                        'courier_balance_after_delivery' => $courier_balance_after_delivery,
                        'actual_delivery_date' => $request->input('delivery_date'),
                        'note' => $order->note.date('Y-F-d (D)').' - '.auth()->user()->name." - Order has been delivered. Added $receivable to Courier.  <br /><br />"
                    ]);
                    
                }
                
            }
            
        }
        
        return redirect()->action('AdminOrders@index')->withErrors('Orders have been delivered');
        
    }
    
    
    public function postReceivePayments(Request $request)
    {
        
        // return $request->all();
        
        $this->validate($request, [
            'payment_date'      => 'required|date:Y-m-d H:i:s',
            'order_id'          => 'required',
            'payment'           => 'required',
            'payment_gateway'   => 'required',
        ]);
        
        if( count( $request->input('order_id') ) != count( $request->input('payment') ) )
        {
            
            return back()->withErrors('Unexpected data found. Please refresh page and retry.');
            
        }
        
        for( $i = 0; $i < count( $request->input('order_id') ); $i++ )
        {
            
            $order = Order::find( $request->input('order_id')[$i] );
            
            if( $order )
            {
                
                $order->update([
                    // 'status' => 'Paid',
                    'paid_amount' => $request->input('payment')[$i],
                    'payment_gateway' => $request->input('payment_gateway') == 'courier' ? $order->courier->name : $request->input('payment_gateway'),
                    'due_amount' => $order->total - $request->input('payment')[$i] - $order->delivery_charge - $order->cod ,
                    'payment_date' => $request->input('payment_date'),
                    'note' => $order->note.date('Y-F-d (D)').' - '.auth()->user()->name." - ". $request->input('payment')[$i] ." Payment Received via ".$request->input('payment_gateway')." Payment Gateway.  <br /><br />"
                ]);
                    
                
            }
            
        }
        
        return back()->withErrors('Payment has been recorded.');
        
    }
    
    
    public function listProductOrders(Request $request)
    {
        
        $ordered_products = [];
        
        if( $request->has('q') )
        {
            
            $order_ids = explode('-', $request->input('q'));
            
            if( count( $order_ids ) > 0 )
            {
                
                $products = \App\Order_product::whereIn('order_id',$order_ids)->groupBy('product_id')->pluck('product_id')->toArray();
                
                $ordered_products = \App\Product::whereIn('id', $products)->get();
                
            }
            
        }
        
        return view('admin.orders-by-admin.view-products', ['products' => $ordered_products, 'order_ids'=> $order_ids] );
        
    }
    
    
    public function printOrdersForCustomers(Request $request)
    {
        
        $orders = [];
        
        if( $request->has('q') )
        {
            
            $order_ids = explode('-', $request->input('q'));
            
            if( count( $order_ids ) > 0 )
            {
                
                $orders = Order::whereIn('id', $order_ids)->paginate(50);
                
            }
            
        }
        
        return view('admin.orders-by-admin.print-for-customer', compact('orders') );
        
    }
    
    
    public function printOrdersForCustomersCompact(Request $request)
    {
        
        $orders = [];
        
        if( $request->has('q') )
        {
            
            $order_ids = explode('-', $request->input('q'));
            
            if( count( $order_ids ) > 0 )
            {
                
                $orders = Order::whereIn('id', $order_ids)->paginate(50);
                
            }
            
        }
        
        return view('admin.orders-by-admin.print-for-customer-compact', compact('orders') );
        
    }
    
    
    public function search(Request $request)
    {
        
        $search = array_filter($request->all());
        unset($search['_token']);
        
        $result	=	new Order;
      
        ($request->input('order_from'))  ? $result = $result->where('order_date', '>', $request->input('order_from').' 00:00:00') : false;
        ($request->input('order_to'))    ? $result = $result->where('order_date', '<', $request->input('order_to').' 23:59:59') : false;
      
        ($request->input('dispatch_from'))  ? $result = $result->where('dispatch_date', '>', $request->input('dispatch_from').' 00:00:00') : false;
        ($request->input('dispatch_to'))    ? $result = $result->where('dispatch_date', '<', $request->input('dispatch_to').' 23:59:59') : false;
      
        ($request->input('delivery_from'))  ? $result = $result->where('actual_delivery_date', '>', $request->input('delivery_from').' 00:00:00') : false;
        ($request->input('delivery_to'))    ? $result = $result->where('actual_delivery_date', '<', $request->input('delivery_to').' 23:59:59') : false;
    
		($request->input('name'))	?	$result = $result->where('name', 'like', '%'.$request->input('name').'%') : false;
		($request->input('address'))	?	$result = $result->where('address', 'like', '%'.$request->input('address').'%') : false;
		($request->input('contact'))	?	$result = $result->where('phone', 'like', '%'.$request->input('contact').'%') : false;
		($request->input('email'))	?	$result = $result->where('email', 'like', '%'.$request->input('email').'%') : false;
		($request->input('status'))	?	$result = $result->where('status', 'like', '%'.$request->input('status').'%') : false;
		($request->input('courier_id'))	?	$result = $result->where('courier_id', $request->input('courier_id')) : false;
		
        $orders = $result->paginate(200);
        
        $status = '';
        
        return view('admin.orders-by-admin.index', compact('orders', 'status') );
        
    }
    
    
    public function postCancelAndReturn(Request $request)
    {
        
        if( count( $request->input('order_id') ) == 0 ) return back()->withErrors('No orders are selected.');
            
        $cancel_date = $request->input('cancel_date');
        
        for( $i = 0; $i < count( $request->input('order_id') ); $i++ )
        {
            
            $order = Order::find( $request->input('order_id')[$i] );
            
            $order_age = $order->order_date->diffInDays( \Carbon::now() );
            
            $delivery_charge = $request->input('delivery_charge')[$i];
            
            $collected_amount = $request->input('collected_amount')[$i];
            
            $order->update([
                'delivery_charge'=> $delivery_charge, 
                'courier_collectable_amount'=> $delivery_charge, 
                'collected_amount'=> $collected_amount, 
                'status'=> 'Cancel and Return',
                'note' => date('Y-M-d H:i | ').auth()->user()->name." : Cancel and Return. Order re-stocked.<br /><br />". $order->note
            ]);
            
            if( $order->products )
            {
                
               foreach( $order->products as $product )
               {
                   
                   $p = $product->product;
                   
                   if( $p )
                   {
                       
                        if( $order_age < 20 && ! in_array( $order->status, ['New', 'Cancel and Return'] ) )
                        {
                        
                            $p->update([
                            
                                'stock_quantity' => $p->stock_quantity + $product->quantity
                            
                            ]);
                        
                        }
                       
                   }
                   
               }
                
            }
            
        }
    
        
        return back()->withErrors('Cancel and Return - Recorded successfully.');
        
    }
    
    
    public function getOrderedProducts()
    {
        
        $products = [];
        
        return view('admin.orders-by-admin.ordered-products', compact('products'));
        
    }
    
    
    public function postOrderedProducts(Request $request)
    {
        
        $search = array_filter($request->all());
        unset($search['_token']);
        
        $result	=	\App\Order_product::join('orders','order_products.order_id','=','orders.id');
      
        ($request->input('order_from'))  ? $result = $result->where('orders.order_date', '>', $request->input('orders.order_from').' 00:00:00') : false;
        ($request->input('order_to'))    ? $result = $result->where('orders.order_date', '<', $request->input('order_to').' 23:59:59') : false;
      
        ($request->input('dispatch_from'))  ? $result = $result->where('orders.dispatch_date', '>', $request->input('dispatch_from').' 00:00:00') : false;
        ($request->input('dispatch_to'))    ? $result = $result->where('orders.dispatch_date', '<', $request->input('dispatch_to').' 23:59:59') : false;
      
        ($request->input('delivery_from'))  ? $result = $result->where('orders.actual_delivery_date', '>', $request->input('delivery_from').' 00:00:00') : false;
        ($request->input('delivery_to'))    ? $result = $result->where('orders.actual_delivery_date', '<', $request->input('delivery_to').' 23:59:59') : false;
    
		($request->input('name'))	?	$result = $result->where('orders.name', 'like', '%'.$request->input('name').'%') : false;
		($request->input('address'))	?	$result = $result->where('orders.address', 'like', '%'.$request->input('address').'%') : false;
		($request->input('contact'))	?	$result = $result->where('orders.phone', 'like', '%'.$request->input('contact').'%') : false;
		($request->input('email'))	?	$result = $result->where('orders.email', 'like', '%'.$request->input('email').'%') : false;
		($request->input('status'))	?	$result = $result->where('orders.status', 'like', '%'.$request->input('status').'%') : false;
		($request->input('courier_id'))	?	$result = $result->where('orders.courier_id', $request->input('courier_id')) : false;
		
        $product_list = $result->groupBy('order_products.product_id')->pluck('product_id');
        
        $products = \App\Product::whereIn('id', $product_list)->latest()->paginate(30);
        
        return view('admin.orders-by-admin.ordered-products', compact('products'));
        
    }
    
    
    public function productsForOrder($category_slug)
    {
        
        $category = Category::where('name_slug', 'like', $category_slug)->first();
        
        return view('admin.partials.products-for-order', compact('category') );
        
    }
    
    
    public function getUserByPhone(Request $request)
    {
        
        if( ! in_array( auth()->user()->role, [1,2,3] ) ) return "";
        
        $user = User::where('contact','like', '%'.$request->input('q').'%' )->first();
        
        if( $user )
        {
            
            return [
                'name' => $user->name,
                'address' => $user->address,
                'area' => $user->area,
                'city' => $user->city
            ];
            
        }
        
    }
    
    
    public function downlodForShopup(Request $request, \Excel $excel)
    {
        
        $order_ids = array_filter( explode('-', $request->input('q')) );
        
        $data = Order::whereIn('id', $order_ids)->select('id as Invoice', 'name as Name', 'phone as Phone', 'address as Address', 'area as Area', 'due_amount as Cash')->get()->toArray();
        
        // return \Excel::create( settings()->application_name." ".date('M-d'), function($excel) use ($data) {
        \Excel::create( settings()->application_name." ".date('M-d'), function($excel) use ($data) {
            
            $excel->sheet('orders', function($sheet) use($data) {
                
                $newData = [];
                
                foreach($data as $d)
                {
                    
                    $d['Delivery date'] = \Carbon::now()->addDays(1)->format('M d, Y');
                    $d['Comment'] = "";
                    
                    $newData[] = $d;
                    
                }

                $sheet->fromArray($newData);
            
            });
            
        // } )->download('csv');
        } )->store('csv', public_path('shopup-csv') );
        
        (new \App\Http\Controllers\Mails)->shopupCSV();
        
        if( file_exists( public_path('shopup-csv/'.settings()->application_name." ".date("M-d").".csv" ) ) )
        {
            
            unlink( public_path('shopup-csv/'.settings()->application_name." ".date("M-d").".csv" ) );
            
        }
        
        return 'Request completed successfully. You may close this window.';
        
    }
    
    
}

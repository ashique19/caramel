@extends('admin.layout')

@section('main')

<div class="column is-12-desktop is-12-mobile columns is-multiline padding-top-10 padding-bottom-20 margin-0 padding-left-0 padding-right-0 has-text-uppercase admin-cart" >
    
    <div class="column is-12-desktop is-12-mobile padding-left-0 padding-right-0">
        <h1 class="title is-3">
            ORDERS
        </h1>
    </div>
    
    <div class="column is-12-desktop is-12-mobile padding-left-0 padding-right-0">
        <div class="tabs is-boxed is-small">
            <ul>
                <li @if( $status == 'New' )class="is-active" @endif>
                    <a href="{{ action('AdminOrders@index') }}">
                        @if( $status == 'New' )<span class="icon is-small"><i class="fas fa-angle-down" aria-hidden="true"></i></span>@endif
                        <span>New</span>
                    </a>
                </li>
                <li @if( $status == 'Dispatched' )class="is-active" @endif>
                    <a href="{{ action('AdminOrders@dispatched') }}">
                        @if( $status == 'Dispatched' )<span class="icon is-small"><i class="fas fa-angle-down" aria-hidden="true"></i></span>@endif
                        <span>Dispatched</span>
                    </a>
                </li>
                
                <li @if( $status == 'Delivered' )class="is-active" @endif>
                    <a href="{{ action('AdminOrders@delivered') }}">
                        @if( $status == 'Delivered' )<span class="icon is-small"><i class="fas fa-angle-down" aria-hidden="true"></i></span>@endif
                        <span>Delivered</span>
                    </a>
                </li>
                
                <li @if( $status == 'CANCEL AND RETURN' )class="is-active" @endif>
                    <a href="{{ action('AdminOrders@cancelAndReturn') }}">
                        @if( $status == 'CANCEL AND RETURN' )<span class="icon is-small"><i class="fas fa-angle-down" aria-hidden="true"></i></span>@endif
                        <span>CANCEL AND RETURN</span>
                    </a>
                </li>
                
                <li @if( $status == 'All' )class="is-active" @endif>
                    <a href="{{ action('AdminOrders@all') }}">
                        @if( $status == 'All' )<span class="icon is-small"><i class="fas fa-angle-down" aria-hidden="true"></i></span>@endif
                        <span>All</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    
    <div class="column is-12-desktop is-12-mobile padding-left-0 padding-right-0">
    {!! errors($errors) !!}
    </div>
    
    <div class="column is-12-desktop padding-left-0 padding-right-0 is-12-mobile scrollable selectable-checkbox-group padding-bottom-100">
        
        @if( count($orders) > 0)
        
        <p class="padding-left-30">
            <label class="checkbox">
                {!! Form::checkbox('toggle-select', null, false, ['class'=>'checkbox toggle-select selectable']) !!}
                Select All
            </label>
        </p>
        
        @foreach( $orders as $order )
        
        <table class="table is-bordered is-narrow">
            <tbody>
                <tr>
                    <td width="30">
                        {!! Form::checkbox('order_id[]', $order->id, false, ['class'=>'checkbox selectable', 'data-order_id'=>$order->id, 'data-customer'=>$order->name, 'data-address'=> $order->address, 'data-area'=>$order->area, 'data-city' => $order->city, 'data-status'=> $order->status, 'data-value'=>$order->total, 'data-discount'=> $order->discount, 'data-due'=> $order->due_amount, 'data-courier'=> ( $order->courier ? $order->courier->name : "" ), 'data-courier_id'=> $order->courier_id, 'data-charge'=> $order->delivery_charge, 'data-cod'=> $order->cod, 'data-cc'=> $order->courier_collectable_amount, 'data-collected'=> $order->collected_amount, 'data-dispatch_date' => $order->dispatch_date ? $order->dispatch_date->format('Y-m-d') : '', 'data-phone'=> $order->phone ]) !!}
                        <p class="padding-top-5 padding-bottom-5 margin-top-10">
                            @if( in_array( auth()->user()->role, [1,2] ) && ! in_array( $order->status, ['Delivered', 'Cancel and Return'] ))
                            <a href="{{ action('AdminOrders@edit', $order->id) }}">
                                <i class="fas fa-edit yellow-text"></i>
                            </a>
                            <button class="button font-weight-700 is-small padding-top-0 border-width-0 height-10 margin-top-3 is-danger is-inverted padding-left-0 padding-right-5"
                                data-toggle="popover"
                                data-html="true"
                                data-placement="bottom"
                                data-content='
                                    <div class="box">
                                    <h4 class="subtitle is-4">Are you sure?</h4>
                                    {!! Form::open([ "url"=> action("Orders@destroy", $order->id), "method"=> "DELETE" ]) !!}
                                    {!! Form::hidden("id", $order->id) !!}
                                    {!! Form::submit("yes", ["class"=> "button is-small is-danger is-fullwidth"]) !!}
                                    {!! Form::close() !!}
                                    </div>
                                '>
                                <i class="fas fa-trash"></i>
                            </button>
                            @endif
                            @if( auth()->user()->role == 3 && $order->status == 'New' )
                            <a href="{{ action('AdminOrders@edit', $order->id) }}">
                                <i class="fas fa-edit yellow-text"></i>
                            </a>
                            @endif
                        </p>
                    </td>
                    <td width="200">
                        <p class="padding-top-5 padding-bottom-5 font-size-10">
                            <a class="font-size-10" 
                                data-toggle="popover" 
                                data-html="true" 
                                data-placement="right" 
                                data-trigger="click"
                                data-content='
                                    <p class="font-size-11">OD:{{ $order->order_date ? $order->order_date->format('M-d (D)') : "" }}</p>
                                    <p class="font-size-11">DD:{{ $order->dispatch_date ? $order->dispatch_date->format('M-d (D)') : "" }}</p>
                                    <p class="font-size-11">ED:{{ $order->expected_delivery_date ? $order->expected_delivery_date->format('M-d (D) h:i a') : "" }}</p>
                                    <p class="font-size-11">AD:{{ $order->actual_delivery_date ? $order->actual_delivery_date->format('M-d (D)') : "" }}</p>
                                    <p class="font-size-11">PD:{{ $order->payment_date ? $order->payment_date->format('M-d (D)') : "" }}</p>
                                '
                            >{{ $order->order_date ? $order->order_date->format('M-d (D)') : "" }}</a>
                            <span class="is-pulled-right font-weight-700">{{ $order->status }}</span>
                        </p>
                        <a href="{{ $order->user_id ?  action('Users@show', $order->user_id) : '#' }}" class="is-link copy font-weight-700 font-size-14">{{ $order->name }}</a>
                        
                        <p class="padding-top-5 padding-bottom-5 font-size-10">
                            {{ $order->phone }}
                            <a class="is-pulled-right"
                                data-toggle="popover"
                                data-placement="right"
                                data-html="true"
                                data-trigger="click"
                                data-content='
                                <div class="copy">
                                    <p>Address: {{ $order->address }}</p>
                                    <p>Area: {{ $order->area }}</p>
                                    <p>City: {{ $order->city }}</p>
                                </div>
                                '
                        >
                            {{ $order->area }}
                        </a>
                        </p>
                        
                    </td>
                    <td style="min-width: 300px; max-width: 300px;" class="font-size-11 copy">
                        @if( $order->products()->count() > 0 )
                        @foreach( $order->products as $product )
                        <p>
                            <a href="">
                            <img class="lazy" data-src="{{ $product->product_image }}" alt="{{$product->name}}" width="80" />
                            @if( $product->quantity > 1 )
                            <span class="red-text font-weight-700">{{ $product->price }} x {{ $product->quantity }} = {{ $product->value }}</span>
                            @else
                            {{ $product->price }} x {{ $product->quantity }} = {{ $product->value }}
                            @endif
                            </a>
                        </p>
                        @endforeach
                        <p>
                            <a class="is-link margin-top-2 margin-bottom-2 font-weight-700 margin-left-100"
                                data-toggle="popover"
                                data-placement="right"
                                data-html="true"
                                data-trigger="hover"
                                data-content='
                                    <p>Total: {{ $order->total }}</p>
                                    <p>Charge: {{ $order->charge }}</p>
                                    <p>Discount: {{ $order->discount }}</p>
                                    <p>Due: {{ $order->due_amount }}</p>
                                    <p>CC: {{ $order->courier_collectable_amount }}</p>
                                    <p>Collected: {{ $order->collected_amount }}</p>
                                    <p>Payment: {{ $order->paid_amount }}</p>
                                '
                        >DUE = {{ $order->due_amount }}</a>
                        </p>
                        @endif
                    </td>
                    <td width="300" class="font-size-11">
                        <p>
                            <button class="button is-small" 
                                    data-toggle="popover"
                                    data-placement="bottom"
                                    data-html="true"
                                    data-content='
                                
                                {!! Form::open(["url"=> action("AdminOrders@storeNote"), "class"=>"box"]) !!}
                                
                                {!! Form::hidden("order_id", $order->id) !!}
                                
                                <div class="field">
                                    <div class="control">
                                        <textarea name="note" class="textarea is-warning" type="text" placeholder="Add Note for Admins"></textarea>
                                    </div>
                                </div>
                                
                                <div class="field">
                                    <div class="control has-text-centered">
                                        {!! Form::submit("Save", ["class"=> "button yellow-bg black-text font-weight-700"]) !!}
                                    </div>
                                </div>
                                
                                {!! Form::close() !!}
                            '>
                                <i class="fas fa-plus margin-right-5"></i> Note
                            </button>
                        </p>
                        <p class="scrollable max-height-100 copy">
                        {!! $order->note !!}
                        </p>
                    </td>
                    <td width="50" class="font-size-11">
                        {!! $order->createdBy ? $order->createdBy->name : "" !!} <br><span class="font-size-10">({{ $order->created_at ? $order->created_at->diffForHumans() : "" }})</span>
                    </td>
                </tr>
            </tbody>
        </table>
        
        
        @endforeach
        
        <div class="option-group">
            <span class="padding-left-30 margin-right-30">
                <label class="checkbox margin-top-5">
                    {!! Form::checkbox('toggle-select', null, false, ['class'=>'checkbox toggle-select selectable']) !!}
                    With Selected <i class="fa fa-angle-right"></i>
                </label>
            </span>
            
            <a class="button is-small yellow-bg black-text margin-left-5 margin-bottom-5 print-invoice-for-customer-compact">Print</a>
            <a class="button is-small yellow-bg black-text margin-left-5 margin-bottom-5 dispatch" data-toggle="modal" data-target="#dispatch">Dispatch</a>
            <a class="button is-small yellow-bg black-text margin-left-5 margin-bottom-5 mark-delivered" data-toggle="modal" data-target="#mark-delivered">Delivered</a>
            <a class="button is-small yellow-bg black-text margin-left-5 margin-bottom-5 receive-payment" data-toggle="modal" data-target="#receive-payment">Receive Payment</a>
            <a class="button is-small yellow-bg black-text margin-left-5 margin-bottom-5 list-products">List Products</a>
            <!--<a class="button is-small yellow-bg black-text margin-left-5 margin-bottom-5 print-invoice-for-customer">Print 2</a>-->
            <a class="button is-small yellow-bg black-text margin-left-5 margin-bottom-5 cancel-and-return" data-toggle="modal" data-target="#cancel-and-return">Cancel & Return</a>
            @if( in_array( auth()->user()->role, [1,2] ) )
            <a class="button is-small yellow-bg black-text margin-left-5 send-to-courier">Send to Pathao</a>
            <a class="button is-small yellow-bg black-text margin-left-5 download-for-shopup">Email to ShopUp</a>
            <!--<a class="button is-small yellow-bg black-text margin-left-5 check-status-from-courier">Check status from Pathao</a>-->
            @endif
        </div>
        <!--Dispatch Modal-->
        <div class="modal fade" id="dispatch" tabindex="-1" role="dialog" aria-labelledby="dispatch">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    {!! Form::open(['url'=>action('AdminOrders@postDispatch'),'class'=>'columns is-multiline padding-10']) !!}
                    <div class="modal-header column is-12">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">DISPATCH</h4>
                    </div>
                    <div class="modal-body column is-12 columns is-multiline">
                            <div class="column is-12-mobile is-5-desktop">
                                <div class="select is-rounded">
                                    <select name="courier_id" id="courier_id">
                                        <option>-Select Courier-</option>
                                        @if(\App\Courier::count() > 0)
                                            @foreach( \App\Courier::all() as $courier )
                                            <option value="{{ $courier->id }}" data-charge="{{ $courier->charge }}" data-cod_percentage="{{ $courier->cod_percentage }}">{{ $courier->name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="column is-12-mobile is-7-desktop">
                                <input class="input datepicker" name="dispatch_date" type="text" placeholder="Date" value="{{ date('Y-m-d H:i:s') }}">
                            </div>
                            
                            <p class="message padding-top-5 padding-bottom-5 padding-left-10 padding-right-10"></p>
                            
                            <div class="column is-12">
                                <table class="table is-bordered">
                                    <thead>
                                        <tr>
                                            <th>Customer</th>
                                            <th>Area</th>
                                            <th>Collectable</th>
                                            <th>Charge</th>
                                            <th>COD</th>
                                            <th>Courier Entry</th>
                                            <th>Courier Instruction</th>
                                        </tr>
                                    </thead>
                                    <tbody class="dispatch-list-preview">
                                        
                                    </tbody>
                                </table>
                            </div>
                            
                    </div>
                    <div class="modal-footer column is-12">
                        <button class="button is-info info">Order: 0</button>
                        <button type="button" class="button is-default" data-dismiss="modal">Close</button>
                        {!! Form::submit('Save dispatch', ['class'=>'button yellow-bg yellow-border']) !!}
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
        <!--END: Dispatch Modal-->
        
        <!--Cancel & Return Modal-->
        <div class="modal fade" id="cancel-and-return" tabindex="-1" role="dialog" aria-labelledby="cancel-and-return">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    {!! Form::open(['url'=>action('AdminOrders@postCancelAndReturn'),'class'=>'columns is-multiline padding-10']) !!}
                    <div class="modal-header column is-12">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">CANCEL AND RETURN</h4>
                    </div>
                    <div class="modal-body column is-12 columns is-multiline">
                            
                            <p class="message padding-top-5 padding-bottom-5 padding-left-10 padding-right-10"></p>
                            
                            <div class="column is-12">
                                <table class="table is-bordered">
                                    <thead>
                                        <tr>
                                            <th>Customer</th>
                                            <th>Area</th>
                                            <th>Courier</th>
                                            <th>Value</th>
                                            <th>DC</th>
                                            <th>Collected</th>
                                        </tr>
                                    </thead>
                                    <tbody class="cancel-list-preview">
                                        
                                    </tbody>
                                </table>
                            </div>
                            
                    </div>
                    <div class="modal-footer column is-12">
                        <button type="button" class="button is-default" data-dismiss="modal">Close</button>
                        {!! Form::submit('Save Cancel', ['class'=>'button yellow-bg yellow-border']) !!}
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
        <!--END: Cancel & Return Modal-->
        
        <!--Mark Delivered Modal-->
        <div class="modal fade" id="mark-delivered" tabindex="-1" role="dialog" aria-labelledby="mark-delivered">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    {!! Form::open(['url'=>action('AdminOrders@postMarkDelivered'),'class'=>'columns is-multiline padding-10']) !!}
                    <div class="modal-header column is-12">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">MARK DELIVERED</h4>
                    </div>
                    <div class="modal-body column is-12 columns is-multiline">
                            <div class="column is-12">
                                <input class="input datepicker" name="delivery_date" type="text" placeholder="Date" value="{{ date('Y-m-d H:i:s') }}">
                            </div>
                            
                            <p class="message padding-top-5 padding-bottom-5 padding-left-10 padding-right-10"></p>
                            
                            <div class="column is-12">
                                <table class="table is-bordered">
                                    <thead>
                                        <tr>
                                            <th>Customer</th>
                                            <th>Area</th>
                                            <th>Order Value</th>
                                            <th>CC</th>
                                            <th>Collected</th>
                                            <th>COD</th>
                                        </tr>
                                    </thead>
                                    <tbody class="delivery-list-preview">
                                        
                                    </tbody>
                                </table>
                            </div>
                            
                    </div>
                    <div class="modal-footer column is-12">
                        <button class="button is-info info">Order: 0</button>
                        <button type="button" class="button is-default" data-dismiss="modal">Close</button>
                        {!! Form::submit('Save Delivered', ['class'=>'button yellow-bg yellow-border']) !!}
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
        <!--END: Mark Delivered Modal-->
        
        <!--Receive Payment Modal-->
        <div class="modal fade" id="receive-payment" tabindex="-1" role="dialog" aria-labelledby="receive-payment">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    {!! Form::open(['url'=>action('AdminOrders@postReceivePayments'),'class'=>'columns is-multiline padding-10']) !!}
                    <div class="modal-header column is-12">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">RECEIVE PAYMENT</h4>
                    </div>
                    <div class="modal-body column is-12 columns is-multiline">
                            <div class="column is-5-desktop is-12-mobile">
                                <div class="select">
                                    <select name="payment_gateway" required >
                                        <option>-PAYMENT GATEWAY-</option>
                                        <option value="courier">Courier (COD)</option>
                                        <option value="bkash">bKash</option>
                                        <option value="card">Card</option>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="column is-7-desktop is-12-mobile">
                                <input class="input datepicker" name="payment_date" type="text" placeholder="Date" value="{{ date('Y-m-d H:i:s') }}">
                            </div>
                            
                            <p class="message padding-top-5 padding-bottom-5 padding-left-10 padding-right-10"></p>
                            
                            <div class="column is-12">
                                <table class="table is-bordered">
                                    <thead>
                                        <tr>
                                            <th>Customer</th>
                                            <th>Order</th>
                                            <th>Collected</th>
                                            <th>Charge</th>
                                            <th>COD</th>
                                            <th>Paid</th>
                                        </tr>
                                    </thead>
                                    <tbody class="payment-list-preview">
                                        
                                    </tbody>
                                </table>
                            </div>
                            
                    </div>
                    <div class="modal-footer column is-12">
                        <button class="button is-info info">Order: 0</button>
                        <button type="button" class="button is-default" data-dismiss="modal">Close</button>
                        {!! Form::submit('Save Delivered', ['class'=>'button yellow-bg yellow-border']) !!}
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
        <!--END: Receive Payment Modal-->
        
        @if( in_array( auth()->user()->role, [1,2] ) )
        <!--Send Data to Courier - Modal-->
        <div class="modal" id="ext-dispatcher">
            <div class="modal-background"></div>
                <div class="modal-content box">
                    <p>No orders have been selected</p>
                </div>
            <button class="modal-close is-large" aria-label="close"></button>
        </div>
        <!--END: Send Data to Courier - Modal-->
        @endif
        
        <div class="column is-12">
        
        {!! $orders->render() !!}
        
        </div>
        
        @endif
        
    </div>
    
</div>

<p class="counter has-text-right">
TOTAL: 0 | CHARGE: 0 | DISCOUNT: 0 | DUE: 0 | CC: 0 | COLLECTED: 0
</p>

@section('js')

<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery.lazy/1.7.6/jquery.lazy.min.js"></script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery.lazy/1.7.6/jquery.lazy.plugins.min.js"></script>
<script type="text/javascript">

$(document).ready(function(){
    
    $('.lazy').Lazy({
        scrollDirection: 'vertical',
        effect: 'fadeIn',
        visibleOnly: true,
        onError: function(element) {
            console.log('error loading ' + element.data('src'));
        }
    });
    
    $('.cancel-and-return').click(function(){
        
        if( $('.selectable[data-customer]:checked').length > 0 ){
            
            $('#cancel-and-return p.message, .cancel-list-preview').empty();
            $('#cancel-and-return input[type="submit"]').prop('disabled', false);
            
            $('.selectable[data-customer]:checked').each(function(i,v){
                
                $('.cancel-list-preview').append(`
                    <tr>
                        <td>`+$(v).data('customer')+`</td>
                        <td>`+$(v).data('area')+`</td>
                        <td>`+$(v).data('courier')+` (`+$(v).data('status')+`)</td>
                        <td>`+$(v).data('value')+`</td>
                        <td>
                            <input class="input" name="delivery_charge[]" type="text" placeholder="Collected" value="`+$(v).data('charge')+`" >
                        </td>
                        <td>
                            <input type="hidden" name="order_id[]" value="`+$(v).data('order_id')+`" />
                            <input class="input" name="collected_amount[]" type="text" placeholder="Collected" value="0" >
                        </td>
                    </tr>
                `);
                
            })
            
        } else{
            
            $('#cancel-and-return p.message').html('No orders are selected.');
            $('#dispatch input[type="submit"]').prop('disabled',true);
            
        }
        
    })
    
    $('.dispatch').click(function(){
        
        $('#dispatch select option').prop('selected', false);
        
        if( $('.selectable[data-customer]:checked').length > 0 ){
            
            $('.dispatch-list-preview, #dispatch p.message').empty();
            $('#dispatch input[type="submit"]').prop('disabled', false);
            
            $('.selectable[data-customer]:checked').each(function(i,v){
                
                $('.dispatch-list-preview').append(`
                    <tr>
                        <td>`+$(v).data('customer')+`</td>
                        <td>`+$(v).data('area')+`</td>
                        <td><input class="input" name="courier_collectable_amount[]" value="`+$(v).data('due')+`" /></td>
                        <td>
                            <input type="hidden" name="order_id[]" value="`+ $(v).data('order_id') +`" />
                            <input class="input" name="charge[]" type="text" placeholder="Charge" value="0" >
                        </td>
                        <td>
                            <input class="input" name="cod[]" type="text" placeholder="COD" value="0" >
                        </td>
                        <td>
                            <input class="checkbox" name="courier_auto_entry[]" type="checkbox" placeholder="Instruction (For auto entry)" value="`+ $(v).data('order_id') +`" > Auto
                        </td>
                        <td>
                            <input class="input" name="courier_instruction[]" type="text" placeholder="For auto entry" >
                        </td>
                    </tr>
                `);
                
            })
            
        } else{
            
            $('#dispatch p.message').html('No orders are selected.');
            $('#dispatch input[type="submit"]').prop('disabled',true);
            
        }
        
    })
    
    $('#courier_id').on('keyup click change', function(){
        
        if( $(this).find('option:selected').attr('data-charge') ){
            var charge = $(this).find('option:selected').data('charge'), 
                cod_percentage = $(this).find('option:selected').data('cod_percentage');
            
            if( $('.dispatch-list-preview tr').length > 0 ){
                
                var total = 0, charged = 0, cods = 0;
                
                $('.dispatch-list-preview tr').each(function(i,v){
                    var value = parseInt($(v).find('td:eq(2) input').val()) || 0,
                        fixed_charge = charge,
                        cod_value = parseFloat( value * cod_percentage / 100 ).toFixed(2);
                    total = total+value;
                    charged = charged + fixed_charge;
                    cods = cods * 1 + cod_value * 1;
                    $(v).find('[name="charge[]"]').val(fixed_charge);
                    $(v).find('[name="cod[]"]').val(cod_value);
                })
                
                $('.info').html('Order: '+ total + ' | DC: ' + charged + ' | COD: '+ cods);
                
            }
        }
    })
    
    $(document).on({
        'keyup change': function(){
            
            if( $('.dispatch-list-preview tr').length > 0 ){
                
                var total = 0, charge = 0, cod = 0;
                
                $('.dispatch-list-preview tr').each(function(i,v){
                    var value = parseInt($(v).find('td:eq(2) input').val()) || 0,
                        fixed_charge = parseInt($(v).find('td:eq(3) input[name="charge[]"]').val()) || 0,
                        cod_value = parseInt($(v).find('td:eq(4) input').val()) || 0;
                    total = total+value;
                    charge = charge + fixed_charge;
                    cod = cod * 1 + cod_value * 1;
                    
                    console.log('value:'+value+' | charge:'+fixed_charge+' | COD:'+cod_value);
                })
                
                $('.info').html('Collectable: '+ total + ' | DC: ' + charge + ' | COD: '+ cod);
                
            }
            
        }
    },'.dispatch-list-preview input')
    
    $('.mark-delivered').click(function(){
        
        if( $('.selectable[data-customer]:checked').length > 0 ){
            
            $('.delivery-list-preview, #mark-delivered p.message').empty();
            $('#mark-delivered input[type="submit"]').prop('disabled', false);
            
            $('.selectable[data-customer]:checked').each(function(i,v){
                
                $('.delivery-list-preview').append(`
                    <tr>
                        <td>`+$(v).data('customer')+`</td>
                        <td>`+$(v).data('area')+`</td>
                        <td>`+$(v).data('due')+`</td>
                        <td>`+$(v).data('cc')+`</td>
                        <td>
                            <input type="hidden" name="order_id[]" value="`+ $(v).data('order_id') +`" />
                            <input class="input" name="collected_amount[]" type="text" placeholder="Collected amount" value="`+$(v).data('cc')+`" >
                        </td>
                        <td>
                            <input class="input" name="cod[]" type="text" placeholder="COD" value="`+ $(v).data('cod') +`" >
                        </td>
                    </tr>
                `);
                
            })
            
        } else{
            
            $('#mark-delivered p.message').html('No orders are selected.');
            $('#mark-delivered input[type="submit"]').prop('disabled',true);
            
        }
        
        if( $('.delivery-list-preview tr').length > 0 ){
                
            var total = 0, collected = 0;
            
            $('.delivery-list-preview tr').each(function(i,v){
                var value = parseInt($(v).find('td:eq(3)').text()) || 0,
                    collection = parseInt($(v).find('td:eq(4) input[name="collected_amount[]"]').val()) || 0;
                total = total+value;
                collected = collected * 1 + collection * 1;
                
            })
            
            $('.info').html('Collected Amount: '+ collected + ' of ' + total);
            
        }
        
    })
    
    $(document).on({
        'keyup change': function(){
            
            if( $('.delivery-list-preview tr').length > 0 ){
                
                var total = 0, collected = 0;
                
                $('.delivery-list-preview tr').each(function(i,v){
                    var value = parseInt($(v).find('td:eq(3)').text()) || 0,
                        collection = parseInt($(v).find('td:eq(4) input[name="collected_amount[]"]').val()) || 0;
                    total = total+value;
                    collected = collected * 1 + collection * 1;
                    
                })
                
                $('.info').html('Collected: '+ collected + ' of ' + total);
                
            }
            
        }
    },'.delivery-list-preview input')
    
    $('.receive-payment').click(function(){
        
        if( $('.selectable[data-customer]:checked').length > 0 ){
            
            $('.selectable[data-customer]:checked').each(function(i,v){
                
                $('.payment-list-preview').append(`
                    <tr>
                        <td>`+$(v).data('customer')+`</td>
                        <td>`+$(v).data('value')+`</td>
                        <td>`+$(v).data('collected')+`</td>
                        <td>`+$(v).data('charge')+`</td>
                        <td>`+$(v).data('cod')+`</td>
                        <td>
                            <input type="hidden" name="order_id[]" value="`+ $(v).data('order_id') +`" />
                            <input class="input" name="payment[]" type="text" placeholder="Payment amount" value="`+( $(v).data('collected') * 1 - $(v).data('cod') * 1 - $(v).data('charge') * 1 )+`" >
                        </td>
                    </tr>
                `);
                
            })
            
        }
        
        if( $('.payment-list-preview tr').length > 0 ){
                
            var paid = 0, collected = 0;
            
            $('.payment-list-preview tr').each(function(i,v){
                var collection = parseInt($(v).find('td:eq(2)').text()) || 0,
                    payment = parseInt($(v).find('td:eq(5) input[name="payment[]"]').val()) || 0;
                paid = paid+payment;
                collected = collected * 1 + collection * 1;
                
            })
            
            $('.info').html('Paid: '+ paid + ' of ' + collected);
            
        }
        
    })
    
    $(document).on({
        'keyup change': function(){
            
            if( $('.payment-list-preview tr').length > 0 ){
                
                var paid = 0, collected = 0;
                
                $('.payment-list-preview tr').each(function(i,v){
                    var collection = parseInt($(v).find('td:eq(2)').text()) || 0,
                        payment = parseInt($(v).find('td:eq(5) input[name="payment[]"]').val()) || 0;
                    paid = paid+payment;
                    collected = collected * 1 + collection * 1;
                    
                })
                
                $('.info').html('Paid: '+ paid + ' of ' + collected);
                
            }
            
        }
    },'.payment-list-preview input')
    
    $('.list-products').click(function(){
        
        if( $('.selectable[data-customer]:checked').length > 0 ){
            
            var list_products = $('.selectable[data-customer]:checked').map(function(i,v){ return $(v).data('order_id')}).get().join('-');
            
            window.open( '//'+ window.location.host + "/admin/list-products-orders/?q=" + list_products );
            
        }
        
    })
    
    $('.print-invoice-for-customer').click(function(){
        
        if( $('.selectable[data-customer]:checked').length > 0 ){
            
            var invoice_to_print = $('.selectable[data-customer]:checked').map(function(i,v){ return $(v).data('order_id')}).get().join('-');
            
            window.open( '//'+ window.location.host + "/admin/print-orders-for-customer/?q=" + invoice_to_print );
            
        }
        
    })
    
    $('.print-invoice-for-customer-compact').click(function(){
        
        if( $('.selectable[data-customer]:checked').length > 0 ){
            
            var invoice_to_print = $('.selectable[data-customer]:checked').map(function(i,v){ return $(v).data('order_id')}).get().join('-');
            
            window.open( '//'+ window.location.host + "/admin/print-orders-for-customer-compact/?q=" + invoice_to_print );
            
        }
        
    })
    
    $('.print-invoice-for-couriers').click(function(){
        
        if( $('.selectable[data-customer]:checked').length > 0 ){
            
            var invoice_to_print = $('.selectable[data-customer]:checked').map(function(i,v){ return $(v).data('order_id')}).get().join('-');
            
            window.open( '//'+ window.location.host + "/admin/print-orders-for-couriers/?q=" + invoice_to_print );
            
        }
        
    })
    
    $('.selectable').click(function(){
        
        var count = 0;
            total = 0,
            charge = 0,
            discount = 0,
            due = 0,
            cc = 0,
            collected = 0;
    
        $('.selectable:checked[data-order_id]').each(function(i,v){
            
            var p = $(v);
            
            total = total + p.data('value') * 1;
            charge = charge + p.data('charge') * 1;
            discount = discount + p.data('discount') * 1;
            due = due + p.data('due') * 1;
            cc = cc + p.data('cc') * 1;
            collected = collected + p.data('collected') * 1;
            
            count++;
            
        })
        
        var result = count+" SELECTED | TOTAL: "+total+" | CHARGE: "+charge+" | DISCOUNT: "+discount+" | DUE: "+due+" | CC: "+cc+" | COLLECTED: "+collected;
        
        $('.counter').text( result );
        
    })
    
    $('.send-to-courier').click(function(){
        
        $('#ext-dispatcher').addClass('is-active');

        if( $('input[type=checkbox][data-order_id]:checked').length == 0 ){

            a = [];

            $('#ext-dispatcher .modal-content').html(`<p>No orders have been selected</p>`)

        } else{

            a = [];

            $('#ext-dispatcher .modal-content').empty();

            $('input[type=checkbox][data-order_id]:checked').each(function(i,v){

                a.push({
                    'id': $(v).data('order_id'),
                    'name': $(v).data('customer'),
                    'address': '('+$(v).data('area')+') '+$(v).data('address').trim(),
                    'city': $(v).data('city').trim(),
                    'phone_no': $(v).data('phone').trim(),
                    'due': $(v).data('due')
                });

            });

            $('#ext-dispatcher .modal-content').html(`<h3 class="subtitle is-4 has-text-centered yellow-text">REVIEW DATA</h3>`);

            a.forEach( (v,i) =>{

                $('#ext-dispatcher .modal-content').append(`
                    <div class="box">
                        <span class="tag is-pulled-right del-dispatch-item" data-index="${v.id}">
                            <i class="fa fa-trash"></i>
                        </span>
                        <p>Order ID: ${v.id}</p>
                        <p>Name: ${v.name}</p>
                        <p>Address: ${v.address}</p>
                        <p>City: ${v.city}</p>
                        <p>Phone no.: ${v.phone_no}</p>
                        <p>Total Due: ${v.due}</p>
                    </div>
                `);

            })

            $('#ext-dispatcher .modal-content').append(`
                <div class="box has-text-centered">
                    <button type="button" class="button yellow-text yellow-border proceed-courier-dispatch">Proceed</button>
                </div>
            `);

        }

    })
    
    $(document).on({
        click: function(){
            var ind = $(this).data('index');
            $(this).parent().remove();

            a = a.filter(v=>{ return v.id != ind; });

        }
    }, '.del-dispatch-item');
    
    $(document).on({

        click: function(){

            if( a.length == 0 ){

                $('#ext-dispatcher .modal-content').html(`<p>No orders have been selected</p>`);

            } else{

                $('#ext-dispatcher .modal-content').html(`<p>Processing...</p>`)

                $.post( '{!! env("pathao_token_url") !!}', {'email': '{!! env("pathao_username") !!}', 'password': '{!! env("pathao_password") !!}'}, function(data){

                    courier_token = data.token;

                    a.forEach(v=>{
                        $.ajax({
                            url: '{!! env("pathao_order_create_url") !!}',
                            crossDomain: true,
                            method: "POST",
                            headers: {'Authorization': 'Bearer '+courier_token},
                            data: {
                                'cost' : v.due,
                                'deliver_at' : "",
                                'delivery_time_slot' : "",
                                'ext_invoice_id' : "",
                                'instructions' : "",
                                'package_description' : "",
                                'plan_id' : 1,
                                'receiver_address' : v.address+', '+v.city,
                                'receiver_name' : v.name,
                                'receiver_number' : v.phone_no,
                                'recipient_email' : "",
                                'recipient_zone_id' : "",
                                'store_id' : "",
                                'storeproduct_id' : ""
                            },
                            success: function(response){
                                if( response.message == "success" ){
                                    $('#ext-dispatcher .modal-content').append(`<p>${v.id} : success</p>`)
                                }
                            }
                        })
                    })

                    $('#ext-dispatcher .modal-content').append(`<p>Complete. Dont forget to verify from Courier window.</p>`);

                })

            }

        }

    },'.proceed-courier-dispatch');
    
    $('#ext-dispatcher .modal-close').click(function(){
        $('#ext-dispatcher').removeClass('is-active');
    })
    
    $(document).on({
            click: function(){

                var dispatch_get_url = '{{ action("Ext@dispatchList") }}';

                $.get(dispatch_get_url, function(data){
                    if( data ){

                        var dispatch_post_url = data.url,
                            token = data.token,
                            dispatches = data.data;

                        $.post('{!! env("pathao_token_url") !!}', {'email': '{!! env("pathao_username") !!}', 'password': '{!! env("pathao_password") !!}'}, function(data){

                            courier_token = data.token;

                            dispatches.forEach(dispatch => {

                                $.ajax({
                                    url: '{!! env("pathao_search_url") !!}' + dispatch.phone,
                                    crossDomain: true,
                                    method: "GET",
                                    headers: {'Authorization': 'Bearer '+courier_token},
                                    success: function(response){
                                        if( response.data.length > 0 ){

                                            var courier = response.data.filter( d => d.created_at.substr(0,10) == dispatch.dispatch_date).shift();

                                            if( courier ){

                                                $.post(dispatch_post_url, {
                                                    '_token': token,
                                                    'data': {
                                                        'order_id': dispatch.id,
                                                        'courier_data': courier
                                                    }
                                                })

                                            }

                                        }
                                    }
                                })

                            })

                        })


                    }
                })

                // if( $('input[type="checkbox"].selectable').length > 0 ){

                //     $.post(courier_token_url, {'email': email, 'password': password}, function(data){

                //         courier_token = data.token;

                //         $('input[type="checkbox"].selectable').each(function(i,v){
                //             var order_id = $(v).data('order_id'),
                //                 phone = $(v).data('phone'),
                //                 dispatch_date = $(v).data('dispatch_date');

                //             if( dispatch_date ){

                //                 $.ajax({
                //                     url: courier_order_search_url+phone,
                //                     crossDomain: true,
                //                     method: "GET",
                //                     headers: {'Authorization': 'Bearer '+courier_token},
                //                     success: function(response){
                //                         if( response.data.length > 0 ){
                //                             var data = response.data.filter( d => d.created_at.substr(0,10) == dispatch_date).shift();

                //                         }
                //                     }
                //                 })

                //             }

                //         })


                //     })

                // }
            }
        },'.check-status-from-courier')
        
    $('.download-for-shopup').click(function(){
        
        if( $('.selectable[data-customer]:checked').length > 0 ){
            
            var invoice_to_print = $('.selectable[data-customer]:checked').map(function(i,v){ return $(v).data('order_id')}).get().join('-');
            
            window.open( '//'+ window.location.host + "/admin/download-for-shopup/?q=" + invoice_to_print );
            
        }
        
    })
    
})
</script>

@stop
@stop
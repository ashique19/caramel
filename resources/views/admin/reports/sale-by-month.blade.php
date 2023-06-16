@extends('admin.layout')

@section('main')

<div class="column is-12-desktop is-12-mobile padding-top-10 padding-bottom-20 has-text-uppercase" >
    
    <div class="column is-12 padding-left-0">
        <h1 class="title is-3">
            Sale by Month
        </h1>
    </div>
    
    <div class="column is-12 padding-left-0">
    {!! errors($errors) !!}
    </div>
    
    
    
    <div class="column is-12 scrollable padding-bottom-100">
        
        <table class="table is-striped is-bordered is-narrow font-size-12">
            <thead>
                <tr>
                    <th>Month</th>
                    <th width="100" colspan="2" class="has-text-centered">Orders</th>
                    <th width="100" colspan="2" class="has-text-centered">Delivered</th>
                    <th width="100"class="has-text-centered">Net Sale</th>
                </tr>
                <tr>
                    <th></th>
                    <th>Qty</th>
                    <th>Value</th>
                    <th>Qty</th>
                    <th>Value</th>
                    <th>Tk</th>
                </tr>
            </thead>
            <tbody>
                @for( $i = 0; $i > -23; $i-- )
                <tr>
                    <td>{{ \Carbon::now()->addMonths($i)->format('F Y') }}</td>
                    <td>{{ \App\Order::whereBetween('order_date', [ \Carbon::now()->addMonths($i)->format('Y-m-01 00:00:00'), \Carbon::now()->addMonths($i)->endOfMonth()->format('Y-m-d 23:59:59') ])->count() }}</td>
                    <td>{{ number_format(\App\Order::whereBetween('order_date', [ \Carbon::now()->addMonths($i)->format('Y-m-01 00:00:00'), \Carbon::now()->addMonths($i)->endOfMonth()->format('Y-m-d 23:59:59') ])->sum('total'), 0,0,',') }}</td>
                    <td>{{ \App\Order::whereBetween('order_date', [ \Carbon::now()->addMonths($i)->format('Y-m-01 00:00:00'), \Carbon::now()->addMonths($i)->endOfMonth()->format('Y-m-d 23:59:59') ])->whereIn('status', ['Delivered', 'Paid'])->count() }}</td>
                    <td>{{ number_format( \App\Order::whereBetween('order_date', [ \Carbon::now()->addMonths($i)->format('Y-m-01 00:00:00'), \Carbon::now()->addMonths($i)->endOfMonth()->format('Y-m-d 23:59:59') ])->whereIn('status', ['Delivered', 'Paid'])->sum('total'), 0,0,',') }}</td>
                    <td>{{ 
                            number_format(
                            round(
                            \App\Order::whereBetween('order_date', [ \Carbon::now()->addMonths($i)->format('Y-m-01 00:00:00'), \Carbon::now()->addMonths($i)->endOfMonth()->format('Y-m-d 23:59:59') ])->whereIn('status', ['Delivered', 'Paid'])->sum('total')
                            -  
                            \App\Order::whereBetween('order_date', [ \Carbon::now()->addMonths($i)->format('Y-m-01 00:00:00'), \Carbon::now()->addMonths($i)->endOfMonth()->format('Y-m-d 23:59:59') ])->whereIn('status', ['Delivered', 'Paid'])->sum('delivery_charge')
                            - 
                            \App\Order::whereBetween('order_date', [ \Carbon::now()->addMonths($i)->format('Y-m-01 00:00:00'), \Carbon::now()->addMonths($i)->endOfMonth()->format('Y-m-d 23:59:59') ])->whereIn('status', ['Delivered', 'Paid'])->sum('total') * 0.01
                            -
                            \App\Order::whereBetween('order_date', [ \Carbon::now()->addMonths($i)->format('Y-m-01 00:00:00'), \Carbon::now()->addMonths($i)->endOfMonth()->format('Y-m-d 23:59:59') ])->whereIn('status', ['Delivered', 'Paid'])->count() * 20
                            , 2),
                            0,0,',')
                        }}
                    </td>
                </tr>
                @endfor
                <tr>
                    <td><b>Total</b></td>
                    <td>{{ \App\Order::count() }}</td>
                    <td>{{ number_format( \App\Order::sum('total'), 0,0,',') }}</td>
                    <td>{{ \App\Order::whereIn('status', ['Delivered', 'Paid'])->count() }}</td>
                    <td>{{ number_format( \App\Order::whereIn('status', ['Delivered', 'Paid'])->sum('total'), 0,0,',') }}</td>
                    <td>
                        {{ 
                            number_format(
                            round(
                            \App\Order::whereIn('status', ['Delivered', 'Paid'])->sum('total')
                            -  
                            \App\Order::whereIn('status', ['Delivered', 'Paid'])->sum('delivery_charge')
                            - 
                            \App\Order::whereIn('status', ['Delivered', 'Paid'])->sum('total') * 0.01
                            -
                            \App\Order::whereIn('status', ['Delivered', 'Paid'])->count() * 20
                            , 2),
                            0,0,',')
                        }}
                    </td>
                </tr>
            </tbody>
        </table>
        
        
    </div>
    
    
</div>

@stop
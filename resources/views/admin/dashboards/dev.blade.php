@extends('admin.layout')

@section('main')

<main class="column is-12-desktop is-12-mobile is-12-tablet padding-0 columns is-multiline" id="admin-dashboard">
    
    <div class="column is-12-mobile is-12-tablet is-12-desktop">
        <p class="has-text-justified tags margin-top-30">
            @foreach( \App\Order::groupBy('status')->pluck('status') as $status )
            <a href="{{ action('AdminOrders@index') }}/{{ str_slug( strtolower($status), '-' ) }}" class="tags has-addons margin-right-10">
                <span class="tag">{{ $status }}</span>
                <span class="tag is-primary">{{ \App\Order::where('status','like', $status)->count() }}</span>
            </a>
            @endforeach
            <a href="{{ action('AdminOrders@index') }}" class="tags has-addons margin-right-10">
                <span class="tag">Total</span>
                <span class="tag is-danger">{{ \App\Order::count() }}</span>
            </a>
            <span class="placeholder"></span>
        </p>
    </div>
    
    <div class="column is-12-mobile is-6-tablet is-6-desktop">
        <h3 class="title is-4">Order Summary</h3>
                
        <table class="table is-bordered is-striped is-narrow is-fullwidth">
            <thead>
                <tr>
                    <td></td>
                    <td>Qty</td>
                    <td>Deliv</td>
                    <td>Val</td>
                    <td>Deliv</td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>This Month</td>
                    <td>{{ $this_month['count'] }}</td>
                    <td>{{ $this_month['delivered_count'] }}</td>
                    <td>{{ $this_month['total'] }}</td>
                    <td>{{ $this_month['delivered_total'] }}</td>
                </tr>
                <tr>
                    <td>Last Month</td>
                    <td>{{ $last_month['count'] }}</td>
                    <td>{{ $last_month['delivered_count'] }}</td>
                    <td>{{ $last_month['total'] }}</td>
                    <td>{{ $last_month['delivered_total'] }}</td>
                </tr>
            </tbody>
        </table>
        
        <table class="table is-bordered is-striped is-narrow is-fullwidth">
            <thead>
                <tr>
                    <td>O.Date</td>
                    <td>Qty</td>
                    <td>Deliv</td>
                    <td>Val</td>
                    <td>Deliv</td>
                </tr>
            </thead>
            <tbody>
                @if( count( $orders ) > 0 )
                @foreach( $orders as $order )
                <tr>
                    <td>{{ \Carbon::createFromFormat('Y-m-d', $order['date'])->format('F-d') }}</td>
                    <td>{{ $order['count'] }}</td>
                    <td @if( $order['count'] - $order['delivered_count'] > 0 ) class="yellow-bg" @endif >{{ $order['delivered_count'] }}</td>
                    <td>{{ $order['total'] }}</td>
                    <td>{{ $order['delivered_total'] }}</td>
                </tr>
                @endforeach
                @endif
            </tbody>
        </table>
    
    </div>
    
    <div class="column is-12-mobile is-6-tablet is-6-desktop">
        <p class="title is-4">Stock</p>
        <table class="table is-bordered is-striped is-narrow is-fullwidth">
            <thead>
                <tr>
                    <td>Category</td>
                    <td>Qty</td>
                    <td>Qty</td>
                    <td>Sale Value</td>
                </tr>
            </thead>
            <tbody>
                @if( \App\Category::count() > 0 )
                @foreach( \App\Category::all() as $category)
                <tr>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->products()->count() }} | {{ $category->products()->where('stock_quantity', '>', 0)->count() }}</td>
                    <td>{{ $category->products()->sum('stock_quantity') }}</td>
                    <td class="has-text-right">{{ number_format( $category->products()->select( \DB::raw(' SUM( stock_quantity * price ) as p ') )->pluck('p')[0], 0, '.', ',' ) }}</td>
                </tr>
                @endforeach
                @endif
                <tr>
                    <td>{{ \App\Category::count() }} Categories</td>
                    <td>{{ \App\Product::count() }} | {{ \App\Product::where('stock_quantity', '>', 0)->count() }}</td>
                    <td>{{ \App\Product::sum('stock_quantity') }}</td>
                    <td class="has-text-right">{{ number_format( \App\Product::select( \DB::raw(' SUM( stock_quantity * price ) as p ') )->pluck('p')[0] , 0, '.', ',') }}</td>
                </tr>
            </tbody>
        </table>
    </div>
    
    
</main>

@stop
@extends('admin.layout')

@section('main')

<div class="column is-12-desktop is-12-mobile columns is-multiline padding-top-10 padding-bottom-20 margin-0 padding-left-0 padding-right-0 has-text-uppercase admin-cart" >
    
    <div class="column is-12-desktop is-12-mobile padding-left-0 padding-right-0">
        <h1 class="title is-3">
            Stock Summary
        </h1>
    </div>
    
    <div class="column is-12-desktop is-12-mobile padding-left-0 padding-right-0">
    {!! errors($errors) !!}
    </div>
    
    <section class="column is-12-desktop is-12-mobile scrollable">
        @if( \App\Product::count() > 0 )
        <table class="table is-bordered is-striped is-narrow">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Thumb</th>
                    <th>Stock</th>
                    <th>Sale</th>
                    <th>Purchase</th>
                    <th>Margin on Sale</th>
                    <th>Target Mkt</th>
                    <th>Target Pckg</th>
                    <th>Target Delv</th>
                    <th>Target Profit</th>
                    <th>Orders</th>
                    <th>Ordered Qty</th>
                    <th>Deliv Qty</th>
                </tr>
            </thead>
            <tbody>
                @foreach( $products as $product )
                <tr>
                    <td>
                        {{ $product->id }}
                    </td>
                    <td>
                        <a href="{{ action( 'CategoryPublic@'.$product->category->name_slug.'Item', $product->id ) }}" target="_blank" >
                            <img data-lazy="{{ $product->thumb_image }}" alt="" class="image is-64x64">
                        </a>
                    </td>
                    <td>
                        {{ $product->stock_quantity }}
                    </td>
                    <td>
                        {{ $product->price }}
                    </td>
                    <td>
                        {{ $product->purchase_price }}
                    </td>
                    <td>
                        {{ $product->price - $product->purchase_price }} ({{ round( ($product->price - $product->purchase_price) / $product->price * 100, 2 ) }}%)
                    </td>
                    <td>
                        84.25 ($1)
                    </td>
                    <td>
                        20
                    </td>
                    <td>
                        65
                    </td>
                    <td>
                        {{ $product->price - $product->purchase_price - 84.25 - 20 - 65 }} ({{ round( ($product->price - $product->purchase_price - 84.25 - 20 - 65) / $product->price * 100, 2 ) }}%)
                    </td>
                    <td>
                        {{ $product->orders()->count() }}
                    </td>
                    <td>
                        {{ $product->orders()->sum('quantity') }} ({{ number_format( $product->orders()->sum('value'), 0, 0, ',' ) }} Tk)
                    </td>
                    <td>
                        {{ $product->orders()->join('orders','orders.id','order_products.order_id')->whereIn('orders.status',['Delivered','Paid'])->sum('order_products.quantity') }} ({{ number_format( $product->orders()->join('orders','orders.id','order_products.order_id')->whereIn('orders.status',['Delivered','Paid'])->sum('order_products.value'), 0, 0, ',' ) }} Tk)
                    </td>
                </tr>
                @endforeach
                
            </tbody>
        </table>
        {!! $products->links() !!}
        @endif
    </section>
</div>
@stop
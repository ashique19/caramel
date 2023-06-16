@extends('admin.layout')

@section('main')

<div class="column is-12-desktop is-12-mobile padding-top-10 padding-bottom-20 has-text-uppercase" >
    
    <div class="column is-12-desktop is-12-mobile padding-left-0">
        <h1 class="title is-3">
            Stock Revenue Summary
        </h1>
    </div>
    
    <div class="column is-12-desktop is-12-mobile padding-left-0">
    {!! errors($errors) !!}
    </div>
    
    <div class="column is-12-desktop is-12-mobile padding-left-0">
        <a href="{{ action('Reports@stockRevenueSummary') }}" class="tag margin-bottom-5"><i class="fa fa-arrow-left"></i> &nbsp; Re-populate report</a>
        <span class="tag is-pulled-right">{{ $from }} - {{ $to }}</span>
    </div>
    
    @if( count( $products ) > 0 )
    <?php $total = 0; ?>
    <div class="column is-12-desktop is-12-mobile padding-left-0">
        <table class="table is-narrow is-bordered is-striped">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Discount</th>
                    <th>+Charge-Courier-COD(1.5%)-Operation(10%)-Fin(1.5%)-Mkt-Others</th>
                    <th>Purchase/Material</th>
                    <th>Profit</th>
                </tr>
            </thead>
            <tbody>
                @foreach( $products as $product )
                <?php
                    $sale =  $product->value 
                        - ( $product->total > 0 ? round( $product->discount / $product->total * $product->value ) : 0 ) 
                        + ( $product->total > 0 ? round( $product->charge / $product->total * $product->value ) : 0 ) 
                        - ( $product->total > 0 ? round( $product->delivery_charge / $product->total * $product->value ) : 0 ) 
                        - ( $product->value > 0 ? round( $product->value * 0.015 ) : 0 ) 
                        - ( $product->value > 0 ? round( $product->value * 0.1 ) : 0 ) 
                        - ( $product->value > 0 ? round( $product->value * 0.015 ) : 0 ) 
                        - 84 * $product->quantity
                        - 30;
                        
                    $total += $sale;
                ?>
                <tr>
                    <td>{{ substr( $product->order_date, 0, 10 ) }}</td>
                    <td>
                        <img data-lazy="{{ $product->product_image }}" alt="Image" class="image is-24x24">
                    </td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->quantity }}</td>
                    <td>{{ $product->total > 0 ? round( $product->discount / $product->total * $product->value ) : '' }}</td>
                    <td>
                        + {{ ( $product->total > 0 ? round( $product->charge / $product->total * $product->value ) : 0 ) }}
                        - {{ ( $product->total > 0 ? round( $product->delivery_charge / $product->total * $product->value ) : 0 ) }}
                        - {{ ( $product->value > 0 ? round( $product->value * 0.015 ) : 0 ) }}
                        - {{ ( $product->value > 0 ? round( $product->value * 0.1 ) : 0 ) }}
                        - {{ ( $product->value > 0 ? round( $product->value * 0.015 ) : 0 ) }}
                        - {{ 84 * $product->quantity }}
                        - 30
                    </td>
                    <td>{{ $product->purchase_price * $product->quantity }}</td>
                    <td>
                        {{ $sale - $product->purchase_price * $product->quantity }}
                    </td>
                </tr>
                @endforeach
                <tr>
                    <td></td>
                    <td></td>
                    <td>{{ $products->sum('price') }}</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>{{ $total }}</td>
                </tr>
            </tbody>
        </table>
    </div>
    
    @endif
    
</div>

@stop
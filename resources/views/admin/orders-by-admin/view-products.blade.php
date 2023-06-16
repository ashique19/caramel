@extends('admin.layout')

@section('main')

<div class="column is-12-desktop is-12-mobile padding-top-10 padding-bottom-20 has-text-uppercase admin-cart" >
    <h1 class="title is-1">ORDERED PRODUCTS</h1>
    
    <div class="column is-12">
        <table class="table is-bordered">
            <tbody>
                @if( count( $products ) > 0 )
                @foreach( $products as $product )
                <tr>
                    <td>
                        <img width="200" data-src="{{ $product->thumb_image }}" class="lazy">
                    </td>
                    <td>
                        {{ \App\Order_product::where('product_id', $product->id)->whereIn('order_id', $order_ids)->sum('quantity') }}
                    </td>
                </tr>
                @endforeach
                @endif
            </tbody>
        </table>
    </div>
    
</div>



@section('js')

<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery.lazy/1.7.6/jquery.lazy.min.js"></script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery.lazy/1.7.6/jquery.lazy.plugins.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    $('.lazy').Lazy({
        // your configuration goes here
        scrollDirection: 'vertical',
        effect: 'fadeIn',
        visibleOnly: true,
        onError: function(element) {
            console.log('error loading ' + element.data('src'));
        }
    });
})
</script>

@stop
@stop
@extends('admin.layout')

@section('main')

<div class="column is-12-desktop is-12-mobile padding-top-10 padding-bottom-20 has-text-uppercase" >
    
    <div class="column is-12 padding-left-0">
        <h1 class="title is-3">
            ORDERED PRODUCTS
            <button class="button is-small is-dark is-pulled-right" data-toggle="collapse" data-target="#admin-search" >
                <i class="fas fa-search margin-right-5"></i>
                Search
            </button>
        </h1>
    </div>
    
    <div class="column is-12 padding-left-0">
    {!! errors($errors) !!}
    </div>
    
    
    <div class="column is-12 collapse" id="admin-search">
        
        {!! Form::open([ 'url'=> action('AdminOrders@postOrderedProducts'), 'class'=> 'columns is-multiline']) !!}
        
        <div class="field column is-3-desktop is-6-mobile padding-left-0">
            <label class="label has-text-left padding-left-0">Name</label>
            <div class="control">
                <input class="input" type="text" placeholder="Name" name="name">
            </div>
        </div>
        
        <div class="field column is-3-desktop is-6-mobile padding-left-0">
            <label class="label has-text-left padding-left-0">Address</label>
            <div class="control">
                <input class="input" type="text" placeholder="Address" name="address">
            </div>
        </div>
        
        <div class="field column is-3-desktop is-6-mobile padding-left-0">
            <label class="label has-text-left padding-left-0">Phone</label>
            <div class="control">
                <input class="input" type="text" placeholder="Phone" name="contact">
            </div>
        </div>
        
        <div class="field column is-3-desktop is-6-mobile padding-left-0">
            <label class="label has-text-left padding-left-0">Email</label>
            <div class="control">
                <input class="input" type="text" placeholder="Email" name="email">
            </div>
        </div>
        
        
        <div class="field has-addons column is-4-desktop is-6-mobile padding-left-0">
            <div class="control">
                <a class="button is-info">
                Order Between
                </a>
            </div>
            <div class="control">
                <input class="input" type="text" placeholder="From" name="order_from" >
            </div>
            <div class="control">
                <input class="input" type="text" placeholder="To" name="order_to" >
            </div>
        </div>
        
        <div class="field has-addons column is-4-desktop is-6-mobile padding-left-0">
            <div class="control">
                <a class="button is-info">
                Dispatch Between
                </a>
            </div>
            <div class="control">
                <input class="input" type="text" placeholder="From" name="dispatch_from" >
            </div>
            <div class="control">
                <input class="input" type="text" placeholder="To" name="dispatch_to" >
            </div>
        </div>
        
        <div class="field has-addons column is-4-desktop is-6-mobile padding-left-0">
            <div class="control">
                <a class="button is-info">
                Delivery Between
                </a>
            </div>
            <div class="control">
                <input class="input" type="text" placeholder="From" name="delivery_from" >
            </div>
            <div class="control">
                <input class="input" type="text" placeholder="To" name="delivery_to" >
            </div>
        </div>
        
        <div class="field has-addons column is-4-desktop is-6-mobile padding-left-0">
            <div class="control">
                <a class="button is-info">
                Status
                </a>
            </div>
            <div class="control">
                <div class="select">
                    <select name="status">
                        <option value="">-All-</option>
                        <option value="New">New</option>
                        <option value="Dispatch">Dispatch</option>
                        <option value="Delivered">Delivered</option>
                        <option value="Paid">Paid</option>
                        <option value="Return">Return</option>
                    </select>
                </div>
            </div>
        </div>
        
        <div class="field has-addons column is-4-desktop is-6-mobile padding-left-0">
            <div class="control">
                <a class="button is-info">
                Courier
                </a>
            </div>
            <div class="control">
                <div class="select">
                    {!! Form::select('courier_id', \App\Courier::pluck('name', 'id'), null, ['placeholder'=> '-All-'] ) !!}
                </div>
            </div>
        </div>
        

        
                
        <div class="field column is-12 padding-left-0">
            <div class="control has-text-centered">
                {!! Form::submit('Search', ['class'=> 'button yellow-bg font-weight-700']) !!}
            </div>
        </div>
        
        {!! Form::close() !!}
        
    </div>
    
    <div class="column is-12 scrollable selectable-checkbox-group padding-bottom-100">
        
        @if( count($products) > 0)
        <table class="table is-bordered">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Ordered Qty</th>
                    <th>Stock Qty</th>
                    <th>Edit Product</th>
                </tr>
            </thead>
            <tbody>
        @foreach( $products as $product )
        <tr>
            <td width="290" class="font-size-11">
                <p>
                    <a href="">
                        <img class="lazy" data-src="{{ sm_link( $product->thumb_image ) }}" alt="{{$product->name}}" width="80" />
                    </a>
                </p>
            </td>
            <td>{{ \App\Order_product::where('product_id', $product->id)->sum('quantity') }}</td>
            <td>{{ $product->stock_quantity }}</td>
            <td>
                @if( in_array( auth()->user()->role, [1,2,3] ) )
                @include('public.partials.product-edit-button')
                @endif
            </td>
        </tr>
        @endforeach
            </tbody>
        </table>
        
        {!! $products->render() !!}
        @endif
        
    </div>
    
</div>

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
    
})
</script>

@stop
@stop
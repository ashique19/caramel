@extends('admin.layout')

@section('main')

<div class="column is-12-desktop is-12-mobile padding-top-10 padding-bottom-20 has-text-uppercase admin-cart" >
    <h1 class="title is-1 xs-margin-top-20">EDIT ORDER</h1>
    
    {!! Form::open([ 'class'=>'form padding-left-10 padding-right-10 columns is-multiline', 'url'=> action('AdminOrders@update', $order->id), 'method'=>'PATCH', 'enctype'=>'multipart/form-data' ]) !!}
    
    <div class="column is-12">
    {!! errors($errors) !!}
    </div>
    
    <!--Ordered products-->
    @if( $order->products()->count() > 0 )
    <div class="column is-12-desktop is-12-mobile padding-left-0 ">
        <h3 class="subtitle is-2">ORDERED PRODUCTS</h3>
        <table class="table is-bordered">
            <tbody>
                
                @foreach( $order->products as $product )
                <tr class="product">
                    <td>
                        {!! Form::hidden('product_id[]', $product->product_id) !!}
                        <a href="{{ action('CategoryPublic@'.$product->product->category->name_slug.'Item', $product->id) }}">
                            <img width="90" class="lazy" data-src="{{ xs_link( $product->product_image ) }}" alt="{{ $product->name }}"></img>
                        </a>
                    </td>
                    <td width="100">
                        <div class="control">
                            <input name="price[]" class="input is-small" type="text" placeholder="Primary input" value="{{ $product->price }}">
                        </div>
                    </td>
                    <td width="200">
                        <div class="field has-addons">
                            <p class="control">
                                <a class="button is-small decrease">
                                    <span class="icon is-small">
                                        <i class="fas fa-minus"></i>
                                    </span>
                                </a>
                            </p>
                            <p class="control">
                                <input name="quantity[]" type="text" class="input is-small has-text-centered" value="{{ $product->quantity }}">
                            </p>
                            <p class="control">
                                <a class="button is-small increase">
                                    <span class="icon is-small">
                                        <i class="fas fa-plus"></i>
                                    </span>
                                </a>
                            </p>
                        </div>
                    </td>
                    <td class="product-total">
                        {{ $product->value }}
                    </td>
                </tr>
                @endforeach
                
            </tbody>
        </table>
        
    </div>
    @endif
    
    
    @if( count($categories) > 0 )
    <div class="column is-12-desktop is-12-mobile padding-5">
    @foreach( $categories as $category )
    
        <button class="button is-info" get-products-for-order="{{ $category->name_slug }}" type="button" data-toggle="collapse" data-target="#{{ $category->name_slug }}" aria-expanded="false" aria-controls="{{ $category->name_slug }}">
            {{ $category->name }}
        </button>
    
    @endforeach
    </div>
    @endif
    
    <!--All Products-->
    @if( count($categories) > 0 )
    @foreach( $categories as $category )
    <div class="collapse width-100-percent" id="{{ $category->name_slug }}">
        
        <div class="columns is-multiline">
            <div class="column is-12">
                <table class="table is-bordered">
                    <tbody>
                        
                    </tbody>
                </table>
                
            </div>
        </div>
            
    </div>
    @endforeach
    
    <h3 class="subtitle is-2">BUYER INFO</h3>
    <table class="table is-bordered">
        <tr>
            <td width="150">NAME:</td>
            <td><input value="{{ $order->name }}" name="c_name" type="text" class="input is-small min-width-100" required /></td>
            <td width="250" class="yellow-bg">SUB-TOTAL</td>
            <td width="250" class="yellow-bg"><input value="{{ $order->subtotal }}" name="sub_total" type="text" class="input is-small" value="0" /></td>
        </tr>
            <td>ADDRESS:</td>
            <td><input value="{{ $order->address }}" name="address" type="text" class="input is-small" required /></td>
            <td class="yellow-bg">+ CHARGE</td>
            <td class="yellow-bg"><input value="{{ $order->charge }}" name="charge" type="text" class="input is-small" value="0" /></td>
        </tr>
        <tr>
            <td>AREA:</td>
            <td><input value="{{ $order->area }}" name="area" type="text" class="input is-small" required /></td>
            <td class="yellow-bg">- DISCOUNT</td>
            <td class="yellow-bg"><input value="{{ $order->discount }}" name="discount" type="text" class="input is-small" value="0" /></td>
        </tr>
            <td>CITY:</td>
            <td><input value="{{ $order->city }}" name="city" type="text" class="input is-small" value="Dhaka" required /></td>
            <td class="yellow-bg">= TOTAL</td>
            <td class="yellow-bg"><input value="{{ $order->total }}" name="total" type="text" class="input is-small" value="0" /></td>
        </tr>
        <tr>
            <td>PHONE NO.:</td>
            <td><input value="{{ $order->phone }}" name="phone" type="text" class="input is-small" value="+8801" required /></td>
            <td>ORDER DATE <input value="{{ $order->order_date }}" name="order_date" type="text" class="input is-small datepicker" value="{{ date('Y-m-d H:i:s') }}" /></td>
            <td>DELIVERY DATE & TIME <input value="{{ $order->expected_delivery_date }}" name="expected_delivery_date" type="text" class="input is-small" value="{{\Carbon::now()->addDay(1)->format('Y-m-d H:i:s')}}" /></td>
        </tr>
        <tr>
            <td>NOTE:</td>
            <td colspan="3">
                <textarea value="{{ $order->note }}" name="note" id="note" cols="20" rows="5" class="textarea"></textarea>
            </td>
        </tr>
        <tr>
            <td colspan="4">
                {!! Form::submit('SUBMIT', ['class'=>'button is-large is-fullwidth font-weight-700 yellow-bg yellow-border black-text']) !!}
            </td>
        </tr>
    </table>
    
    
    @endif
    
    {!! Form::close() !!}
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
    
    $('[get-products-for-order]').click(function(){
    	var button = $(this),
    		name = button.attr('get-products-for-order'),
    		container = $('#'+name).find('tbody');
    	
    	if( container.children().length == 0 ){
    		
    		button.addClass('is-loading');
    
    		container.load('/admin/products-for-order/'+name, function(){
    
    			button.removeClass('is-loading');
    
    			container.find('.lazy').Lazy({
                    // your configuration goes here
                    scrollDirection: 'vertical',
                    effect: 'fadeIn',
                    visibleOnly: true,
                    onError: function(element) {
                        console.log('error loading ' + element.data('src'));
                    }
                });
    
    		})
    
    	}
    
    })
    
    
    $('form').submit(function(e){
        e.preventDefault();
        
        let form = $(this),
            url = form.attr('action'),
            button = form.find('input[type="submit"]');
            
        button.val('SAVING...');
        
        p = {
            _method: $('[name="_method"]').val(),
            _token: $('[name="_token"]').val(),
            name: $('[name="c_name"]').val(),
            address: $('[name="address"]').val(),
            area: $('[name="area"]').val(),
            city: $('[name="city"]').val(),
            phone: $('[name="phone"]').val(),
            sub_total: $('[name="sub_total"]').val(),
            charge: $('[name="charge"]').val(),
            discount: $('[name="discount"]').val(),
            order_date: $('[name="order_date"]').val(),
            expected_delivery_date: $('[name="expected_delivery_date"]').val(),
            note: $('[name="note"]').val(),
            data:[]
        };
        
        $('[name="quantity[]"]').each((i,v)=>{
        	if($(v).val() > 0){
        		p.data.push({
        			product_id: $(v).parents('tr').find('[name="product_id[]"]').val(),
        			quantity: $(v).parents('tr').find('[name="quantity[]"]').val(),
        			price: $(v).parents('tr').find('[name="price[]"]').val(),
        		})
        	}
        });
        
        $.post(url, p, function(data){
            
            button.removeClass('is-loading');
            
            if( data == 1 ){
                
                button.val('SAVED. RELOADING...');
                
                setTimeout(()=>{
                    
                    window.location.href = window.location.href;
                    
                },3000);
                
            } else{
                
                button.val('ERROR. SAVING FAILED. RETRY?');
                
            }
            
        });
        
        
    });
})
</script>

@stop
@stop
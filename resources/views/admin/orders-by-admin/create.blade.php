@extends('admin.layout')

@section('main')

<div class="column is-12-desktop is-12-mobile padding-top-10 padding-bottom-20 padding-left-0 padding-right-0 has-text-uppercase admin-cart" >
    <h1 class="title is-3">NEW ORDER</h1>
    
    {!! Form::open([ 'class'=>'form columns is-multiline', 'url'=> action('AdminOrders@store'), 'enctype'=>'multipart/form-data' ]) !!}
    
    <div class="column is-12-desktop is-12-mobile padding-top-0 padding-bottom-0">
    {!! errors($errors) !!}
    </div>
    
    @if( count($categories) > 0 )
    <div class="column is-12-desktop is-12-mobile has-text-justified">
    @foreach( $categories as $category )
    
        <button class="button is-small is-rounded margin-right-5 margin-bottom-5 is-info" get-products-for-order="{{ $category->name_slug }}" type="button" data-toggle="collapse" data-target="#{{ $category->name_slug }}" aria-expanded="false" aria-controls="{{ $category->name_slug }}">
            {{ $category->name }}
        </button>
    
    @endforeach
    </div>
    @endif
    
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
    
    <div class="column is-12-desktop is-12-mobile padding-0 scrollable">
        <h3 class="subtitle is-2-desktop is-12-mobile">BUYER INFO</h3>
        <table class="table is-bordered font-size-11">
            <tr>
                <td>PHONE NO.:</td>
                <td><input name="phone" type="text" class="input is-small" value="+88" required /></td>
                <td width="250" class="yellow-bg">SUB-TOTAL</td>
                <td width="250" class="yellow-bg"><input name="sub_total" type="text" class="input is-small" value="0" /></td>
            </tr>
                <td>ADDRESS:</td>
                <td><input name="address" type="text" class="input is-small" required /></td>
                <td class="yellow-bg">+ CHARGE</td>
                <td class="yellow-bg"><input name="charge" type="text" class="input is-small" value="0" /></td>
            </tr>
            <tr>
                <td>AREA:</td>
                <td><input name="area" type="text" class="input is-small" required /></td>
                <td class="yellow-bg">- DISCOUNT</td>
                <td class="yellow-bg"><input name="discount" type="text" class="input is-small" value="0" /></td>
            </tr>
                <td>CITY:</td>
                <td><input name="city" type="text" class="input is-small" value="Dhaka" required /></td>
                <td class="yellow-bg">= TOTAL</td>
                <td class="yellow-bg"><input name="total" type="text" class="input is-small" value="0" /></td>
            </tr>
            <tr>
                <td width="150">NAME:</td>
                <td><input name="c_name" type="text" class="input is-small xs-width-80" required /></td>
                <td>ORDER DATE <input name="order_date" type="text" class="input is-small datepicker" value="{{ date('Y-m-d H:i:s') }}" /></td>
                <td>DELIVERY DATE & TIME <input name="expected_delivery_date" type="text" class="input is-small" value="{{\Carbon::now()->addDay(1)->format('Y-m-d H:i:s')}}" /></td>
            </tr>
            <tr>
                <td>NOTE:</td>
                <td colspan="3">
                    <textarea name="note" id="note" cols="20" rows="5" class="textarea"></textarea>
                </td>
            </tr>
            <tr>
                <td colspan="4">
                    {!! Form::submit('SUBMIT', ['class'=>'button is-large is-fullwidth font-weight-700 yellow-bg yellow-border black-text']) !!}
                </td>
            </tr>
        </table>
    </div>
    
    @endif
    
    {!! Form::close() !!}
</div>



@section('js')

<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery.lazy/1.7.6/jquery.lazy.min.js"></script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery.lazy/1.7.6/jquery.lazy.plugins.min.js"></script>
<script type="text/javascript">

let get_address_by_phone;

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
    
    $('[name="phone"]').on('keyup change', function(){
        
        var phone = $(this),
            val     = phone.val().trim().replace(/ /g,'');
            
        phone.val( val );
        
        if( get_address_by_phone ){
            
            get_address_by_phone.abort();
            
        }
        
        if( val.length > 5 ){
        
            get_address_by_phone = $.ajax({
                url: '/admin/admin-orders/get-user-by-phone?q='+val.trim().replace(/ /g,''),
                method: 'get',
                success: function(data){
                    
                    if( typeof data.name != 'undefined' ){
                        
                        if( data.name.length > 2 ){
                            
                            $('[name="address"]').val( data.address );
                            $('[name="area"]').val( data.area );
                            $('[name="city"]').val( data.city );
                            $('[name="c_name"]').val( data.name );
                            
                        }
                        
                    }
                    
                }
            });
            
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
        			id: $(v).parents('tr').find('[name="product_id[]"]').val(),
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
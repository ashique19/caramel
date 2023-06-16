adminCart = function()
{
    
    cart = this,
    this.container = null;
    
    this.applyOn = function( holder ){
        
        this.container = holder;
        
        $(document).on({
            
            'keyup change': function(e){ cart.update_quantity( e, $(this).parents('.product'), $(this) ) }
            
        }, '[name="quantity[]"]');
        
        $(document).on({
            
            click: function(e){ cart.increase( e, $(this).parents('.product') ) }
            
        }, '.increase');
        
        $(document).on({
            
            click: function(e){ cart.decrease( e, $(this).parents('.product') ) }
            
        }, '.decrease');
        
        $(document).on({
            
            'keyup change': function(e){ cart.update_price( e, $(this).parents('.product'), $(this) ) }
            
        }, '[name="price[]"]');
        
        
        holder.find('[name=sub_total], [name=charge], [name=discount], [name=total]')
              .on('keyup change', function(e){ cart.calculate_total() } );
        
    }
    
    this.increase = function(e, product){
        
        e.preventDefault();
        
        var quantity_input = product.find('[name="quantity[]"]'),
            quantity = ( parseInt( quantity_input.val() ) + 1 || 1 ),
            price = parseInt( product.find('[name="price[]"]').val() ) || 0,
            product_total = quantity * price;
            
        quantity_input.val( quantity );
        
        product.find('.product-total').text( product_total );
        
        this.calculate_total();
        
        return this;
        
    }
    
    this.decrease = function(e, product){
        
        
        e.preventDefault();
        
        var quantity_input = product.find('[name="quantity[]"]'),
            quantity = ( parseInt( quantity_input.val() ) || 1 ) * 1 - 1,
            quantity = quantity < 0 ? 0 : quantity,
            price = parseInt( product.find('[name="price[]"]').val() ) || 0,
            product_total = quantity * price;
            
        quantity_input.val( quantity );
        
        product.find('.product-total').text( product_total );
        
        this.calculate_total();
        
        return this;
        
    }
    
    this.update_quantity = function(e, product, quantity_input){
                
        var quantity = ( parseInt( quantity_input.val() ) || 0 ),
            price = parseInt( product.find('[name="price[]"]').val() ) || 0,
            product_total = quantity * price;
        
        quantity_input.val( quantity );
        
        product.find('.product-total').text( product_total );
        
        this.calculate_total();
        
        return this;
        
    }
    
    
    this.update_price = function(e, product, price_input){
        
        var price = parseInt( price_input.val() ) || 0,
            quantity = parseInt( product.find('[name="quantity[]"]').val() ) || 0,
            product_total = quantity * price;
            
        product.find('.product-total').text( product_total );
        
        this.calculate_total();
                
        return this;
        
    }
    
    
    this.calculate_total = function(){
        
        var subTotal = 0,
            charge = parseInt( this.container.find('[name=charge]').val() ) || 0,
            discount = parseInt( this.container.find('[name=discount]').val() ) || 0,
            total = 0;
            
        this.container.find('.product-total').each(function(i,v){
            subTotal += ( parseInt( $(v).text() ) || 0 );
        })
        
        total = subTotal*1 + charge * 1 - discount * 1;
        
        this.container.find('[name=sub_total]').val(subTotal);
        this.container.find('[name=charge]').val(charge);
        this.container.find('[name=discount]').val(discount);
        this.container.find('[name=total]').val(total);
        
    }
    
}



var c = new adminCart();
    c.applyOn( $('.admin-cart') );
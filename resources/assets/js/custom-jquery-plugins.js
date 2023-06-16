(function($){
    
    
    $.fn.balanceHeight = function()
    {
        
        var max = 0;
        
        this.each(function(i,v){
            max = $(v).height() > max ? $(v).height() : max;
        })
        
        $(this).height(max);
        
        return this;
        
    }
    
    $.fn.productSearch = function()
    {
        
        $(document).on({
            click: function(e){
                if( $(e.target).parents('.search-bar').length == 0){
                    $('.searched-items .card-content').addClass('is-hidden');
                } else{
                    $('.searched-items .card-content').removeClass('is-hidden');
                }
            }
        })
        
        $(document).on({
            
            keyup: function(){
                
                var url = $(this).data('url') + '?q='+ $(this).val();
                
                $('.searched-items .card-content').text('loading..');
                
                if( window.productSearchInProgress ){
                    
                    window.productSearchInProgress.abort();
                    
                }
                
                window.productSearchInProgress = $.ajax({
                    method: 'GET',
                    url: url,
                    dataType: 'json',
                    success: function(data){
                        
                        $('.searched-items .card-content').empty();
                        
                        if( data.length > 0 ){
                            
                            data.forEach((v)=>{
                                $('.searched-items .card-content').append(`

                                <a class="media black-text" href="${v.url}">
                                    <div class="media-left margin-right-5">
                                        <figure class="image is-48x48">
                                        <img src="${v.img}" alt="Thumb">
                                    </figure>
                                    </div>
                                    <div class="media-content">
                                        <p class="font-size-14 font-weight-700">${v.name}</p>
                                        <p class="font-size-11">Price: ${v.price} tk</p>
                                    </div>
                                </a>

                                `);
                            })
                            
                        } else{
                            
                            $('.searched-items .card-content').empty();
                            
                        }
                        
                    }
                })
                
                
                
            }
            
        },'.product-search-value')
        
    }
    
}(jQuery));


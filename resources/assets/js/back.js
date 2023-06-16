$(document).ready(function(){
    
    // if( $('.datepicker').length > 0 ){ $('.datepicker').datepicker({ 'format': 'yyyy-mm-dd' }) }
    
    $('.datepicker').Calendar7({
        allowTimeStart: '9:00',
        allowTimeEnd: '20:00'
    })
    
    $('[data-toggle="popover"]').popover();
    
    $('.toggle-select').click(function(){
        
        if( $(this).is(':checked') ){
            
            $(this).parents('.selectable-checkbox-group').find('.selectable.checkbox').prop('checked', true);
            
        } else{
            
            $(this).parents('.selectable-checkbox-group').find('.selectable.checkbox').prop('checked', false);
            
        }
        
    });
    
    $('.selectable.checkbox').click(function(){
        
        $('.selectable-checkbox-group').each(function(i,v){
            
            if( $(v).find('.selectable.checkbox:not(".toggle-select")').length == $(v).find('.selectable.checkbox:checked:not(".toggle-select")').length ){
                
                $(v).find('.selectable.checkbox.toggle-select').prop('checked', true);
                
            } else{
                
                $(v).find('.selectable.checkbox.toggle-select').prop('checked', false);
                
            }
            
        })
        
    });
    
    $('[data-target="#admin-menu"]').click(function(){
        
        $('#admin-nav').toggleClass('hidden-xs');
        
    });
    
    $('[open-admin-search], [close-admin-search]').click(function(e){
            
        e.preventDefault();
        
        $('#admin-search').toggleClass('is-active');
        
    })
    
    
});
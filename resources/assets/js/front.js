var imagesPreview = function(input, placeToInsertImagePreview) {
  
  placeToInsertImagePreview.empty();

  if (input.files) {
      var filesAmount = input.files.length;

      for (i = 0; i < filesAmount; i++) {
          var reader = new FileReader();

          reader.onload = function(event) {
              $($.parseHTML('<img>')).attr('src', event.target.result).appendTo(placeToInsertImagePreview);
          }

          reader.readAsDataURL(input.files[i]);
      }
  }

};

const copyToClipboard = str => {
  const el = document.createElement('textarea');  // Create a <textarea> element
  el.value = str;                                 // Set its value to the string that you want copied
  el.setAttribute('readonly', '');                // Make it readonly to be tamper-proof
  el.style.position = 'absolute';                 
  el.style.left = '-9999px';                      // Move outside the screen to make it invisible
  document.body.appendChild(el);                  // Append the <textarea> element to the HTML document
  const selected =            
    document.getSelection().rangeCount > 0        // Check if there is any content selected previously
      ? document.getSelection().getRangeAt(0)     // Store selection if found
      : false;                                    // Mark as false to know no selection existed before
  el.select();                                    // Select the <textarea> content
  document.execCommand('copy');                   // Copy - only works as a result of a user action (e.g. click events)
  document.body.removeChild(el);                  // Remove the <textarea> element
  if (selected) {                                 // If a selection existed before copying
    document.getSelection().removeAllRanges();    // Unselect everything on the HTML document
    document.getSelection().addRange(selected);   // Restore the original selection
  }
};

function lazyLoad(){
  
  var lazy = [];
  
  $('[data-lazy]').each((i,v)=>{
    
    lazy[i] = new Image();
    lazy[i].src = $(v).data('lazy');
    
  })
  
  $('[data-lazy]').each((i,v)=>{
      
    if( ( $(window).scrollTop() + $(window).height() ) + 200 > ( $(v).offset().top ) ){
      
      $(v).attr('src', $(v).data('lazy') ).removeAttr('data-lazy');
      
    }
    
  })

  $(document).scroll(function(){
    
    $('[data-lazy]').each((i,v)=>{
      
      if( ( $(window).scrollTop() + $(window).height() ) + 200 > ( $(v).offset().top ) ){
        
        $(v).attr('src', $(v).data('lazy') ).removeAttr('data-lazy');
        
      }
      
    })
    
  })
  
}

$(document).ready(function(){
  
  setTimeout(_=>{ lazyLoad() }, 500);
  
  $('[data-toggle="tooltip"]').tooltip();
  
  $('[data-toggle="popover"]').popover();
  
  $(document).productSearch();
  
  $(document).on({ click: function(){ copyToClipboard( $(this).text() ) } }, '.copy');
  
  if( $('.slick').length > 0 ){ $('.slick').slick(); }
  
  $(document).on({ change: function(){ imagesPreview(this, $(this).parents('.image-upload').find('.preview') ) } }, '.file.image-file');
  
  $('.topbar-toggler').click(function(e){
    
    e.preventDefault();
    
    $( $(this).data('target') ).toggleClass('is-active');
    
  })
  

  $('.category-sidebar > .next').click(function(e){
    
    e.preventDefault()
    
    $('.category-sidebar > nav').scrollLeft( $('.category-sidebar > nav').scrollLeft() + 100 );
    
  })

  $('.category-sidebar > .prev').click(function(e){
    
    e.preventDefault()
    
    $('.category-sidebar > nav').scrollLeft( $('.category-sidebar > nav').scrollLeft() - 100 );
    
  })
  
  $(document).on({
        
    click: function(e){
        
        e.preventDefault();
        
        let source = $(this).data('edit-product');
        
        let editor = new Promise( (resolve, reject) => {
            
            if( $(document).find("#product-edit-modal").length == 0 ){
            
                $('body').append(`
                <div class="modal is-active padding-top-70">
                    <div class="modal-background"></div>
                    <div class="modal-content">
                        <section id="product-edit-modal" class="columns is-multiline padding-20">
                            <span class="button is-loading margin-50 border-width-0"></span>
                        </section>
                    </div>
                    <button class="modal-close is-large product-modal margin-top-60" aria-label="close"></button>
                </div>
                `);
            
            } else{
                
                $(document).find("#product-edit-modal").html(`
                <section id="product-edit-modal">
                    <span class="button is-loading margin-50 border-width-0"></span>
                </section>
                `).parents('.modal').addClass('is-active');
                
            }
            
            console.log('before');
            resolve();
            
        });
        
        
        editor.then(_=>{
          console.log('after');
          console.log(source);
          $(document).find("#product-edit-modal").load(source);
          
        })
        
    }
    
}, '[data-edit-product]');

$(document).on({
  click: function(e){
    
    e.preventDefault();
    
    $('#product-edit-modal').empty();
    
    $(this).parents('.modal').removeClass('is-active');
    
  }
}, '.modal-close.product-modal')
  
});


// $(window).load(function(){
  
//   lazyLoad();
  
// })
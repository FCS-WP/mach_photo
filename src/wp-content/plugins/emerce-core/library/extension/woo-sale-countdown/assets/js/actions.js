(function($) {
    $(document).on('ready', function(){

        if ( XPSC_ajax_data.stillValid && null !== XPSC_ajax_data.endDate ) {
            
        
            
            

      $('#emercetimer').countDown();
            
      
               
        } else {
            
            $( ".xpsc-product-coutdown-wrapper" ).hide();
            
        }
        
        
       
         
      $('.xpsc-product-coutdown-wrapper-alt #emercetimer').countDown({
                label_mm: 'mins',
                label_ss: 'secs',
                separator: '|',
                
            });
         
    })

})(jQuery);

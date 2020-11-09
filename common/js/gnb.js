   $(document).ready(function() {
   

    $('ul.dropdownmenu').hover(
        function() { 
            $('ul.dropdownmenu li.menu ul').fadeIn('normal',function(){$(this).stop();});
	        $('.menu_box').slideDown('fast',function(){$(this).stop();});
                 },
        function() {
	    
	      $('ul.dropdownmenu li.menu ul').fadeOut('fast');
        $('.menu_box').slideUp('normal');
    });
               
            $('ul.dropdownmenu li.menu').hover(
            function() { 
	            $(this).find('h3').find('a').css('color','#0089cf');  
                 },
            function() {
	            $(this).find('h3').find('a').css('color','#333'); 
      
        });
       //tab키처
         $('ul.dropdownmenu li.menu .depth1').on('focus', function () {        
                    $('ul.dropdownmenu li.menu ul').slideDown('fast');
                    $('.menu_box').slideDown('fast');
          });

         $('ul.dropdownmenu li.m6 li:last').find('a').on('blur', function () {        
                  $('ul.dropdownmenu li.menu ul').slideUp('fast');
                  $('.menu_box').slideUp('fast');
         });
       
});
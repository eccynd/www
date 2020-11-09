// JavaScript Document
 $(document).ready(function() {
   var position=0;  //최초위치 목적지(left)
   var movesize=300; //이미지 하나의 너비
   var timeonoff;
   
    $('.slide_gallery ul').after($('.slide_gallery ul').clone());
       //슬라이드 겔러리를 한번 복제

   $('.button').click(function(event){
	var $target=$(event.target);
	//clearInterval(timeonoff);
	
	if($target.is('.m2')){
	     if(position==-2400){
	         $('.slide_gallery').css('left',-600);
	          position=-600;
	      }
		
	     position-=movesize;  // 150씩 감소
    	     $('.slide_gallery').stop().animate({left:position}, 'slow',
		  function(){							
		    if(position==-2400){
			   $('.slide_gallery').css('left',-600);
			   position=-600;
		    }
	      });
	}else if($target.is('.m1')){
	      if(position==0){
	           $('.slide_gallery').css('left',-1800);
	                 position=-1800;
                   }

          position+=movesize; // 150씩 증가
    	  $('.slide_gallery').stop().animate({left:position}, 'slow',
		  function(){							
		    if(position==0){
			   $('.slide_gallery').css('left',-1800);
			   position=-1800;
		    }
	       });
	  }
   });
   
   //최초 자동 슬라이드 기능
    timeonoff= setInterval(function () {
        position-=movesize;  // 150씩 감소
    	$('.slide_gallery').stop().animate({left:position}, 'slow',
	         function(){							
		    if(position==-2400){
			   $('.slide_gallery').css('left',-600);
			   position=-600;
		    }
	 });
     }, 5000);
   
 });


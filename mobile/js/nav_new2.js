$(document).ready(function() {
       //2depth 메뉴 교대로 열기 처리 
    var onoff=[false,false,false,false,false];
    var arrcount=onoff.length;
 	
   $(".menu_btn").click(function() { //메뉴버튼 클릭시
       
       var documentHeight =  $(document).height();
       //실제 페이지의 높이 = $(document).height();
       $(".box").css('height',documentHeight);
       $("#gnb").css('height',documentHeight);
       //반투명박스와 네비의 높이를 실제 페이지의 높이로 바꾸어라   

       $("#gnb").animate({right:0,opacity:1}, 350);
       $(".box").show();
       $("#gnb li span").hide();
       
       $('#gnb .depth1 ul').hide();
       $('#gnb .depth1>a').css('color','#333');
       for(var i=0; i<arrcount; i++)onoff[i]=false;
   });
   
   $(".box,.mclose").click(function() { //닫기버튼 클릭시
     $("#gnb").animate({right:'-100%',opacity:0}, 'fast');
     $(".box").hide();
     $("#gnb li span").hide();  
   });
     

    
    //console.log(arrcount);
    
    $('#gnb .depth1>a').click(function(){
        var ind=$(this).parents('.depth1').index();
        
        $('#gnb .depth1>a').css('color','#333');
        $(this).css('color','#0089cf');
        //console.log(ind);
        
       if(onoff[ind]==false){
        //$('#gnb .depth1 ul').hide();
        $(this).next('ul').slideDown('fast');
        $(this).parents('.depth1').siblings('li').find('ul').slideUp('fast');
         for(var i=0; i<arrcount; i++) onoff[i]=false; 
         onoff[ind]=true;
         
         $("#gnb li span").hide();
         $(this).find('span').show();
            
       }else{
         $(this).next('ul').slideUp('fast');
         onoff[ind]=false;   
           
         $(this).find('span').hide();
         $(this).css('color','#333');   
       }
    });    
   
  });



$(document).ready(function () {

     //스크롤의 좌표가 변하면.. 스크롤 이벤트
    $(window).on('scroll',function(){
        var scroll = $(window).scrollTop();
        //스크롤top의 좌표를 담는다

        $('.text').text(scroll);
        //스크롤 좌표의 값을 찍는다.

        //sticky menu 처리
        if(scroll>265){ 
            $('.header_inner').addClass('navOn');
            //스크롤의 거리가 265px 이상이면 서브메뉴 고정
        }else{
            $('.header_inner').removeClass('navOn');
            //스크롤의 거리가 265px 보다 작으면 서브메뉴 원래 상태로
        }

        if(scroll>265){
            $('.menu_box').addClass('menu_boxOn');
            //스크롤의 거리가 265px 이상이면 메뉴박스 고정
        }else{
            $('.menu_box').removeClass('menu_boxOn');
            //스크롤의 거리가 265px 보다 작으면 서브메뉴 원래 상태로
        }
        
        if(scroll>265){
            $('.header_position').addClass('header_positionOn');
            //스크롤의 거리가 265px 이상이면 메뉴박스 고정
        }else{
            $('.header_position').removeClass('header_positionOn');
            //스크롤의 거리가 265px 보다 작으면 서브메뉴 원래 상태로
        }
        

    });
});
$(document).ready(function () {
  //스크롤의 좌표가 변하면.. 스크롤 이벤트
  $(window).on('scroll', function () {
    var scroll = $(window).scrollTop();
    //스크롤top의 좌표를 담는다

    $('.text').text(scroll);
    //스크롤 좌표의 값을 찍는다.

    //sticky menu 처리

    if (scroll > 500) {
      $('.top_bar').addClass('top_barOn');
      //스크롤의 거리가 265px 이상이면 서브메뉴 고정
    } else {
      $('.top_bar').removeClass('top_barOn');
      //스크롤의 거리가 265px 보다 작으면 서브메뉴 원래 상태로
    }

    if (scroll > 500) {
      $('.logo a').addClass('logoOn');
      //스크롤의 거리가 265px 이상이면 메뉴박스 고정
    } else {
      $('.logo a').removeClass('logoOn');
      //스크롤의 거리가 265px 보다 작으면 서브메뉴 원래 상태로
    }

    if (scroll > 500) {
      $('.menu_btn').addClass('menu_btnOn');
      //스크롤의 거리가 265px 이상이면 메뉴박스 고정
    } else {
      $('.menu_btn').removeClass('menu_btnOn');
      //스크롤의 거리가 265px 보다 작으면 서브메뉴 원래 상태로
    }

    if (scroll > 300) {
      $('.business').addClass('businessOn');
      //스크롤의 거리가 265px 이상이면 메뉴박스 고정
    }
    if (scroll > 700) {
      $('.bottom_img').addClass('bottom_imgOn');
      //스크롤의 거리가 265px 이상이면 메뉴박스 고정
    }

    if (scroll > 1000) {
      $('.tech').addClass('techOn');
      //스크롤의 거리가 265px 이상이면 메뉴박스 고정
    }

    if (scroll > 1400) {
      $('.prcenter').addClass('prcenterOn');
      //스크롤의 거리가 265px 이상이면 메뉴박스 고정
    }

    if (scroll > 2100) {
      $('.service').addClass('serviceOn');
      //스크롤의 거리가 265px 이상이면 메뉴박스 고정
    }
  });
});

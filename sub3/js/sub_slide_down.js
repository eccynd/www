$(document).ready(function () {
  //스크롤의 좌표가 변하면.. 스크롤 이벤트
  $(window).on('scroll', function () {
    var scroll = $(window).scrollTop();
    //스크롤top의 좌표를 담는다

    $('.text').text(scroll);
    //스크롤 좌표의 값을 찍는다.

    if (scroll > 20) {
      $('.top_text').addClass('top_textOn');
      //스크롤의 거리가 265px 이상이면 서브메뉴 고정
    }

    if (scroll > 20) {
      $('.content_top img').addClass('top_imgOn');
      //스크롤의 거리가 265px 이상이면 서브메뉴 고정
    }

    if (scroll > 2800) {
      $('.content_bottom').addClass('content_bottomOn');
      //스크롤의 거리가 265px 이상이면 서브메뉴 고정
    }
  });
});

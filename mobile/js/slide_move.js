$(document).ready(function () {
  var th = $('headerArea').height() + $('.visual').height();
  $('.topMove').hide();

  //console. log(th);
  // console.log($('header').height());
  // console.log($('.main').height());

  $(window).on('scroll', function () {
    //스크롤의 거리가 발생되면
    var scroll = $(window).scrollTop();
    //스크롤이 움직이면 그해당 스크롤탑의 값이 저장된다

    $('.text').text(scroll);
    if (scroll > th) {
      $('.topMove').fadeIn('slow');
    } else {
      $('.topMove').fadeOut('fast');
    }
  });

  $('.topMove').click(function () {
    //상단으로 스르륵 이동합니다.
    $('html,body').stop().animate({ scrollTop: 0 }, 500);
  });

  var page_value = 0;

  $('.slideMenu .scroll').click(function (e) {
    //각각의 메뉴를 클릭하면
    e.preventDefault();

    //* $(this).is('.link1') / $(this).is('#link1')

    page_value = $('#content').offset().top - 50;

    $('html,body').stop().animate({ scrollTop: page_value }, 650);
  });
});

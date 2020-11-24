$(document).ready(function () {
  var sh = false;
  $('.menu_btn').click(function () {
    //메뉴버튼 클릭시
    //var documentHeight = $(document).height();
    //실제 페이지의 높이 = $(document).height();
    //$(".box").css('height', documentHeight);
    //$("#gnb").css('height', documentHeight);
    //반투명박스와 네비의 높이를 실제 페이지의 높이로 바꾸어라
    // $("#gnb").stop().fadeToggle('slow');
    //$('.box').stop().slideToggle('fast');

    if (sh == false) {
      $('body').css('overflow-y', 'hidden');
      $('#gnb').stop().fadeIn('fast');
      $('.box').stop().fadeIn(200);

      sh = true;
    } else {
      $('body').css('overflow-y', 'auto');
      $('#gnb').stop().fadeOut('fast');
      $('.box').stop().fadeOut(200);

      sh = false;
    }
  });
});

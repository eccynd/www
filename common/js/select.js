$(document).ready(function () {
  $('.select .arrow').click(function () {
    $('.select .aList').show();
  });
  $('.select .aList').mouseleave(function () {
    $(this).hide();
  });
  //tab키 처리
  $('.select .arrow').bind('focus', function () {
    $('.select .aList').show();
  });
  $('.select .aList li:last')
    .find('a')
    .bind('blur', function () {
      $('.select .aList').hide();
    });
});

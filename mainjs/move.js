// JavaScript Document

$(document).ready(function () {
  var timeonoff; //타이머 처리  홍길동 정보
  var imageCount = 3; //이미지개수
  var cnt = 1; //이미지 순서 1 2 3 4 5 1 2 3 4 5....
  var onoff = true; // true=>타이머 동작중 , false=>동작하지 않을때

  $('.btn1').css('background', '#fff'); //첫번째 불켜
  $('.btn1').css('height', '40');

  $('.gallery .link1').fadeIn(500); //첫번째 이미지 보인다..
  $('.gallery_text li:eq(0)').fadeIn('fast');

  function moveg() {
    cnt++; //카운트 1씩 증가.. 5가되면 다시 초기화 0  1 2 3 4 5 1 2 3 4 5..
    for (var i = 1; i <= imageCount; i++) {
      $('.gallery .link' + i).hide(0); //모든 이미지를 보이지 않게.
    }
    $('.gallery .link' + cnt).fadeIn(500); //자신만 이미지가 보인다..

    $('.gallery_text li').hide(0);
    $('.gallery_text li:eq(' + (cnt - 1) + ')').fadeIn('fast');

    for (var i = 1; i <= imageCount; i++) {
      $('.btn' + i).css('background', '#fff'); //버튼불다꺼!!
      $('.btn' + i).css('height', '10');
    }
    $('.btn' + cnt).css('background', '#fff'); //자신만 불켜
    $('.btn' + cnt).css('height', '35');
    if (cnt == imageCount) cnt = 0;
  }
  timeonoff = setInterval(moveg, 5000); // 타이머를 동작 1~5이미지를 순서대로 자동 처리
  //setInterval( function(){처리코드} , 4000)

  $('.mbutton').click(function (event) {
    //각각의 버튼 클릭시
    var $target = $(event.target); //클릭한 버튼 $target
    clearInterval(timeonoff); //타이머 중지

    for (var i = 1; i <= imageCount; i++) {
      $('.gallery .link' + i).hide(); //모든 이미지 안보인다.
    }

    if ($target.is('.btn1')) {
      cnt = 1;
    } else if ($target.is('.btn2')) {
      cnt = 2;
    } else if ($target.is('.btn3')) {
      cnt = 3;
    }
    $('.gallery .link' + cnt).fadeIn(500); //자기 자신만 이미지가 보인다

    for (var i = 1; i <= imageCount; i++) {
      $('.btn' + i).css('background', '#fff'); //버튼 모두불꺼
      $('.btn' + i).css('height', '10');
    }

    $('.gallery_text li').hide();
    $('.gallery_text li:eq(' + (cnt - 1) + ')').fadeIn('fast');

    $('.btn' + cnt).css('background', '#fff'); //자신 버튼만 불켜
    $('.btn' + cnt).css('height', '35');

    if (cnt == imageCount) cnt = 0; //카운트 초기화
    timeonoff = setInterval(moveg, 5000); //타이머의 부활!!!

    if (onoff == false) {
      onoff = true;
      $('.ps').css('background', 'url(images/stop.png)');
    }
  });

  //stop/play 버튼 클릭시 타이머 동작/중지
  $('.ps').click(function () {
    if (onoff == true) {
      clearInterval(timeonoff); // stop버튼 클릭시
      $(this).css('background', 'url(images/play.png)');
      onoff = false;
    } else {
      // false
      timeonoff = setInterval(moveg, 5000); //play버튼 클릭시
      $(this).css('background', 'url(images/stop.png)');
      onoff = true;
    }
  });
});

/*숫자 자동입력*/
var memberCountConTxt = 1171;

$({ val: 0 }).animate(
  { val: memberCountConTxt },
  {
    duration: 2000,
    step: function () {
      var number = numberWithCommas(Math.floor(this.val));
      $('.count1').text(number);
    },
    complete: function () {
      var number = numberWithCommas(Math.floor(this.val));
      $('.count1').text(number);
    },
  }
);

var memberCountConTxt = 105;

$({ val: 0 }).animate(
  { val: memberCountConTxt },
  {
    duration: 2000,
    step: function () {
      var number = numberWithCommas(Math.floor(this.val));
      $('.count2').text(number);
    },
    complete: function () {
      var number = numberWithCommas(Math.floor(this.val));
      $('.count2').text(number);
    },
  }
);

function numberWithCommas(x) {
  return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',');
}

var memberCountConTxt = 74;

$({ val: 0 }).animate(
  { val: memberCountConTxt },
  {
    duration: 2000,
    step: function () {
      var number = numberWithCommas(Math.floor(this.val));
      $('.count3').text(number);
    },
    complete: function () {
      var number = numberWithCommas(Math.floor(this.val));
      $('.count3').text(number);
    },
  }
);

var memberCountConTxt = 1350;

$({ val: 0 }).animate(
  { val: memberCountConTxt },
  {
    duration: 2000,
    step: function () {
      var number = numberWithCommas(Math.floor(this.val));
      $('.count4').text(number);
    },
    complete: function () {
      var number = numberWithCommas(Math.floor(this.val));
      $('.count4').text(number);
    },
  }
);

$(document).ready(function () {
  var img_cnt = 0;
  var total_img = 5;

  $('.character li').hide();
  $('.character li:eq(0)').show();

  $('.btn a').click(function (e) {
    e.preventDefault();
    $('.character li').hide();

    if ($(this).hasClass('btn_left')) {
      //왼쪽
      img_cnt--;

      if (img_cnt == -1) {
        img_cnt = 4;
      }

      $('.character li:eq(' + img_cnt + ')').fadeIn('slow');
    } else if ($(this).hasClass('btn_right')) {
      //오른쪽
      img_cnt++;

      if (img_cnt == 5) {
        img_cnt = 0;
      }

      $('.character li:eq(' + img_cnt + ')').fadeIn('slow');
    }
  });
});

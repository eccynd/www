$(document).ready(function () {
  $('#selectEmail').change(function () {
    $('#selectEmail option:selected').each(function () {
      if ($(this).val() == '1') {
        $('#email2').val('');
        $('#email2').attr('disabled', false);
      } else {
        $('#email2').val($(this).text());
        $('#email2').attr('disabled', false);
      }
    });
  });
});

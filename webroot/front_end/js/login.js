$(document).ready(function () {

    $('.input_value').keyup(function () {
      if ($(this).val() != '') {
        $(this).addClass('valid');
        $(this).find('~ .border_bottom').addClass('valid');
      } else {
        $(this).removeClass('valid');
        $(this).find('~ .border_bottom').removeClass('valid');
      }
    });
    
  });
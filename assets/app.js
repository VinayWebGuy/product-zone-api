function showError(error_msg) {
    $('.error-popup').addClass('show');
    $('.error-msg').html(error_msg)
}
$('.error-popup').click(function() {
  $(this).fadeOut()
})


function showSuccess(success_msg) {
    $('.success-popup').addClass('show');
    $('.success-msg').html(success_msg)
}
$('.success-popup').click(function() {
  $(this).fadeOut()
})
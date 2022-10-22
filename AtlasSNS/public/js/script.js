
$(function () {

  $('#js-open').on('click', function () {
    $('#js-modal').addClass('active');
    $('#js-overlay').addClass('active');
  });

  $('#js-close').on('click', function () {
    $('#js-modal').removeClass('active');
    $('#js-overlay').removeClass('active');
  })
};

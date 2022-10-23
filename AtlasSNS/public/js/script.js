
$(function () {

  $(document).on('click', '#js_open', function () {
    $('#js_modal').fadeIn();
    $('#js_overlay').fadeIn();

    var post = $(this).data('post');
    var id = $(this).data('id');

    $('.modal_post').text(post);
    $('.modal_id').val(id);
    return false;
  });


  $('#js_close').on('click', function () {
    $('#js_modal').removeClass('active');
    $('#js_overlay').removeClass('active');
    return false;
  });

});

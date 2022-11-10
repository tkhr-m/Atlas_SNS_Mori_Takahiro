
$(function () {

  $(document).on('click', '#jsOpen', function () {
    $('#jsModal').fadeIn();
    $('#jsOverlay').fadeIn();

    var post = $(this).data('post');
    var id = $(this).data('id');

    $('.modal_post').text(post);
    $('.modal_id').val(id);
    return false;

  });


  $('#jsClose').on('click', function () {
    $('#jsModal').removeClass('active');
    $('#jsOverlay').removeClass('active');
  });

});

$(function () {
  $('.accordion_arrow').on('click', function () {
    $(this).toggleClass('active');
    $('.menu_block').slideToggle();
    return false;
  });
});

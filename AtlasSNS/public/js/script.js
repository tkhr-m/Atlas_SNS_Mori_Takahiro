<script>
  $(function(){

    $('nav').click(function () {
      $(this).toggleClass('active');
      $(this).next('ul').slideToggle();
    })
  }
</script>

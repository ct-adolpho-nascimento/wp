jQuery(document).ready(function ($) {
  $('.breadcrumb-big').hover(
    function () {
      $(this).css("color", "gray");
    },
    function () {
      $(this).css("color", "#F2F2F2");
    }
  );
});
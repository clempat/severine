// Generated by CoffeeScript 1.6.1
(function() {

  $(document).ready(function() {
    var pagination;
    pagination = void 0;
    $("#header_photo").carousel();
    $("#filter a").click(function(e) {
      $.get($(this).attr("href"), function(data) {
        $("#pagination").html($(data).find("#pagination"));
        return $(".filtered-container").quicksand($(data).find("#thumbnail_container li"), function() {
          return pagination();
        });
      });
      e.preventDefault();
      $("#filter").find("li").removeClass("active");
      return $(this).parent("li").addClass("active");
    });
    pagination = function() {
      return $("#pagination a").click(function(e) {
        $.get($(this).attr("href"), function(data) {
          $("#pagination").html($(data).find("#pagination"));
          $(".filtered-container").quicksand($(data).find("#thumbnail_container li"), function() {
            return pagination();
          });
          return $('html, body').animate({
            scrollTop: $('.filtered-container').offset().top - 50
          });
        });
        e.preventDefault();
        $("#pagination").find("li").removeClass("active");
        return $(this).parent("li").addClass("active");
      });
    };
    return pagination();
  });

}).call(this);

$(function() {
  $(".slider").slick(
    {
      autoplay:true,
      prevArrow:$(".previous"),
      nextArrow:$(".next")
    }
  );
  $(".morebutton").on({
    mouseenter: function(event) {
      $(event.target).addClass("whitebackground");
    },
    mouseleave: function(event) {
      $(event.target).removeClass("whitebackground");
    },
  });
});

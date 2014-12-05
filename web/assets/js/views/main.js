(function () {

  'use strict';

  var JumpNext = {
    init: function () {
      this.starter();
    },
    starter: function () {
      var jumpLink = $(".jump-link[href*=#]");

      jumpLink.on('click', function(event) {
        event.preventDefault();
        $('html, body').animate({
            scrollTop: $($(this).attr("href")).offset().top
        }, 250);
      });
    }
  };

  $(function () {
    JumpNext.init();
  });
})();

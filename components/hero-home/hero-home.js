/**
* hero-home JS
* -----------------------------------------------------------------------------
*
* All the JS for the hero-home component.
*/
( function( app ) {

  var COMPONENT = {

    className: 'll-hero-home',


    selector : function() {
      return '.' + this.className;
    },


    // Fires after common.init, before .finalize and common.finalize
    init: function() {

      var hero = $(this.selector);
      var btn = hero.find('.js-play-video');

      $(btn).on('click', playVideo);

      function playVideo(e) {
        e.preventDefault();
        $(btn).animate({'opacity':0}, 300, function(){
          $(this).css('pointer-events','none');
        });

        hero.find('.loop-video')[0].play();
      }

    },


    finalize: function() {

      var _this = this;
    }
  };

  // Hooks the component into the app
  app.registerComponent( 'hero-home', COMPONENT );
} )( app );

/**
* teaser JS
* -----------------------------------------------------------------------------
*
* All the JS for the teaser component.
*/
( function( app ) {

  var COMPONENT = {

    className: 'll-teaser',


    selector : function() {
      return '.' + this.className;
    },


    // Fires after common.init, before .finalize and common.finalize
    init: function() {

      var _this = this;

    },


    finalize: function() {

      var _this = this;
    }
  };

  // Hooks the component into the app
  app.registerComponent( 'teaser', COMPONENT );
} )( app );
